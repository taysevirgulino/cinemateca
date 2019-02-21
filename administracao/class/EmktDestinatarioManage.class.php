<? 
	class EmktDestinatarioManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarEmktDestinatario( $tipo, $valor ){ 
			$value = array();
			$myObj = new EmktDestinatario();
			if( $myObj->buscarEmktDestinatario( $tipo, $valor ) ){
				$value[0] = $myObj->getIdEmktDestinatario();	
				$value["id_emkt_destinatario"] = $myObj->getIdEmktDestinatario();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdEmktDisparo();	
				$value["id_emkt_disparo"] = $myObj->getIdEmktDisparo();	
				$value[3] = $myObj->getIdEmktLista();	
				$value["id_emkt_lista"] = $myObj->getIdEmktLista();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarEmktDestinatario( $tipo, $valor ){ 
			$value = array();
			$myObj = new EmktDestinatario();
			$vmyObj = $myObj->consultarEmktDestinatario( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdEmktDestinatario();
				$value[$i]["id_emkt_destinatario"] = $vmyObj[$i]->getIdEmktDestinatario();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdEmktDisparo();
				$value[$i]["id_emkt_disparo"] = $vmyObj[$i]->getIdEmktDisparo();
				$value[$i][3] = $vmyObj[$i]->getIdEmktLista();
				$value[$i]["id_emkt_lista"] = $vmyObj[$i]->getIdEmktLista();
			}
			unset($myObj);
			
			return $value;
		}

		public static function buscarEmktDestinatarioAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){ 
			$value = array();
			$myObj = new EmktDestinatario();
			if( $myObj->buscarEmktDestinatarioAttribute($AttributeFieldNameComparer, $Value, $SearchCompare) ){
				$value[0] = $myObj->getIdEmktDestinatario();	
				$value["id_emkt_destinatario"] = $myObj->getIdEmktDestinatario();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdEmktDisparo();	
				$value["id_emkt_disparo"] = $myObj->getIdEmktDisparo();	
				$value[3] = $myObj->getIdEmktLista();	
				$value["id_emkt_lista"] = $myObj->getIdEmktLista();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarEmktDestinatarioAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){ 
			$value = array();
			$myObj = new EmktDestinatario();
			$vmyObj = $myObj->consultarEmktDestinatarioAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdEmktDestinatario();
				$value[$i]["id_emkt_destinatario"] = $vmyObj[$i]->getIdEmktDestinatario();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdEmktDisparo();
				$value[$i]["id_emkt_disparo"] = $vmyObj[$i]->getIdEmktDisparo();
				$value[$i][3] = $vmyObj[$i]->getIdEmktLista();
				$value[$i]["id_emkt_lista"] = $vmyObj[$i]->getIdEmktLista();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirEmktDestinatario($myIdEmktDestinatario, $myIdentificador, $myIdEmktDisparo, $myIdEmktLista){
			$myObj = new EmktDestinatario();
			$myObj->setEmktDestinatario($myIdEmktDestinatario, $myIdentificador, $myIdEmktDisparo, $myIdEmktLista);
			return $myObj->inserirEmktDestinatario();
		}

		public static function alterarEmktDestinatario($myIdEmktDestinatario, $myIdentificador, $myIdEmktDisparo, $myIdEmktLista){
			$myObj = new EmktDestinatario();
			$myObj->setEmktDestinatario($myIdEmktDestinatario, $myIdentificador, $myIdEmktDisparo, $myIdEmktLista);
			return $myObj->alterarEmktDestinatario();
		}

		public static function alterarAtributoIdEmktDisparo($myIdEmktDestinatario, $myIdEmktDisparo){
			$myObj = new EmktDestinatario();
			$myObj->setIdEmktDestinatario($myIdEmktDestinatario);
			$myObj->setIdEmktDisparo($myIdEmktDisparo);
			return $myObj->alterarAtributoIdEmktDisparo();
		}

		public static function alterarAtributoIdEmktLista($myIdEmktDestinatario, $myIdEmktLista){
			$myObj = new EmktDestinatario();
			$myObj->setIdEmktDestinatario($myIdEmktDestinatario);
			$myObj->setIdEmktLista($myIdEmktLista);
			return $myObj->alterarAtributoIdEmktLista();
		}

		public static function excluirEmktDestinatario($myIdEmktDestinatario){
			$myObj = new EmktDestinatario();
			$myObj->setIdEmktDestinatario($myIdEmktDestinatario);
			return $myObj->excluirEmktDestinatario();
		}

	} 
?>