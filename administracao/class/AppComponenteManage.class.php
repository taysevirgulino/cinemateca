<? 
	class AppComponenteManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarAppComponente( $tipo, $valor ){ 
			$value = array();
			$myObj = new AppComponente();
			if( $myObj->buscarAppComponente( $tipo, $valor ) ){
				$value[0] = $myObj->getIdAppComponente();	
				$value["id_app_componente"] = $myObj->getIdAppComponente();	
				$value[1] = $myObj->getData();	
				$value["data"] = $myObj->getData();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarAppComponente( $tipo, $valor ){ 
			$value = array();
			$myObj = new AppComponente();
			$vmyObj = $myObj->consultarAppComponente( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdAppComponente();
				$value[$i]["id_app_componente"] = $vmyObj[$i]->getIdAppComponente();
				$value[$i][1] = $vmyObj[$i]->getData();
				$value[$i]["data"] = $vmyObj[$i]->getData();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirAppComponente($myIdAppComponente, $myData){
			$myObj = new AppComponente();
			$myObj->setAppComponente($myIdAppComponente, $myData);
			return $myObj->inserirAppComponente();
		}

		public static function alterarAppComponente($myIdAppComponente, $myData){
			$myObj = new AppComponente();
			$myObj->setAppComponente($myIdAppComponente, $myData);
			return $myObj->alterarAppComponente();
		}

		public static function alterarAtributoData($myIdAppComponente, $myData){
			$myObj = new AppComponente();
			$myObj->setIdAppComponente($myIdAppComponente);
			$myObj->setData($myData);
			return $myObj->alterarAtributoData();
		}

		public static function excluirAppComponente($myIdAppComponente){
			$myObj = new AppComponente();
			$myObj->setIdAppComponente($myIdAppComponente);
			return $myObj->excluirAppComponente();
		}
	} 
?>