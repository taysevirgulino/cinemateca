<?
	class System{
		
		public static function _REQUEST( $Name ){
			return System::_QueryString( $_REQUEST[$Name] );
		}
		
		public static function _POST( $Name ){
			return System::_QueryString( $_POST[$Name] );
		}
		
		public static function _GET( $Name ){
			return System::_QueryString( $_GET[$Name] );
		}
		
		public static function _QueryString( $Value ){
			//return trim(htmlspecialchars(stripslashes($Value), ENT_QUOTES));
			return trim(htmlspecialchars(stripslashes($Value), ENT_QUOTES, "ISO-8859-1"));
		}
		
		public static function _TextByHtml( $Value ){
			//return trim(html_entity_decode(stripslashes($Value), ENT_QUOTES));
			return trim(html_entity_decode(stripslashes($Value), ENT_QUOTES, "ISO-8859-1"));
		}
		
		public static function Refresh($tempo, $url){
			print "<meta http-equiv=\"refresh\" content=\"".$tempo.";URL='".$url."'\">";
		}
		
		public static function Redirect($url){
			header("Location: ".$url);
			print '<html><head><meta http-equiv="refresh" content="0;URL=\''.$url.'\'" /></head><body><a href="'.$url.'">Clique aqui para redirecionar...</a></body></html>';
			exit();
		}
		
		public static function Alert( $msg ){
			print "<script language=\"javascript\">window.alert('$msg');</script>";
		}

		public static function AlertRedirect( $msg, $url ){
			print "<script language=\"javascript\">window.alert('$msg'); window.open('$url', '_parent');</script>";
			exit();
		}
		
		public static function AlertClose( $msg ){
			print "<script language=\"javascript\">window.alert('$msg'); window.close();</script>";
			exit();
		}
		
		public static function MontarStringByUrl( $str ){
			$str = strtolower($str);
			$str = strip_tags($str);
			$str = preg_replace("{ }", "_", $str);
			$str = preg_replace("{[[:space:]]}", "_", $str);
			$str = preg_replace("{[çÇ]}", "c", $str);
			$str = preg_replace("{[áÁäÄàÀãÃâÂ]}", "a", $str);
			$str = preg_replace("{[éÉëËèÈêÊ]}", "e", $str);
			$str = preg_replace("{[íÍïÏìÌîÎ]}", "i", $str);
			$str = preg_replace("{[óÓöÖòÒõÕôÔ]}", "o", $str);
			$str = preg_replace("{[úÚüÜùÙûÛ]}", "u", $str);
			$str = preg_replace("{(\()|(\))}", "_", $str);
			$str = preg_replace("{(\/)|(\\\)}", "_", $str);
			$str = preg_replace("{(\[)|(\])}", "_", $str);
			$str = preg_replace("{[@#\$%&\*\+=\|º–]}", "_", $str);
			$str = preg_replace("{[;:'\"<>,\.?!]}", "_", $str);
			$str = preg_replace("{[“”]}", "_", $str);
			$str = preg_replace("{(ª)+}", "_", $str);
			$str = preg_replace("{[`´~^°]}", "_", $str);
			
			$str = preg_replace("{(_)+}", "_", $str);
			
			$str = substr($str, 0, 100);
			
			return $str;
		}
		
		public static function Slug( $str ){
			$str = trim($str);
			$str = strtolower($str);
			$str = strip_tags($str);
			$str = preg_replace("{ }", "-", $str);
			$str = preg_replace("{[[:space:]]}", "-", $str);
			$str = preg_replace("{[çÇ]}", "c", $str);
			$str = preg_replace("{[áÁäÄàÀãÃâÂ]}", "a", $str);
			$str = preg_replace("{[éÉëËèÈêÊ]}", "e", $str);
			$str = preg_replace("{[íÍïÏìÌîÎ]}", "i", $str);
			$str = preg_replace("{[óÓöÖòÒõÕôÔ]}", "o", $str);
			$str = preg_replace("{[úÚüÜùÙûÛ]}", "u", $str);
			$str = preg_replace("{(\()|(\))}", "-", $str);
			$str = preg_replace("{(\/)|(\\\)}", "-", $str);
			$str = preg_replace("{(\[)|(\])}", "-", $str);
			$str = preg_replace("{[@#\$%&\*\+=\|º]}", "-", $str);
			$str = preg_replace("{[;:'\"<>,\.?!]}", "-", $str);
			$str = preg_replace("{[“”]}", "-", $str);
			$str = preg_replace("{(ª)+}", "-", $str);
			$str = preg_replace("{[`´~^°]}", "-", $str);
			
			$str = preg_replace("{(-)+}", "-", $str);
			
			if(preg_match("/(-)+$/", $str)){
				$str = substr($str, 0, (strlen($str)-1));
			}
			$str = substr($str, 0, 100);
			
			return $str;
		}		

		public static function SomarData($data, $valor){
			//Valida: Y-m-d
			$expdata = "/^(([0-9]{4})\-([0-9]{1,2})\-([0-9]{1,2})){1}$/";
			
			if( preg_match($expdata, $data)){
				$a = explode("-", $data);
				$dia = $a[2];
				$mes = $a[1];
				$ano = $a[0];
				$formato = "Y-m-d";
			}
			
			//Valida: d/m/Y
			$expdata = "/^(([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})){1}$/";
			
			if( preg_match($expdata, $data)){
				$a = explode("/", $data);
				$dia = $a[0];
				$mes = $a[1];
				$ano = $a[2];
				$formato = "d/m/Y";
			}
			
			if(checkdate ($mes, $dia, $ano)){
				return date($formato, mktime (0, 0, 0, $mes, $dia+$valor,  $ano));	
			}else{
				return $data;
			}
		}
		
		public static function DiferencaData($DataInicial, $DataFinal){
			
			$DataInicial = System::FormatarData($DataInicial, "m/d/Y");
			$DataFinal = System::FormatarData($DataFinal, "m/d/Y");
			
			$DataInicial = strtotime( $DataInicial );
			$DataFinal = strtotime( $DataFinal );
			
		    return floor( ($DataFinal - $DataInicial) / 86400 ); 
		} 
		
		public static function FormatarData($data, $formato = "d/m/Y H:i:s"){
			
			//Valida: Y-m-d H:i:s
			$expdata = "/^(([0-9]{4})\-([0-9]{1,2})\-([0-9]{1,2})){1}[[:space:]](([0-9]{2}):([0-9]{2}):([0-9]{2})){1}$/";
			
			if( preg_match($expdata, $data)){
				 
				 $array = explode(" ", $data);
				 $adata = explode("-", $array[0]);
				 $ahora = explode(":", $array[1]);
				 
				 $strdata = $formato;
				 $strdata = preg_replace("{y}", substr($adata[0], 2, 2), $strdata);
				 $strdata = preg_replace("{Y}", $adata[0], $strdata);
				 $strdata = preg_replace("{m}", $adata[1], $strdata);
				 $strdata = preg_replace("{d}", $adata[2], $strdata);
				 $strdata = preg_replace("{H}", $ahora[0], $strdata);
				 $strdata = preg_replace("{i}", $ahora[1], $strdata);
				 $strdata = preg_replace("{s}", $ahora[2], $strdata);

				 return $strdata;				 
			}

			//Valida: d/m/Y H:i:s
			$expdata = "/^(([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})){1}[[:space:]](([0-9]{2}):([0-9]{2}):([0-9]{2})){1}$/";
			
			if( preg_match($expdata, $data)){
				 
				 $array = explode(" ", $data);
				 $adata = explode("/", $array[0]);
				 $ahora = explode(":", $array[1]);
				 
				 $strdata = $formato;
				 $strdata = preg_replace("{y}", substr($adata[2], 2, 2), $strdata);
				 $strdata = preg_replace("{Y}", $adata[2], $strdata);
				 $strdata = preg_replace("{m}", $adata[1], $strdata);
				 $strdata = preg_replace("{d}", $adata[0], $strdata);
				 $strdata = preg_replace("{H}", $ahora[0], $strdata);
				 $strdata = preg_replace("{i}", $ahora[1], $strdata);
				 $strdata = preg_replace("{s}", $ahora[2], $strdata);

				 return $strdata;				 
			}

			//Valida: Y-m-d
			$expdata = "/^(([0-9]{4})\-([0-9]{1,2})\-([0-9]{1,2})){1}$/";
			
			if( preg_match($expdata, $data)){
				 
				 $adata = explode("-", $data);
				 
				 $strdata = $formato;
				 $strdata = preg_replace("{y}", substr($adata[0], 2, 2), $strdata);
				 $strdata = preg_replace("{Y}", $adata[0], $strdata);
				 $strdata = preg_replace("{m}", $adata[1], $strdata);
				 $strdata = preg_replace("{d}", $adata[2], $strdata);

				 return $strdata;				 
			}

			//Valida: d/m/Y
			$expdata = "/^(([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})){1}$/";
			
			if( preg_match($expdata, $data)){
				 
				 $adata = explode("/", $data);
				 
				 $strdata = $formato;
				 $strdata = preg_replace("{y}", substr($adata[2], 2, 2), $strdata);
				 $strdata = preg_replace("{Y}", $adata[2], $strdata);
				 $strdata = preg_replace("{m}", $adata[1], $strdata);
				 $strdata = preg_replace("{d}", $adata[0], $strdata);

				 return $strdata;				 
			}

			//Valida: H:i:s
			$expdata = "/^(([0-9]{2}):([0-9]{2}):([0-9]{2})){1}$/";
			
			if( preg_match($expdata, $data)){
				 
				 $ahora = explode(":", $data);
				 
				 $strdata = $formato;
				 $strdata = preg_replace("{H}", $ahora[0], $strdata);
				 $strdata = preg_replace("{i}", $ahora[1], $strdata);
				 $strdata = preg_replace("{s}", $ahora[2], $strdata);

				 return $strdata;				 
			}
			
			return null;
		}
		
		public static function FormatarMoedaBoleto($valor){
			return number_format($valor, 2, '', '');
		}
		
		public static function FormatarNota($valor){
			return number_format($valor, 1, ',', '.');	
		}
		
		public static function FormatarValor($valor){
			return number_format($valor, 2, ',', '.');	
		}

		public static function FormatarValorBanco($valor){
			return number_format($valor, 2, '.', '');	
		}

		public static function FormatarStringList($str){
			return substr(strip_tags(System::_TextByHtml($str)), 0, 100);
		}

		public static function ConverterDouble($valor){	
			return doubleval(  str_ireplace(",", ".", str_ireplace(".", "", $valor)) );
		}
		
		public static function PreencherNumero($numero, $tamanho, $valor = "0", $tipo=1){
	        
			switch ($tipo){
				case 1: {
					$numero = substr($numero, 0, $tamanho);
					$nV1 = strlen($numero);
			        while ($nV1 < $tamanho) {
			            $numero = "$valor$numero";
			            $nV1 ++;
			        }
				}break;
				case 2:{
					$numero = substr($numero, 0, $tamanho);
					$numero = implode("", array_reverse(str_split($numero)));
					$nV1 = strlen($numero);
			        while ($nV1 < $tamanho) {
			            $numero = "$valor$numero";
			            $nV1 ++;
			        }
			        $numero = implode("", array_reverse(str_split($numero)));
				}
			}
			
	        return $numero;
		}

		public static function Untag($string, $tag) 
		{ 
		    $tmpval = array(); 
		    $preg = "|<$tag>(.*?)</$tag>|s"; 
		    preg_match_all($preg, $string, $tags); 
		    foreach ($tags[1] as $tmpcont){ 
		        $tmpval[] = $tmpcont; 
		    } 
		    return $tmpval;
		} 
		
		public static function EstadoCivil( $IdEstadoCivil ){
			$IdEstadoCivil = intval($IdEstadoCivil);
			switch ($IdEstadoCivil){
				case 1 : { return "Solteiro(a)"; } break;
				case 2 : { return "Casado(a)"; } break;
				case 3 : { return "Vi&uacute;vo(a)"; } break;
				case 4 : { return "Divorciado(a)"; } break;
				case 5 : { return "Separado(a)"; } break;
			}
		}
		
		public static function EstadosCivis(){
			return array(
				array(1, self::EstadoCivil(1)),
				array(2, self::EstadoCivil(2)),
				array(3, self::EstadoCivil(3)),
				array(4, self::EstadoCivil(4)),
				array(5, self::EstadoCivil(5)),
			);
		}
		public static function DescricaoMes( $NumeroMes ){
			$NumeroMes = intval($NumeroMes);
			switch ($NumeroMes){
				case 1 : { return "Janeiro"; } break;
				case 2 : { return "Fevereiro"; } break;
				case 3 : { return "Março"; } break;
				case 4 : { return "Abril"; } break;
				case 5 : { return "Maio"; } break;
				case 6 : { return "Junho"; } break;
				case 7 : { return "Julho"; } break;
				case 8 : { return "Agosto"; } break;
				case 9 : { return "Setembro"; } break;
				case 10 : { return "Outubro"; } break;
				case 11 : { return "Novembro"; } break;
				case 12 : { return "Dezembro"; } break;
			}
		}
		
		public static function MIMETypeOfFileName($filename)
	    {
	        preg_match("|\.([a-z0-9]{2,4})$|i", $filename, $fileSuffix);
	
	        switch(strtolower($fileSuffix[1]))
	        {
	            case "js" :
	                return "application/x-javascript";
	
	            case "json" :
	                return "application/json";
	
	            case "jpg" :
	            case "jpeg" :
	            case "jpe" :
	                return "image/jpg";
	
	            case "png" :
	            case "gif" :
	            case "bmp" :
	            case "tiff" :
	                return "image/".strtolower($fileSuffix[1]);
	
	            case "css" :
	                return "text/css";
	
	            case "xml" :
	                return "application/xml";
	
	            case "doc" :
	            case "docx" :
	                return "application/msword";
	
	            case "xls" :
	            case "xlsx" :
	            case "xlt" :
	            case "xlm" :
	            case "xld" :
	            case "xla" :
	            case "xlc" :
	            case "xlw" :
	            case "xll" :
	                return "application/vnd.ms-excel";
	
	            case "ppt" :
	            case "pptx" :
	            case "pps" :
	            case "ppsx" :
	                return "application/vnd.ms-powerpoint";
	
	            case "rtf" :
	                return "application/rtf";
	
	            case "pdf" :
	                return "application/pdf";
	
	            case "html" :
	            case "htm" :
	            case "php" :
	                return "text/html";
	
	            case "txt" :
	                return "text/plain";
	
	            case "mpeg" :
	            case "mpg" :
	            case "mpe" :
	                return "video/mpeg";
	
	            case "mp3" :
	                return "audio/mpeg3";
	
	            case "wav" :
	                return "audio/wav";
	
	            case "aiff" :
	            case "aif" :
	                return "audio/aiff";
	
	            case "avi" :
	                return "video/msvideo";
	
	            case "wmv" :
	                return "video/x-ms-wmv";
	
	            case "mov" :
	                return "video/quicktime";
	
	            case "zip" :
	                return "application/zip";
	
	            case "tar" :
	                return "application/x-tar";
	
	            case "swf" :
	                return "application/x-shockwave-flash";
	
	            default :
		            if(function_exists("mime_content_type"))
		            {
		                $fileSuffix = mime_content_type($filename);
		            }
	            	return "unknown/" . trim($fileSuffix[0], ".");
	        }
	    }

        public static function DownloadFile($FilePath, $FileName){
			
        	$file = $FilePath.$FileName;
			if(!file_exists($file)){ return; }
			
			header("Content-Type: application/save".System::MIMETypeOfFileName( $FileName ));
			header("Content-Length:".filesize($file));
			header('Content-Disposition: attachment; filename="'.$FileName.'"');
			header("Content-Transfer-Encoding: binary");
			header('Expires: 0');
			header('Pragma: no-cache');
			$fp = fopen($file, "r");
			fpassthru($fp);
			fclose($fp);
			
        }
        
        public static function convertLatin1ToHtml($str) {
		    $html_entities = array (
		        "&" =>  "&amp;",     #ampersand  
		        "á" =>  "&aacute;",     #latin small letter a
		        "Â" =>  "&Acirc;",     #latin capital letter A
		        "â" =>  "&acirc;",     #latin small letter a
		        "Æ" =>  "&AElig;",     #latin capital letter AE
		        "æ" =>  "&aelig;",     #latin small letter ae
		        "À" =>  "&Agrave;",     #latin capital letter A
		        "à" =>  "&agrave;",     #latin small letter a
		        "Å" =>  "&Aring;",     #latin capital letter A
		        "å" =>  "&aring;",     #latin small letter a
		        "Ã" =>  "&Atilde;",     #latin capital letter A
		        "ã" =>  "&atilde;",     #latin small letter a
		        "Ä" =>  "&Auml;",     #latin capital letter A
		        "ä" =>  "&auml;",     #latin small letter a
		        "Ç" =>  "&Ccedil;",     #latin capital letter C
		        "ç" =>  "&ccedil;",     #latin small letter c
		        "É" =>  "&Eacute;",     #latin capital letter E
		        "é" =>  "&eacute;",     #latin small letter e
		        "Ê" =>  "&Ecirc;",     #latin capital letter E
		        "ê" =>  "&ecirc;",     #latin small letter e
		        "È" =>  "&Egrave;",     #latin capital letter E
		        "û" =>  "&ucirc;",     #latin small letter u
		        "Ù" =>  "&Ugrave;",     #latin capital letter U
		        "ù" =>  "&ugrave;",     #latin small letter u
		        "Ü" =>  "&Uuml;",     #latin capital letter U
		        "ü" =>  "&uuml;",     #latin small letter u
		        "İ" =>  "&Yacute;",     #latin capital letter Y
		        "ı" =>  "&yacute;",     #latin small letter y
		        "ÿ" =>  "&yuml;",     #latin small letter y
		        "Ÿ" =>  "&Yuml;",     #latin capital letter Y
		    );
		
		    foreach ($html_entities as $key => $value) {
		        $str = str_replace($key, $value, $str);
		    }
		    return $str;
		} 
		
        public static function convertHtmlToLatin1($str) {
		    $html_entities = array (
		        "&" =>  "&amp;",     #ampersand  
		        "á" =>  "&aacute;",     #latin small letter a
		        "Â" =>  "&Acirc;",     #latin capital letter A
		        "â" =>  "&acirc;",     #latin small letter a
		        "Æ" =>  "&AElig;",     #latin capital letter AE
		        "æ" =>  "&aelig;",     #latin small letter ae
		        "À" =>  "&Agrave;",     #latin capital letter A
		        "à" =>  "&agrave;",     #latin small letter a
		        "Å" =>  "&Aring;",     #latin capital letter A
		        "å" =>  "&aring;",     #latin small letter a
		        "Ã" =>  "&Atilde;",     #latin capital letter A
		        "ã" =>  "&atilde;",     #latin small letter a
		        "Ä" =>  "&Auml;",     #latin capital letter A
		        "ä" =>  "&auml;",     #latin small letter a
		        "Ç" =>  "&Ccedil;",     #latin capital letter C
		        "ç" =>  "&ccedil;",     #latin small letter c
		        "É" =>  "&Eacute;",     #latin capital letter E
		        "é" =>  "&eacute;",     #latin small letter e
		        "Ê" =>  "&Ecirc;",     #latin capital letter E
		        "ê" =>  "&ecirc;",     #latin small letter e
		        "È" =>  "&Egrave;",     #latin capital letter E
		        "ì" =>  "&igrave;",
		        "Ì" =>  "&Igrave;",
		        "í" =>  "&iacute;",
		        "Í" =>  "&Iacute;",
		        "î" =>  "&icirc;",
		        "Î" =>  "&Icirc;",
		        "ï" =>  "&iuml;",
		        "Ï" =>  "&Iuml;",
		        "ğ" =>  "&eth;",
		        "ñ" =>  "&ntilde;",
		        "Ñ" =>  "&Ntilde;",
		        "ò" =>  "&ograve;",
		        "Ò" =>  "&Ograve;",
		        "ó" =>  "&oacute;",
		        "Ó" =>  "&Oacute;",
		        "ô" =>  "&ocirc;",
		        "Ô" =>  "&Ocirc;",
		        "õ" =>  "&otilde;",
		        "Õ" =>  "&Otilde;",
		        "ö" =>  "&ouml;",
		        "Ö" =>  "&Ouml;",
		        "÷" =>  "&divide;",
		        "ø" =>  "&oslash;",
		        "ú" =>  "&uacute;",
		        "Ú" =>  "&Uacute;",
		        "û" =>  "&ucirc;",     #latin small letter u
		        "Ù" =>  "&Ugrave;",     #latin capital letter U
		        "ù" =>  "&ugrave;",     #latin small letter u
		        "Ü" =>  "&Uuml;",     #latin capital letter U
		        "ü" =>  "&uuml;",     #latin small letter u
		        "İ" =>  "&Yacute;",     #latin capital letter Y
		        "ı" =>  "&yacute;",     #latin small letter y
		        "ÿ" =>  "&yuml;",     #latin small letter y
		        "Ÿ" =>  "&Yuml;",     #latin capital letter Y
		        "&" =>  "&amp;",
		        "\"" =>  "&quot;",
		        "'" =>  "&apos;",
		        "<" =>  "&lt;",
		        ">" =>  "&gt;",
		    );
		
		    foreach ($html_entities as $key => $value) {
		        $str = str_replace($value, $key, $str);
		    }
			foreach ($html_entities as $key => $value) {
		        $str = str_replace($value, $key, $str);
		    }
		    return $str;
		} 
		
		public static function Strtolower( $str ){
			$str = strtolower($str);
			$str = preg_replace("{[çÇ]}", "ç", $str);
				
			$str = preg_replace("{[áÁ]}", "á", $str);
			$str = preg_replace("{[äÄ]}", "ä", $str);
			$str = preg_replace("{[àÀ]}", "à", $str);
			$str = preg_replace("{[ãÃ]}", "ã", $str);
			$str = preg_replace("{[âÂ]}", "â", $str);
				
			$str = preg_replace("{[éÉ]}", "é", $str);
			$str = preg_replace("{[ëË]}", "ë", $str);
			$str = preg_replace("{[èÈ]}", "è", $str);
			$str = preg_replace("{[êÊ]}", "ê", $str);
				
			$str = preg_replace("{[íÍ]}", "í", $str);
			$str = preg_replace("{[ïÏ]}", "ï", $str);
			$str = preg_replace("{[ìÌ]}", "ì", $str);
			$str = preg_replace("{[îÎ]}", "î", $str);
				
			$str = preg_replace("{[óÓ]}", "ó", $str);
			$str = preg_replace("{[öÖ]}", "ö", $str);
			$str = preg_replace("{[òÒ]}", "ò", $str);
			$str = preg_replace("{[õÕ]}", "õ", $str);
			$str = preg_replace("{[ôÔ]}", "ô", $str);
				
			$str = preg_replace("{[úÚ]}", "ú", $str);
			$str = preg_replace("{[üÜ]}", "ü", $str);
			$str = preg_replace("{[ùÙ]}", "ù", $str);
			$str = preg_replace("{[ûÛ]}", "û", $str);
				
			return $str;
		}
		
		public static function Strtoupper( $str ){
			$str = strtoupper($str);
			$str = preg_replace("{[çÇ]}", "Ç", $str);
				
			$str = preg_replace("{[áÁ]}", "Á", $str);
			$str = preg_replace("{[äÄ]}", "Ä", $str);
			$str = preg_replace("{[àÀ]}", "À", $str);
			$str = preg_replace("{[ãÃ]}", "Ã", $str);
			$str = preg_replace("{[âÂ]}", "Â", $str);
				
			$str = preg_replace("{[éÉ]}", "É", $str);
			$str = preg_replace("{[ëË]}", "Ë", $str);
			$str = preg_replace("{[èÈ]}", "È", $str);
			$str = preg_replace("{[êÊ]}", "Ê", $str);
				
			$str = preg_replace("{[íÍ]}", "Í", $str);
			$str = preg_replace("{[ïÏ]}", "Ï", $str);
			$str = preg_replace("{[ìÌ]}", "Ì", $str);
			$str = preg_replace("{[îÎ]}", "Î", $str);
				
			$str = preg_replace("{[óÓ]}", "Ó", $str);
			$str = preg_replace("{[öÖ]}", "Ö", $str);
			$str = preg_replace("{[òÒ]}", "Ò", $str);
			$str = preg_replace("{[õÕ]}", "Õ", $str);
			$str = preg_replace("{[ôÔ]}", "Ô", $str);
				
			$str = preg_replace("{[úÚ]}", "Ú", $str);
			$str = preg_replace("{[üÜ]}", "Ü", $str);
			$str = preg_replace("{[ùÙ]}", "Ù", $str);
			$str = preg_replace("{[ûÛ]}", "Û", $str);
				
			return $str;
		}
    
	}
?>