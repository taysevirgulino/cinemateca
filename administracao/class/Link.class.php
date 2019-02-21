<? 
class Link{ 
	 
	protected $myIdLink, $myIdentificador, $myIdeOrigem, $myNome, $myDescricao, $myUrl, $myTarget, $myPrioridade, $myDatahora, $myStatus;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarLink( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_link ". 
					   "WHERE `id_link` = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_link ". 
					   "WHERE (`identificador`='".$this->getIdentificador()."')"; 
			}break; 
			case 3 : { 
				$sql = "SELECT * ". 
					   "FROM tb_link ". 
					   "WHERE (`ide_origem`='".$this->getIdeOrigem()."') AND (`nome`='".$this->getNome()."') AND (`descricao`='".$this->getDescricao()."') AND (`url`='".$this->getUrl()."') AND (`target`='".$this->getTarget()."') AND (`prioridade`='".$this->getPrioridade()."') AND (`datahora`='".$this->getDatahora()."') AND (`status`='".$this->getStatus()."')"; 
			}break; 
			case 4 : { 
				$sql = $valor; 
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdLink( $dbq->valor("id_link") ); 
			$this->setIdentificador( $dbq->valor("identificador") ); 
			$this->setIdeOrigem( $dbq->valor("ide_origem") ); 
			$this->setNome( $dbq->valor("nome") ); 
			$this->setDescricao( $dbq->valor("descricao") ); 
			$this->setUrl( $dbq->valor("url") ); 
			$this->setTarget( $dbq->valor("target") ); 
			$this->setPrioridade( $dbq->valor("prioridade") ); 
			$this->setDatahora( $dbq->valor("datahora") ); 
			$this->setStatus( $dbq->valor("status") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarLink( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_link ". 
					   "WHERE ide_origem = '".Current::IdeOrigem()."'"; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_link ". 
					   "".$valor." "; 
			}break; 
			case 3 : { 
				$sql = $valor; 
			}break; 
		} 
		 
		if( empty($sql) ){ return null;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		$objs = array(); 
		$i = 0; 
		 
		while( $dbq->registro() ){ 
			$obj = new Link(); 
			$obj->setIdLink( $dbq->valor("id_link") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setIdeOrigem( $dbq->valor("ide_origem") ); 
			$obj->setNome( $dbq->valor("nome") ); 
			$obj->setDescricao( $dbq->valor("descricao") ); 
			$obj->setUrl( $dbq->valor("url") ); 
			$obj->setTarget( $dbq->valor("target") ); 
			$obj->setPrioridade( $dbq->valor("prioridade") ); 
			$obj->setDatahora( $dbq->valor("datahora") ); 
			$obj->setStatus( $dbq->valor("status") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function buscarLinkAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){
		if(!LinkAttribute::_IsValid($AttributeFieldNameComparer)){ return false; }
		if(empty($Value)){ return false; }
		return $this->buscarLink(4, SearchMounter::ValidateAndMounter(LinkAttribute::_Table(), $AttributeFieldNameComparer, $SearchCompare, $Value));
	}

	public function consultarLinkAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){
		return $this->consultarLink(3, SearchMounter::ValidateAndMounter(LinkAttribute::_Table(), $AttributeFieldNameComparer, $SearchComparer, $Value, $AttributeFieldNameOrder, $SearchOrder));
	}

	public function inserirLink(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_link(`identificador`, `ide_origem`, `nome`, `descricao`, `url`, `target`, `prioridade`, `datahora`, `status`) ". 
			   "VALUES('".$this->tratarString( $this->getIdentificador() )."', '".$this->tratarString( $this->getIdeOrigem() )."', '".$this->tratarString( $this->getNome() )."', '".$this->tratarString( $this->getDescricao() )."', '".$this->tratarString( $this->getUrl() )."', '".$this->tratarString( $this->getTarget() )."', '".$this->tratarString( $this->getPrioridade() )."', '".$this->tratarString( $this->getDatahora() )."', '".$this->tratarString( $this->getStatus() )."')"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 

		return $this->buscarLink(2, ""); 
	} 
	 
	public function alterarLink(){ 
 
		$sql = "UPDATE tb_link ". 
			   "SET `ide_origem`='".$this->tratarString( $this->getIdeOrigem() )."', `nome`='".$this->tratarString( $this->getNome() )."', `descricao`='".$this->tratarString( $this->getDescricao() )."', `url`='".$this->tratarString( $this->getUrl() )."', `target`='".$this->tratarString( $this->getTarget() )."', `prioridade`='".$this->tratarString( $this->getPrioridade() )."', `datahora`='".$this->tratarString( $this->getDatahora() )."', `status`='".$this->tratarString( $this->getStatus() )."' ". 
			   "WHERE `id_link` = ".$this->getIdLink(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoNome(){ 
 
		$sql = "UPDATE tb_link ". 
			   "SET `nome`='".$this->tratarString( $this->getNome() )."' ". 
			   "WHERE `id_link` = ".$this->getIdLink(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoDescricao(){ 
 
		$sql = "UPDATE tb_link ". 
			   "SET `descricao`='".$this->tratarString( $this->getDescricao() )."' ". 
			   "WHERE `id_link` = ".$this->getIdLink(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoUrl(){ 
 
		$sql = "UPDATE tb_link ". 
			   "SET `url`='".$this->tratarString( $this->getUrl() )."' ". 
			   "WHERE `id_link` = ".$this->getIdLink(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoTarget(){ 
 
		$sql = "UPDATE tb_link ". 
			   "SET `target`='".$this->tratarString( $this->getTarget() )."' ". 
			   "WHERE `id_link` = ".$this->getIdLink(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoPrioridade(){ 
 
		$sql = "UPDATE tb_link ". 
			   "SET `prioridade`='".$this->tratarString( $this->getPrioridade() )."' ". 
			   "WHERE `id_link` = ".$this->getIdLink(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoDatahora(){ 
 
		$sql = "UPDATE tb_link ". 
			   "SET `datahora`='".$this->tratarString( $this->getDatahora() )."' ". 
			   "WHERE `id_link` = ".$this->getIdLink(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoStatus(){ 
 
		$sql = "UPDATE tb_link ". 
			   "SET `status`='".$this->tratarString( $this->getStatus() )."' ". 
			   "WHERE `id_link` = ".$this->getIdLink(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function excluirLink(){ 
		$sql = "DELETE FROM tb_link ". 
			   "WHERE id_link = ".$this->getIdLink(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
	 
	public function getLink(){ 
		return $this; 
	} 
	 
	public function setLink($IdLink, $Identificador, $IdeOrigem, $Nome, $Descricao, $Url, $Target, $Prioridade, $Datahora, $Status){ 
			$this->setIdLink( $IdLink ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setNome( $Nome ); 
			$this->setDescricao( $Descricao ); 
			$this->setUrl( $Url ); 
			$this->setTarget( $Target ); 
			$this->setPrioridade( $Prioridade ); 
			$this->setDatahora( $Datahora ); 
			$this->setStatus( $Status ); 
	} 
 
	public function setIdLink( $valor ){ $this->myIdLink = $valor; } 
	public function getIdLink(){ return $this->myIdLink; } 
 
	public function setIdentificador( $valor ){ $this->myIdentificador = $valor; } 
	public function getIdentificador(){ return (!empty($this->myIdentificador)) ? $this->myIdentificador : $this->myIdentificador = md5(date("YmdHis").mt_rand()); } 
 
	public function setIdeOrigem( $valor ){ $this->myIdeOrigem = $valor; } 
	public function getIdeOrigem(){ return (!empty($this->myIdeOrigem)) ? $this->myIdeOrigem : $this->myIdeOrigem = Current::IdeOrigem(); } 
 
	public function setNome( $valor ){ $this->myNome = $valor; } 
	public function getNome(){ return $this->myNome; } 
 
	public function setDescricao( $valor ){ $this->myDescricao = $valor; } 
	public function getDescricao(){ return $this->myDescricao; } 
 
	public function setUrl( $valor ){ $this->myUrl = $valor; } 
	public function getUrl(){ return $this->myUrl; } 
 
	public function setTarget( $valor ){ $this->myTarget = $valor; } 
	public function getTarget(){ return $this->myTarget; } 
 
	public function setPrioridade( $valor ){ $this->myPrioridade = $valor; } 
	public function getPrioridade(){ return $this->myPrioridade; } 
 
	public function setDatahora( $valor ){ $this->myDatahora = $valor; } 
	public function getDatahora(){ return $this->myDatahora; } 
 
	public function setStatus( $valor ){ $this->myStatus = $valor; } 
	public function getStatus(){ return $this->myStatus; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 
}
?>