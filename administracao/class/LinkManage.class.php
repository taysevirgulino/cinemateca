<? 
	class LinkManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarLink( $tipo, $valor ){ 
			$value = array();
			$myObj = new Link();
			if( $myObj->buscarLink( $tipo, $valor ) ){
				$value[0] = $myObj->getIdLink();	
				$value["id_link"] = $myObj->getIdLink();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdeOrigem();	
				$value["ide_origem"] = $myObj->getIdeOrigem();	
				$value[3] = $myObj->getNome();	
				$value["nome"] = $myObj->getNome();	
				$value[4] = $myObj->getDescricao();	
				$value["descricao"] = $myObj->getDescricao();	
				$value[5] = $myObj->getUrl();	
				$value["url"] = $myObj->getUrl();	
				$value[6] = $myObj->getTarget();	
				$value["target"] = $myObj->getTarget();	
				$value[7] = $myObj->getPrioridade();	
				$value["prioridade"] = $myObj->getPrioridade();	
				$value[8] = $myObj->getDatahora();	
				$value["datahora"] = $myObj->getDatahora();	
				$value[9] = $myObj->getStatus();	
				$value["status"] = $myObj->getStatus();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarLink( $tipo, $valor ){ 
			$value = array();
			$myObj = new Link();
			$vmyObj = $myObj->consultarLink( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdLink();
				$value[$i]["id_link"] = $vmyObj[$i]->getIdLink();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdeOrigem();
				$value[$i]["ide_origem"] = $vmyObj[$i]->getIdeOrigem();
				$value[$i][3] = $vmyObj[$i]->getNome();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				$value[$i][4] = $vmyObj[$i]->getDescricao();
				$value[$i]["descricao"] = $vmyObj[$i]->getDescricao();
				$value[$i][5] = $vmyObj[$i]->getUrl();
				$value[$i]["url"] = $vmyObj[$i]->getUrl();
				$value[$i][6] = $vmyObj[$i]->getTarget();
				$value[$i]["target"] = $vmyObj[$i]->getTarget();
				$value[$i][7] = $vmyObj[$i]->getPrioridade();
				$value[$i]["prioridade"] = $vmyObj[$i]->getPrioridade();
				$value[$i][8] = $vmyObj[$i]->getDatahora();
				$value[$i]["datahora"] = $vmyObj[$i]->getDatahora();
				$value[$i][9] = $vmyObj[$i]->getStatus();
				$value[$i]["status"] = $vmyObj[$i]->getStatus();
			}
			unset($myObj);
			
			return $value;
		}

		public static function buscarLinkAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){ 
			$value = array();
			$myObj = new Link();
			if( $myObj->buscarLinkAttribute($AttributeFieldNameComparer, $Value, $SearchCompare) ){
				$value[0] = $myObj->getIdLink();	
				$value["id_link"] = $myObj->getIdLink();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdeOrigem();	
				$value["ide_origem"] = $myObj->getIdeOrigem();	
				$value[3] = $myObj->getNome();	
				$value["nome"] = $myObj->getNome();	
				$value[4] = $myObj->getDescricao();	
				$value["descricao"] = $myObj->getDescricao();	
				$value[5] = $myObj->getUrl();	
				$value["url"] = $myObj->getUrl();	
				$value[6] = $myObj->getTarget();	
				$value["target"] = $myObj->getTarget();	
				$value[7] = $myObj->getPrioridade();	
				$value["prioridade"] = $myObj->getPrioridade();	
				$value[8] = $myObj->getDatahora();	
				$value["datahora"] = $myObj->getDatahora();	
				$value[9] = $myObj->getStatus();	
				$value["status"] = $myObj->getStatus();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarLinkAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){ 
			$value = array();
			$myObj = new Link();
			$vmyObj = $myObj->consultarLinkAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdLink();
				$value[$i]["id_link"] = $vmyObj[$i]->getIdLink();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdeOrigem();
				$value[$i]["ide_origem"] = $vmyObj[$i]->getIdeOrigem();
				$value[$i][3] = $vmyObj[$i]->getNome();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				$value[$i][4] = $vmyObj[$i]->getDescricao();
				$value[$i]["descricao"] = $vmyObj[$i]->getDescricao();
				$value[$i][5] = $vmyObj[$i]->getUrl();
				$value[$i]["url"] = $vmyObj[$i]->getUrl();
				$value[$i][6] = $vmyObj[$i]->getTarget();
				$value[$i]["target"] = $vmyObj[$i]->getTarget();
				$value[$i][7] = $vmyObj[$i]->getPrioridade();
				$value[$i]["prioridade"] = $vmyObj[$i]->getPrioridade();
				$value[$i][8] = $vmyObj[$i]->getDatahora();
				$value[$i]["datahora"] = $vmyObj[$i]->getDatahora();
				$value[$i][9] = $vmyObj[$i]->getStatus();
				$value[$i]["status"] = $vmyObj[$i]->getStatus();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirLink($myIdLink, $myIdentificador, $myIdeOrigem, $myNome, $myDescricao, $myUrl, $myTarget, $myPrioridade, $myDatahora, $myStatus){
			$myObj = new Link();
			$myObj->setLink($myIdLink, $myIdentificador, $myIdeOrigem, $myNome, $myDescricao, $myUrl, $myTarget, $myPrioridade, $myDatahora, $myStatus);
			return $myObj->inserirLink();
		}

		public static function alterarLink($myIdLink, $myIdentificador, $myIdeOrigem, $myNome, $myDescricao, $myUrl, $myTarget, $myPrioridade, $myDatahora, $myStatus){
			$myObj = new Link();
			$myObj->setLink($myIdLink, $myIdentificador, $myIdeOrigem, $myNome, $myDescricao, $myUrl, $myTarget, $myPrioridade, $myDatahora, $myStatus);
			return $myObj->alterarLink();
		}

		public static function alterarAtributoIdentificador($myIdLink, $myIdentificador){
			$myObj = new Link();
			$myObj->setIdLink($myIdLink);
			$myObj->setIdentificador($myIdentificador);
			return $myObj->alterarAtributoIdentificador();
		}

		public static function alterarAtributoIdeOrigem($myIdLink, $myIdeOrigem){
			$myObj = new Link();
			$myObj->setIdLink($myIdLink);
			$myObj->setIdeOrigem($myIdeOrigem);
			return $myObj->alterarAtributoIdeOrigem();
		}

		public static function alterarAtributoNome($myIdLink, $myNome){
			$myObj = new Link();
			$myObj->setIdLink($myIdLink);
			$myObj->setNome($myNome);
			return $myObj->alterarAtributoNome();
		}

		public static function alterarAtributoDescricao($myIdLink, $myDescricao){
			$myObj = new Link();
			$myObj->setIdLink($myIdLink);
			$myObj->setDescricao($myDescricao);
			return $myObj->alterarAtributoDescricao();
		}

		public static function alterarAtributoUrl($myIdLink, $myUrl){
			$myObj = new Link();
			$myObj->setIdLink($myIdLink);
			$myObj->setUrl($myUrl);
			return $myObj->alterarAtributoUrl();
		}

		public static function alterarAtributoTarget($myIdLink, $myTarget){
			$myObj = new Link();
			$myObj->setIdLink($myIdLink);
			$myObj->setTarget($myTarget);
			return $myObj->alterarAtributoTarget();
		}

		public static function alterarAtributoPrioridade($myIdLink, $myPrioridade){
			$myObj = new Link();
			$myObj->setIdLink($myIdLink);
			$myObj->setPrioridade($myPrioridade);
			return $myObj->alterarAtributoPrioridade();
		}

		public static function alterarAtributoDatahora($myIdLink, $myDatahora){
			$myObj = new Link();
			$myObj->setIdLink($myIdLink);
			$myObj->setDatahora($myDatahora);
			return $myObj->alterarAtributoDatahora();
		}

		public static function alterarAtributoStatus($myIdLink, $myStatus){
			$myObj = new Link();
			$myObj->setIdLink($myIdLink);
			$myObj->setStatus($myStatus);
			return $myObj->alterarAtributoStatus();
		}

		public static function excluirLink($myIdLink){
			$myObj = new Link();
			$myObj->setIdLink($myIdLink);
			return $myObj->excluirLink();
		}

		public static function ultimaPrioridade(){
			$sql = "SELECT 
					  tb_link.*
					FROM
					  tb_link
					ORDER BY
					  tb_link.prioridade DESC
					LIMIT 1";
			$obj = LinkManage::buscarLink(4, $sql);
			return(intval($obj["prioridade"])+1);
		}
	} 
?>