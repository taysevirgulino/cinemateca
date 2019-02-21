<? 
	class AppComponentePaginaManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarAppComponentePagina( $tipo, $valor ){ 
			$value = array();
			$myObj = new AppComponentePagina();
			if( $myObj->buscarAppComponentePagina( $tipo, $valor ) ){
				$value[0] = $myObj->getIdAppComponentePagina();	
				$value["id_app_componente_pagina"] = $myObj->getIdAppComponentePagina();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getUrl();	
				$value["url"] = $myObj->getUrl();	
				$value[3] = $myObj->getDescricao();	
				$value["descricao"] = $myObj->getDescricao();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarAppComponentePagina( $tipo, $valor ){ 
			$value = array();
			$myObj = new AppComponentePagina();
			$vmyObj = $myObj->consultarAppComponentePagina( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdAppComponentePagina();
				$value[$i]["id_app_componente_pagina"] = $vmyObj[$i]->getIdAppComponentePagina();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getUrl();
				$value[$i]["url"] = $vmyObj[$i]->getUrl();
				$value[$i][3] = $vmyObj[$i]->getDescricao();
				$value[$i]["descricao"] = $vmyObj[$i]->getDescricao();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirAppComponentePagina($myIdAppComponentePagina, $myIdentificador, $myUrl, $myDescricao){
			$myObj = new AppComponentePagina();
			$myObj->setAppComponentePagina($myIdAppComponentePagina, $myIdentificador, $myUrl, $myDescricao);
			return $myObj->inserirAppComponentePagina();
		}

		public static function alterarAppComponentePagina($myIdAppComponentePagina, $myIdentificador, $myUrl, $myDescricao){
			$myObj = new AppComponentePagina();
			$myObj->setAppComponentePagina($myIdAppComponentePagina, $myIdentificador, $myUrl, $myDescricao);
			return $myObj->alterarAppComponentePagina();
		}

		public static function alterarAtributoUrl($myIdAppComponentePagina, $myUrl){
			$myObj = new AppComponentePagina();
			$myObj->setIdAppComponentePagina($myIdAppComponentePagina);
			$myObj->setUrl($myUrl);
			return $myObj->alterarAtributoUrl();
		}

		public static function alterarAtributoDescricao($myIdAppComponentePagina, $myDescricao){
			$myObj = new AppComponentePagina();
			$myObj->setIdAppComponentePagina($myIdAppComponentePagina);
			$myObj->setDescricao($myDescricao);
			return $myObj->alterarAtributoDescricao();
		}

		public static function excluirAppComponentePagina($myIdAppComponentePagina){
			$myObj = new AppComponentePagina();
			$myObj->setIdAppComponentePagina($myIdAppComponentePagina);
			return $myObj->excluirAppComponentePagina();
		}
	} 
?>