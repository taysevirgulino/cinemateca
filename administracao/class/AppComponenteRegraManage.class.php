<? 
	class AppComponenteRegraManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarAppComponenteRegra( $tipo, $valor ){ 
			$value = array();
			$myObj = new AppComponenteRegra();
			if( $myObj->buscarAppComponenteRegra( $tipo, $valor ) ){
				$value[0] = $myObj->getIdAppComponenteRegra();	
				$value["id_app_componente_regra"] = $myObj->getIdAppComponenteRegra();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getDescricao();	
				$value["descricao"] = $myObj->getDescricao();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarAppComponenteRegra( $tipo, $valor ){ 
			$value = array();
			$myObj = new AppComponenteRegra();
			$vmyObj = $myObj->consultarAppComponenteRegra( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdAppComponenteRegra();
				$value[$i]["id_app_componente_regra"] = $vmyObj[$i]->getIdAppComponenteRegra();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getDescricao();
				$value[$i]["descricao"] = $vmyObj[$i]->getDescricao();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirAppComponenteRegra($myIdAppComponenteRegra, $myIdentificador, $myDescricao){
			$myObj = new AppComponenteRegra();
			$myObj->setAppComponenteRegra($myIdAppComponenteRegra, $myIdentificador, $myDescricao);
			return $myObj->inserirAppComponenteRegra();
		}

		public static function alterarAppComponenteRegra($myIdAppComponenteRegra, $myIdentificador, $myDescricao){
			$myObj = new AppComponenteRegra();
			$myObj->setAppComponenteRegra($myIdAppComponenteRegra, $myIdentificador, $myDescricao);
			return $myObj->alterarAppComponenteRegra();
		}

		public static function alterarAtributoDescricao($myIdAppComponenteRegra, $myDescricao){
			$myObj = new AppComponenteRegra();
			$myObj->setIdAppComponenteRegra($myIdAppComponenteRegra);
			$myObj->setDescricao($myDescricao);
			return $myObj->alterarAtributoDescricao();
		}

		public static function excluirAppComponenteRegra($myIdAppComponenteRegra){
			$myObj = new AppComponenteRegra();
			$myObj->setIdAppComponenteRegra($myIdAppComponenteRegra);
			return $myObj->excluirAppComponenteRegra();
		}
	} 
?>