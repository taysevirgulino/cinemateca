<? 
class BlocoMenu{ 
	 
	protected $myIdBlocoMenu, $myIdentificador, $myIdeOrigem, $myIdBlocoMenuPai, $myNome, $myUrl, $myTarget, $myPrioridade, $myStatus;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarBlocoMenu( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_bloco_menu ". 
					   "WHERE id_bloco_menu = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_bloco_menu ". 
					   "WHERE (identificador='".$this->getIdentificador()."')"; 
			}break; 
			case 3 : { 
				$sql = "SELECT * ". 
					   "FROM tb_bloco_menu ". 
					   "WHERE (ide_origem='".$this->getIdeOrigem()."') AND (id_bloco_menu_pai=".$this->getIdBlocoMenuPai().") AND (nome='".$this->getNome()."') AND (url='".$this->getUrl()."') AND (target='".$this->getTarget()."') AND (prioridade='".$this->getPrioridade()."') AND (status='".$this->getStatus()."')"; 
			}break; 
			case 4 : { 
				$sql = $valor; 
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdBlocoMenu( $dbq->valor("id_bloco_menu") ); 
			$this->setIdentificador( $dbq->valor("identificador") ); 
			$this->setIdeOrigem( $dbq->valor("ide_origem") ); 
			$this->setIdBlocoMenuPai( $dbq->valor("id_bloco_menu_pai") ); 
			$this->setNome( $dbq->valor("nome") ); 
			$this->setUrl( $dbq->valor("url") ); 
			$this->setTarget( $dbq->valor("target") ); 
			$this->setPrioridade( $dbq->valor("prioridade") ); 
			$this->setStatus( $dbq->valor("status") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarBlocoMenu( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_bloco_menu ". 
					   "WHERE ide_origem = '".Current::IdeOrigem()."'"; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_bloco_menu ". 
					   "".$valor." "; 
			}break; 
			case 3 : { 
				$sql = $valor; 
			}break; 
			case 4 : { 
				$sql = "SELECT 
						  tb_bloco_menu.*
						FROM
						  tb_bloco_menu
						ORDER BY
						  tb_bloco_menu.id_bloco_menu_pai,
						  tb_bloco_menu.prioridade"; 
			}break;	
		} 
		 
		if( empty($sql) ){ return null;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		$objs = array(); 
		$i = 0; 
		 
		while( $dbq->registro() ){ 
			$obj = new BlocoMenu(); 
			$obj->setIdBlocoMenu( $dbq->valor("id_bloco_menu") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setIdeOrigem( $dbq->valor("ide_origem") ); 
			$obj->setIdBlocoMenuPai( $dbq->valor("id_bloco_menu_pai") ); 
			$obj->setNome( $dbq->valor("nome") ); 
			$obj->setUrl( $dbq->valor("url") ); 
			$obj->setTarget( $dbq->valor("target") ); 
			$obj->setPrioridade( $dbq->valor("prioridade") ); 
			$obj->setStatus( $dbq->valor("status") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function buscarBlocoMenuAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){
		if(!BlocoMenuAttribute::_IsValid($AttributeFieldNameComparer)){ return false; }
		if(empty($Value)){ return false; }
		return $this->buscarBlocoMenu(4, SearchMounter::ValidateAndMounter(BlocoMenuAttribute::_Table(), $AttributeFieldNameComparer, $SearchCompare, $Value));
	}

	public function consultarBlocoMenuAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){
		return $this->consultarBlocoMenu(3, SearchMounter::ValidateAndMounter(BlocoMenuAttribute::_Table(), $AttributeFieldNameComparer, $SearchComparer, $Value, $AttributeFieldNameOrder, $SearchOrder));
	}

	public function inserirBlocoMenu(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_bloco_menu(identificador, ide_origem, id_bloco_menu_pai, nome, url, target, prioridade, status) ". 
			   "VALUES('".$this->tratarString( $this->getIdentificador() )."', '".$this->tratarString( $this->getIdeOrigem() )."', ".$this->getIdBlocoMenuPai().", '".$this->tratarString( $this->getNome() )."', '".$this->tratarString( $this->getUrl() )."', '".$this->tratarString( $this->getTarget() )."', '".$this->tratarString( $this->getPrioridade() )."', '".$this->tratarString( $this->getStatus() )."')"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 

		return $this->buscarBlocoMenu(2, ""); 
	} 
	 
	public function alterarBlocoMenu(){ 
 
		$sql = "UPDATE tb_bloco_menu ". 
			   "SET id_bloco_menu_pai=".$this->getIdBlocoMenuPai().", nome='".$this->tratarString( $this->getNome() )."', url='".$this->tratarString( $this->getUrl() )."', target='".$this->tratarString( $this->getTarget() )."', prioridade='".$this->tratarString( $this->getPrioridade() )."', status='".$this->tratarString( $this->getStatus() )."' ". 
			   "WHERE id_bloco_menu = ".$this->getIdBlocoMenu(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoIdBlocoMenuPai(){ 
 
		$sql = "UPDATE tb_bloco_menu ". 
			   "SET id_bloco_menu_pai=".$this->getIdBlocoMenuPai()." ". 
			   "WHERE id_bloco_menu = ".$this->getIdBlocoMenu(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoNome(){ 
 
		$sql = "UPDATE tb_bloco_menu ". 
			   "SET nome='".$this->tratarString( $this->getNome() )."' ". 
			   "WHERE id_bloco_menu = ".$this->getIdBlocoMenu(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoUrl(){ 
 
		$sql = "UPDATE tb_bloco_menu ". 
			   "SET url='".$this->tratarString( $this->getUrl() )."' ". 
			   "WHERE id_bloco_menu = ".$this->getIdBlocoMenu(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoTarget(){ 
 
		$sql = "UPDATE tb_bloco_menu ". 
			   "SET target='".$this->tratarString( $this->getTarget() )."' ". 
			   "WHERE id_bloco_menu = ".$this->getIdBlocoMenu(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoPrioridade(){ 
 
		$sql = "UPDATE tb_bloco_menu ". 
			   "SET prioridade='".$this->tratarString( $this->getPrioridade() )."' ". 
			   "WHERE id_bloco_menu = ".$this->getIdBlocoMenu(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoStatus(){ 
 
		$sql = "UPDATE tb_bloco_menu ". 
			   "SET status='".$this->tratarString( $this->getStatus() )."' ". 
			   "WHERE id_bloco_menu = ".$this->getIdBlocoMenu(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function excluirBlocoMenu(){ 
		$sql = "DELETE FROM tb_bloco_menu ". 
			   "WHERE id_bloco_menu = ".$this->getIdBlocoMenu(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
	 
	public function getBlocoMenu(){ 
		return $this; 
	} 
	 
	public function setBlocoMenu($IdBlocoMenu, $Identificador, $IdeOrigem, $IdBlocoMenuPai, $Nome, $Url, $Target, $Prioridade, $Status){ 
			$this->setIdBlocoMenu( $IdBlocoMenu ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setIdBlocoMenuPai( $IdBlocoMenuPai ); 
			$this->setNome( $Nome ); 
			$this->setUrl( $Url ); 
			$this->setTarget( $Target ); 
			$this->setPrioridade( $Prioridade ); 
			$this->setStatus( $Status ); 
	} 
 
	public function setIdBlocoMenu( $valor ){ $this->myIdBlocoMenu = $valor; } 
	public function getIdBlocoMenu(){ return $this->myIdBlocoMenu; } 
 
	public function setIdentificador( $valor ){ $this->myIdentificador = $valor; } 
	public function getIdentificador(){ return (!empty($this->myIdentificador)) ? $this->myIdentificador : $this->myIdentificador = md5(date("YmdHis").mt_rand()); } 
 
	public function setIdeOrigem( $valor ){ $this->myIdeOrigem = $valor; } 
	public function getIdeOrigem(){ return (!empty($this->myIdeOrigem)) ? $this->myIdeOrigem : $this->myIdeOrigem = Current::IdeOrigem(); } 
 
	public function setIdBlocoMenuPai( $valor ){ $this->myIdBlocoMenuPai = $valor; } 
	public function getIdBlocoMenuPai(){ return $this->myIdBlocoMenuPai; } 
 
	public function setNome( $valor ){ $this->myNome = $valor; } 
	public function getNome(){ return $this->myNome; } 
 
	public function setUrl( $valor ){ $this->myUrl = $valor; } 
	public function getUrl(){ return $this->myUrl; } 
 
	public function setTarget( $valor ){ $this->myTarget = $valor; } 
	public function getTarget(){ return $this->myTarget; } 
 
	public function setPrioridade( $valor ){ $this->myPrioridade = $valor; } 
	public function getPrioridade(){ return $this->myPrioridade; } 
 
	public function setStatus( $valor ){ $this->myStatus = $valor; } 
	public function getStatus(){ return $this->myStatus; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 
}
?>