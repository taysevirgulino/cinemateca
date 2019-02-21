<? 
	class EmktContatoListaManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarEmktContatoLista( $tipo, $valor ){ 
			$value = array();
			$myObj = new EmktContatoLista();
			if( $myObj->buscarEmktContatoLista( $tipo, $valor ) ){
				$value[0] = $myObj->getIdEmktContatoLista();	
				$value["id_emkt_contato_lista"] = $myObj->getIdEmktContatoLista();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdEmktContato();	
				$value["id_emkt_contato"] = $myObj->getIdEmktContato();	
				$value[3] = $myObj->getIdEmktLista();	
				$value["id_emkt_lista"] = $myObj->getIdEmktLista();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarEmktContatoLista( $tipo, $valor ){ 
			$value = array();
			$myObj = new EmktContatoLista();
			$vmyObj = $myObj->consultarEmktContatoLista( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdEmktContatoLista();
				$value[$i]["id_emkt_contato_lista"] = $vmyObj[$i]->getIdEmktContatoLista();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdEmktContato();
				$value[$i]["id_emkt_contato"] = $vmyObj[$i]->getIdEmktContato();
				$value[$i][3] = $vmyObj[$i]->getIdEmktLista();
				$value[$i]["id_emkt_lista"] = $vmyObj[$i]->getIdEmktLista();
			}
			unset($myObj);
			
			return $value;
		}

		public static function buscarEmktContatoListaAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){ 
			$value = array();
			$myObj = new EmktContatoLista();
			if( $myObj->buscarEmktContatoListaAttribute($AttributeFieldNameComparer, $Value, $SearchCompare) ){
				$value[0] = $myObj->getIdEmktContatoLista();	
				$value["id_emkt_contato_lista"] = $myObj->getIdEmktContatoLista();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdEmktContato();	
				$value["id_emkt_contato"] = $myObj->getIdEmktContato();	
				$value[3] = $myObj->getIdEmktLista();	
				$value["id_emkt_lista"] = $myObj->getIdEmktLista();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarEmktContatoListaAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){ 
			$value = array();
			$myObj = new EmktContatoLista();
			$vmyObj = $myObj->consultarEmktContatoListaAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdEmktContatoLista();
				$value[$i]["id_emkt_contato_lista"] = $vmyObj[$i]->getIdEmktContatoLista();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdEmktContato();
				$value[$i]["id_emkt_contato"] = $vmyObj[$i]->getIdEmktContato();
				$value[$i][3] = $vmyObj[$i]->getIdEmktLista();
				$value[$i]["id_emkt_lista"] = $vmyObj[$i]->getIdEmktLista();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirEmktContatoLista($myIdEmktContatoLista, $myIdentificador, $myIdEmktContato, $myIdEmktLista){
			$myObj = new EmktContatoLista();
			$myObj->setEmktContatoLista($myIdEmktContatoLista, $myIdentificador, $myIdEmktContato, $myIdEmktLista);
			return $myObj->inserirEmktContatoLista();
		}

		public static function alterarEmktContatoLista($myIdEmktContatoLista, $myIdentificador, $myIdEmktContato, $myIdEmktLista){
			$myObj = new EmktContatoLista();
			$myObj->setEmktContatoLista($myIdEmktContatoLista, $myIdentificador, $myIdEmktContato, $myIdEmktLista);
			return $myObj->alterarEmktContatoLista();
		}

		public static function alterarAtributoIdEmktContato($myIdEmktContatoLista, $myIdEmktContato){
			$myObj = new EmktContatoLista();
			$myObj->setIdEmktContatoLista($myIdEmktContatoLista);
			$myObj->setIdEmktContato($myIdEmktContato);
			return $myObj->alterarAtributoIdEmktContato();
		}

		public static function alterarAtributoIdEmktLista($myIdEmktContatoLista, $myIdEmktLista){
			$myObj = new EmktContatoLista();
			$myObj->setIdEmktContatoLista($myIdEmktContatoLista);
			$myObj->setIdEmktLista($myIdEmktLista);
			return $myObj->alterarAtributoIdEmktLista();
		}

		public static function excluirEmktContatoLista($myIdEmktContatoLista){
			$myObj = new EmktContatoLista();
			$myObj->setIdEmktContatoLista($myIdEmktContatoLista);
			return $myObj->excluirEmktContatoLista();
		}

	} 
?>