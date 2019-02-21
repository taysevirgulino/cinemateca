<? 
class EmktLista{ 
	 
	protected $myIdEmktLista, $myIdentificador, $myNome;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarEmktLista( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_lista ". 
					   "WHERE id_emkt_lista = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_lista ". 
					   "WHERE (identificador='".$this->getIdentificador()."')"; 
			}break; 
			case 3 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_lista ". 
					   "WHERE (nome='".$this->getNome()."')"; 
			}break; 
			case 4 : { 
				$sql = $valor; 
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdEmktLista( $dbq->valor("id_emkt_lista") ); 
			$this->setIdentificador( $dbq->valor("identificador") ); 
			$this->setNome( $dbq->valor("nome") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarEmktLista( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_lista "; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_lista ". 
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
			$obj = new EmktLista(); 
			$obj->setIdEmktLista( $dbq->valor("id_emkt_lista") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setNome( $dbq->valor("nome") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function buscarEmktListaAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){
		if(!EmktListaAttribute::_IsValid($AttributeFieldNameComparer)){ return false; }
		if(empty($Value)){ return false; }
		return $this->buscarEmktLista(4, SearchMounter::ValidateAndMounter(EmktListaAttribute::_Table(), $AttributeFieldNameComparer, $SearchCompare, $Value));
	}

	public function consultarEmktListaAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){
		return $this->consultarEmktLista(3, SearchMounter::ValidateAndMounter(EmktListaAttribute::_Table(), $AttributeFieldNameComparer, $SearchComparer, $Value, $AttributeFieldNameOrder, $SearchOrder));
	}

	public function inserirEmktLista(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_emkt_lista(identificador, nome) ". 
			   "VALUES('".$this->tratarString( $this->getIdentificador() )."', '".$this->tratarString( $this->getNome() )."')"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 

		return $this->buscarEmktLista(2, ""); 
	} 
	 
	public function alterarEmktLista(){ 
 
		$sql = "UPDATE tb_emkt_lista ". 
			   "SET nome='".$this->tratarString( $this->getNome() )."' ". 
			   "WHERE id_emkt_lista = ".$this->getIdEmktLista(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoNome(){ 
 
		$sql = "UPDATE tb_emkt_lista ". 
			   "SET nome='".$this->tratarString( $this->getNome() )."' ". 
			   "WHERE id_emkt_lista = ".$this->getIdEmktLista(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function excluirEmktLista(){ 
		$sql = "DELETE FROM tb_emkt_lista ". 
			   "WHERE id_emkt_lista = ".$this->getIdEmktLista(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
	 
	public function getEmktLista(){ 
		return $this; 
	} 
	 
	public function setEmktLista($IdEmktLista, $Identificador, $Nome){ 
			$this->setIdEmktLista( $IdEmktLista ); 
			$this->setIdentificador( $Identificador ); 
			$this->setNome( $Nome ); 
	} 
 
	public function setIdEmktLista( $valor ){ $this->myIdEmktLista = $valor; } 
	public function getIdEmktLista(){ return $this->myIdEmktLista; } 
 
	public function setIdentificador( $valor ){ $this->myIdentificador = $valor; } 
	public function getIdentificador(){ return (!empty($this->myIdentificador)) ? $this->myIdentificador : $this->myIdentificador = md5(date("YmdHis").mt_rand()); } 
 
	public function setNome( $valor ){ $this->myNome = $valor; } 
	public function getNome(){ return $this->myNome; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 
}
?>