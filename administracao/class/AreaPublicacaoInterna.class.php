<? 
class AreaPublicacaoInterna{ 
	 
	protected $myIdAreaPublicacaoInterna, $myIdentificador, $myNome, $myQuantidade, $myPrioridade;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarAreaPublicacaoInterna( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_area_publicacao_interna ". 
					   "WHERE `id_area_publicacao_interna` = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_area_publicacao_interna ". 
					   "WHERE (`identificador`='".$this->getIdentificador()."')"; 
			}break; 
			case 3 : { 
				$sql = "SELECT * ". 
					   "FROM tb_area_publicacao_interna ". 
					   "WHERE (`nome`='".$this->getNome()."') AND (`quantidade`='".$this->getQuantidade()."') AND (`prioridade`='".$this->getPrioridade()."')"; 
			}break; 
			case 4 : { 
				$sql = $valor; 
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdAreaPublicacaoInterna( $dbq->valor("id_area_publicacao_interna") ); 
			$this->setIdentificador( $dbq->valor("identificador") ); 
			$this->setNome( $dbq->valor("nome") ); 
			$this->setQuantidade( $dbq->valor("quantidade") ); 
			$this->setPrioridade( $dbq->valor("prioridade") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarAreaPublicacaoInterna( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_area_publicacao_interna "; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_area_publicacao_interna ". 
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
			$obj = new AreaPublicacaoInterna(); 
			$obj->setIdAreaPublicacaoInterna( $dbq->valor("id_area_publicacao_interna") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setNome( $dbq->valor("nome") ); 
			$obj->setQuantidade( $dbq->valor("quantidade") ); 
			$obj->setPrioridade( $dbq->valor("prioridade") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function buscarAreaPublicacaoInternaAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){
		if(!AreaPublicacaoInternaAttribute::_IsValid($AttributeFieldNameComparer)){ return false; }
		if(empty($Value)){ return false; }
		return $this->buscarAreaPublicacaoInterna(4, SearchMounter::ValidateAndMounter(AreaPublicacaoInternaAttribute::_Table(), $AttributeFieldNameComparer, $SearchCompare, $Value));
	}

	public function consultarAreaPublicacaoInternaAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){
		return $this->consultarAreaPublicacaoInterna(3, SearchMounter::ValidateAndMounter(AreaPublicacaoInternaAttribute::_Table(), $AttributeFieldNameComparer, $SearchComparer, $Value, $AttributeFieldNameOrder, $SearchOrder));
	}

	public function inserirAreaPublicacaoInterna(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_area_publicacao_interna(`identificador`, `nome`, `quantidade`, `prioridade`) ". 
			   "VALUES('".$this->tratarString( $this->getIdentificador() )."', '".$this->tratarString( $this->getNome() )."', '".$this->tratarString( $this->getQuantidade() )."', '".$this->tratarString( $this->getPrioridade() )."')"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 

		return $this->buscarAreaPublicacaoInterna(2, ""); 
	} 
	 
	public function alterarAreaPublicacaoInterna(){ 
 
		$sql = "UPDATE tb_area_publicacao_interna ". 
			   "SET `nome`='".$this->tratarString( $this->getNome() )."', `quantidade`='".$this->tratarString( $this->getQuantidade() )."', `prioridade`='".$this->tratarString( $this->getPrioridade() )."' ". 
			   "WHERE `id_area_publicacao_interna` = ".$this->getIdAreaPublicacaoInterna(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoNome(){ 
 
		$sql = "UPDATE tb_area_publicacao_interna ". 
			   "SET `nome`='".$this->tratarString( $this->getNome() )."' ". 
			   "WHERE `id_area_publicacao_interna` = ".$this->getIdAreaPublicacaoInterna(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoQuantidade(){ 
 
		$sql = "UPDATE tb_area_publicacao_interna ". 
			   "SET `quantidade`='".$this->tratarString( $this->getQuantidade() )."' ". 
			   "WHERE `id_area_publicacao_interna` = ".$this->getIdAreaPublicacaoInterna(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoPrioridade(){ 
 
		$sql = "UPDATE tb_area_publicacao_interna ". 
			   "SET `prioridade`='".$this->tratarString( $this->getPrioridade() )."' ". 
			   "WHERE `id_area_publicacao_interna` = ".$this->getIdAreaPublicacaoInterna(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function excluirAreaPublicacaoInterna(){ 
		$sql = "DELETE FROM tb_area_publicacao_interna ". 
			   "WHERE id_area_publicacao_interna = ".$this->getIdAreaPublicacaoInterna(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
	 
	public function getAreaPublicacaoInterna(){ 
		return $this; 
	} 
	 
	public function setAreaPublicacaoInterna($IdAreaPublicacaoInterna, $Identificador, $Nome, $Quantidade, $Prioridade){ 
			$this->setIdAreaPublicacaoInterna( $IdAreaPublicacaoInterna ); 
			$this->setIdentificador( $Identificador ); 
			$this->setNome( $Nome ); 
			$this->setQuantidade( $Quantidade ); 
			$this->setPrioridade( $Prioridade ); 
	} 
 
	public function setIdAreaPublicacaoInterna( $valor ){ $this->myIdAreaPublicacaoInterna = $valor; } 
	public function getIdAreaPublicacaoInterna(){ return $this->myIdAreaPublicacaoInterna; } 
 
	public function setIdentificador( $valor ){ $this->myIdentificador = $valor; } 
	public function getIdentificador(){ return (!empty($this->myIdentificador)) ? $this->myIdentificador : $this->myIdentificador = md5(date("YmdHis").mt_rand()); } 
 
	public function setNome( $valor ){ $this->myNome = $valor; } 
	public function getNome(){ return $this->myNome; } 
 
	public function setQuantidade( $valor ){ $this->myQuantidade = $valor; } 
	public function getQuantidade(){ return $this->myQuantidade; } 
 
	public function setPrioridade( $valor ){ $this->myPrioridade = $valor; } 
	public function getPrioridade(){ return $this->myPrioridade; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 
}
?>