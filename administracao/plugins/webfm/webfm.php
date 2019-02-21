<?php
	//---------------------------------------------------------------------------
	//	xml helpers
	//---------------------------------------------------------------------------
	function responseElementOpen( $id ) {
		return "<response id=\"" . $id . "\" type=\"ok\">";
	}
	function responseElementClose() {
		return "</response>";
	}
	function fileElementOpen() {
		return "<file>";
	}
	function fileElementContent( $file ) {
		global $rootDir;
		$path = substr( $file, strlen( $rootDir ) );
		$root = strlen( $path ) == 0;
		$path = $root ? "/" : $path;
		$name = $root ? "/" : basename( $file );
		$created = $root ? null : date( "dmyHisO", filectime( $file ) );
		$modified = $root ? null : date( "dmyHisO", filemtime( $file ) );
		$text = "" .
			"<type>" . substr( filetype( $file ), 0, 1 ) . "</type>" .
			"<path>" . xmlencode( $path ) . "</path>" .
			"<name>" . xmlencode( $name ) . "</name>" .
			( $created == null ? "" : "<created>" . $created . "</created>" ) .
			( $modified == null ? "" : "<modified>" . $modified . "</modified>" ) .
			"";
		if( is_file( $file ) ) {
			$text .= "<length>" . filesize( $file ) . "</length>";
		}
		return $text;
	}
	function fileElementClose() {
		return "</file>";
	}
	function fileElement( $file ) {
		return fileElementOpen() . fileElementContent( $file ) . fileElementClose();
	}
	function errorResponse( $id, $message, $code ) {
		return "<response id=\"" . $id . "\" type=\"error\">" .
			"<message>" . xmlencode( $message ) . "</message>" .
			"<code>" . xmlencode( $code ) . "</code>" .
			"</response>";
	}
	function xmlencode( $text ) {
		$text = str_replace( "&", "&#38;", $text );
		$text = str_replace( "\"", "&#34;", $text );
		$text = str_replace( "/", "&#47;", $text );
		$text = str_replace( "\\", "&#92;", $text );
		$text = str_replace( "<", "&#60;", $text );
		$text = str_replace( ">", "&#62;", $text );
		return $text;
	}
	//---------------------------------------------------------------------------
	//	file helpers
	//---------------------------------------------------------------------------
	function normalizePath( $path ) {
		if( strpos( $path, ".." ) ) {
			die( ".." );
		}
		if( $path == null ) {
			$path = "";
		}
		while( strlen( $path ) > 0 && substr( $path, strlen( $path ) - 1, 1 ) == "/" ) {
			$path = substr( $path, 0, strlen( $path ) - 1 );
		}
		return $path;
	}
	function assertExists( $requestId, $file ) {
		if( !file_exists( $file ) ) {
			$code = "fileSystem.fileNotFound";
			echo errorResponse( $requestId, "File not found", $code );
			exit();
		}
	}
	function assertNotExists( $requestId, $file ) {
		if( file_exists( $file ) ) {
			$code = "fileSystem.fileExists";
			echo errorResponse( $requestId, "File exists", $code );
			exit();
		}
	}
	function filesystemPath( $path ) {
		global $rootDir;
		return $rootDir . $path;
	}
	function rmdir_recurse( $path ) {
		$path = rtrim( $path, '/' ) . '/';
		$handle = opendir( $path );
		while( false !== ( $file = readdir( $handle ) ) ) {
			if( $file != '.' and $file != '..' ) {
				$fullpath = $path . $file;
				if( is_dir( $fullpath ) ) {
					rmdir_recurse($fullpath);
				} else {
					unlink( $fullpath );
				}
			}
		}
		closedir( $handle );
		rmdir( $path );
	}
	//---------------------------------------------------------------------------
	//	handlers
	//---------------------------------------------------------------------------
	function handleMessage() {
		header( "Cache-Control: no-cache, must-revalidate" );
		//
		//	get xml, create parser
		$xml = $_POST[ 'request' ];
		if( !( $xml_parser = xml_parser_create() ) ) {
			die( "Couldn't create parser." );
		}
		xml_parser_set_option( $xml_parser, XML_OPTION_CASE_FOLDING, 0 );
		if( !xml_parse_into_struct( $xml_parser, $xml, $values, $tags ) ) {
			die( "XML Error: " . xml_error_string( xml_get_error_code( $xml_parser ) ) .
				" at line " . xml_get_current_line_number( $xml_parser ) .
				"\r\n" . $xml );
		}
		xml_parser_free( $xml_parser );
		$requestType = $values[ $tags[ "request" ][ 0 ] ][ "attributes" ][ "type" ];
		$requestId = $values[ $tags[ "request" ][ 0 ] ][ "attributes" ][ "id" ];

		//-----------------------------------------
		//	get
		//-----------------------------------------
		if( "get" == $requestType ) {
			$path = normalizePath( $values[ $tags[ "path" ][ 0 ] ][ "value" ] );
			$fspath = filesystemPath( $path );
			assertExists( $requestId, $fspath );
			echo responseElementOpen( $requestId );
			echo fileElement( $fspath );
			echo responseElementClose();
		} else
		//-----------------------------------------
		//	list
		//-----------------------------------------
		if( "list" == $requestType ) {
			$path = normalizePath( $values[ $tags[ "path" ][ 0 ] ][ "value" ] );
			$fspath = filesystemPath( $path );
			assertExists( $requestId, $fspath );
			echo responseElementOpen( $requestId );
			if( $handle = opendir( $fspath ) ) {
				echo fileElementOpen();
				echo fileElementContent( $fspath );
				echo "\r\n";
				while( false !== ( $file = readdir( $handle ) ) ) {
					if( $file != "." && $file != ".." ) {
						$childFsPath = $fspath . "/" . $file;
						echo "\t" . fileElement( $childFsPath ) . "\r\n";
					}
				}
				echo fileElementClose();
				closedir( $handle );
			}
			echo responseElementClose();
		} else
		//-----------------------------------------
		//	mkdir
		//-----------------------------------------
		if( "mkdir" == $requestType ) {
			$path = normalizePath( $values[ $tags[ "path" ][ 0 ] ][ "value" ] );
			$fspath = filesystemPath( $path );
			assertNotExists( $requestId, $fspath );
			mkdir( $fspath );
			echo responseElementOpen( $requestId );
			echo fileElement( $fspath );
			echo responseElementClose();
		} else
		//-----------------------------------------
		//	delete
		//-----------------------------------------
		if( "delete" == $requestType ) {
			$path = normalizePath( $values[ $tags[ "path" ][ 0 ] ][ "value" ] );
			$fspath = filesystemPath( $path );
			assertExists( $requestId, $fspath );
			if( is_dir( $fspath ) ) {
				rmdir_recurse( $fspath );
			} else {
				unlink( $fspath );
			}
			echo responseElementOpen( $requestId );
			echo responseElementClose();
		} else
		//-----------------------------------------
		//	download
		//-----------------------------------------
		if( "download" == $requestType ) {
			$path = normalizePath( $values[ $tags[ "path" ][ 0 ] ][ "value" ] );
			$offset = $values[ $tags[ "offset" ][ 0 ] ][ "value" ];
			$length = $values[ $tags[ "length" ][ 0 ] ][ "value" ];
			$fspath = filesystemPath( $path );
			assertExists( $requestId, $fspath );
			echo responseElementOpen( $requestId );
			$uri = $_SERVER[ "REQUEST_URI" ];
			$lastSlashIndex = strrpos( $uri, "/" );
			$downloadUrl = "http://" . $_SERVER[ "HTTP_HOST" ] . substr( $uri, 0, $lastSlashIndex ) .
				"/handler.php?mode=download&path=" . urlencode( $path ) . "&offset=" . $offset . "&length=" . $length;
			echo "<url>" . xmlencode( $downloadUrl ) . "</url>";
			echo responseElementClose();
		} else
		//-----------------------------------------
		//	upload
		//-----------------------------------------
		if( "upload" == $requestType ) {
			$path = normalizePath( $values[ $tags[ "path" ][ 0 ] ][ "value" ] );
			$append = $values[ $tags[ "append" ][ 0 ] ][ "value" ];
			$fspath = filesystemPath( $path );
			echo responseElementOpen( $requestId );
			$uri = $_SERVER[ "REQUEST_URI" ];
			$lastSlashIndex = strrpos( $uri, "/" );
			$uploadUrl = "http://" . $_SERVER[ "HTTP_HOST" ] . substr( $uri, 0, $lastSlashIndex ) .
				"/handler.php?mode=upload&path=" . urlencode( $path ) . "&append=" . $append;
			echo "<url>" . xmlencode( $uploadUrl ) . "</url>";
			echo responseElementClose();
		} else
		//-----------------------------------------
		//	unexpected
		//-----------------------------------------
		{
			echo errorResponse( $requestId,
				"Unexpected request type: " . $requestType,
				"fileSystem.generalFailure" );
		}
	}
	function handleUpload() {
		$path = normalizePath( $_GET[ "path" ] );
		$fspath = filesystemPath( $path );
		$append = $_GET[ "append" ];
		$data = file_get_contents( "php://input" );
		$handle = fopen( $fspath, $append ? "a" : "w" );
		fwrite( $handle, $data );
		fclose( $handle );
		echo "ok";
	}
	function handleDownload() {
		header( "Content-Type: application/octet-stream" );
		$path = normalizePath( $_GET[ "path" ] );
		$fspath = filesystemPath( $path );
		assertExists( null, $fspath );
		$handle = fopen( $fspath, "r" );
		print fread( $handle, filesize( $fspath ) );
		fclose( $handle );
	}
	//---------------------------------------------------------------------------
	//	request processing
	//---------------------------------------------------------------------------
	header( "Cache-Control: no-cache, must-revalidate" );
	//
	//	remove magic quotes
	if( get_magic_quotes_gpc() ) {
		function stripslashes_deep( $value ) {
			$value = is_array( $value ) ?
				array_map( 'stripslashes_deep', $value ) :
				stripslashes( $value );
			return $value;
		}
		$_POST = array_map( 'stripslashes_deep', $_POST );
		$_GET = array_map( 'stripslashes_deep', $_GET );
		$_COOKIE = array_map( 'stripslashes_deep', $_COOKIE );
		$_REQUEST = array_map( 'stripslashes_deep', $_REQUEST );
	}
	//
	//	check mode - message or dl/ul request
	$mode = $_GET[ "mode" ];
	if( strcmp( "upload", $mode ) == 0 ) {
		handleUpload();
	} else
	if( strcmp( "download", $mode ) == 0 ) {
		handleDownload();
	} else {
		handleMessage();
	}
?>