<? 
	class AreaPublicacaoInternaManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarAreaPublicacaoInterna( $tipo, $valor ){ 
			$value = array();
			$myObj = new AreaPublicacaoInterna();
			if( $myObj->buscarAreaPublicacaoInterna( $tipo, $valor ) ){
				$value["id_area_publicacao_interna"] = $myObj->getIdAreaPublicacaoInterna();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value["nome"] = $myObj->getNome();	
				$value["quantidade"] = $myObj->getQuantidade();	
				$value["prioridade"] = $myObj->getPrioridade();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarAreaPublicacaoInterna( $tipo, $valor ){ 
			$value = array();
			$myObj = new AreaPublicacaoInterna();
			$vmyObj = $myObj->consultarAreaPublicacaoInterna( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i]["id_area_publicacao_interna"] = $vmyObj[$i]->getIdAreaPublicacaoInterna();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				$value[$i]["quantidade"] = $vmyObj[$i]->getQuantidade();
				$value[$i]["prioridade"] = $vmyObj[$i]->getPrioridade();
			}
			unset($myObj);
			
			return $value;
		}

		public static function buscarAreaPublicacaoInternaAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){ 
			$value = array();
			$myObj = new AreaPublicacaoInterna();
			if( $myObj->buscarAreaPublicacaoInternaAttribute($AttributeFieldNameComparer, $Value, $SearchCompare) ){
				$value["id_area_publicacao_interna"] = $myObj->getIdAreaPublicacaoInterna();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value["nome"] = $myObj->getNome();	
				$value["quantidade"] = $myObj->getQuantidade();	
				$value["prioridade"] = $myObj->getPrioridade();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarAreaPublicacaoInternaAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){ 
			$value = array();
			$myObj = new AreaPublicacaoInterna();
			$vmyObj = $myObj->consultarAreaPublicacaoInternaAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i]["id_area_publicacao_interna"] = $vmyObj[$i]->getIdAreaPublicacaoInterna();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				$value[$i]["quantidade"] = $vmyObj[$i]->getQuantidade();
				$value[$i]["prioridade"] = $vmyObj[$i]->getPrioridade();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirAreaPublicacaoInterna($myIdAreaPublicacaoInterna, $myIdentificador, $myNome, $myQuantidade, $myPrioridade){
			$myObj = new AreaPublicacaoInterna();
			$myObj->setAreaPublicacaoInterna($myIdAreaPublicacaoInterna, $myIdentificador, $myNome, $myQuantidade, $myPrioridade);
			return $myObj->inserirAreaPublicacaoInterna();
		}

		public static function alterarAreaPublicacaoInterna($myIdAreaPublicacaoInterna, $myIdentificador, $myNome, $myQuantidade, $myPrioridade){
			$myObj = new AreaPublicacaoInterna();
			$myObj->setAreaPublicacaoInterna($myIdAreaPublicacaoInterna, $myIdentificador, $myNome, $myQuantidade, $myPrioridade);
			return $myObj->alterarAreaPublicacaoInterna();
		}

		public static function alterarAtributoIdentificador($myIdAreaPublicacaoInterna, $myIdentificador){
			$myObj = new AreaPublicacaoInterna();
			$myObj->setIdAreaPublicacaoInterna($myIdAreaPublicacaoInterna);
			$myObj->setIdentificador($myIdentificador);
			return $myObj->alterarAtributoIdentificador();
		}

		public static function alterarAtributoNome($myIdAreaPublicacaoInterna, $myNome){
			$myObj = new AreaPublicacaoInterna();
			$myObj->setIdAreaPublicacaoInterna($myIdAreaPublicacaoInterna);
			$myObj->setNome($myNome);
			return $myObj->alterarAtributoNome();
		}

		public static function alterarAtributoQuantidade($myIdAreaPublicacaoInterna, $myQuantidade){
			$myObj = new AreaPublicacaoInterna();
			$myObj->setIdAreaPublicacaoInterna($myIdAreaPublicacaoInterna);
			$myObj->setQuantidade($myQuantidade);
			return $myObj->alterarAtributoQuantidade();
		}

		public static function alterarAtributoPrioridade($myIdAreaPublicacaoInterna, $myPrioridade){
			$myObj = new AreaPublicacaoInterna();
			$myObj->setIdAreaPublicacaoInterna($myIdAreaPublicacaoInterna);
			$myObj->setPrioridade($myPrioridade);
			return $myObj->alterarAtributoPrioridade();
		}

		public static function excluirAreaPublicacaoInterna($myIdAreaPublicacaoInterna){
			$myObj = new AreaPublicacaoInterna();
			$myObj->setIdAreaPublicacaoInterna($myIdAreaPublicacaoInterna);
			return $myObj->excluirAreaPublicacaoInterna();
		}

		public static function ultimaPrioridade(){
			$sql = "SELECT 
					  tb_area_publicacao_interna.*
					FROM
					  tb_area_publicacao_interna
					ORDER BY
					  tb_area_publicacao_interna.prioridade DESC
					LIMIT 1";
			$obj = AreaPublicacaoInternaManage::buscarAreaPublicacaoInterna(4, $sql);
			return(intval($obj["prioridade"])+1);
		}
	} 
?>