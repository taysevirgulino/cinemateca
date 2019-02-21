<? 
class EmktContatoLista{ 
	 
	protected $myIdEmktContatoLista, $myIdentificador, $myIdEmktContato, $myIdEmktLista;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarEmktContatoLista( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_contato_lista ". 
					   "WHERE id_emkt_contato_lista = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_contato_lista ". 
					   "WHERE (identificador='".$this->getIdentificador()."')"; 
			}break; 
			case 3 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_contato_lista ". 
					   "WHERE (id_emkt_contato=".$this->getIdEmktContato().") AND (id_emkt_lista=".$this->getIdEmktLista().")"; 
			}break; 
			case 4 : { 
				$sql = $valor; 
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdEmktContatoLista( $dbq->valor("id_emkt_contato_lista") ); 
			$this->setIdentificador( $dbq->valor("identificador") ); 
			$this->setIdEmktContato( $dbq->valor("id_emkt_contato") ); 
			$this->setIdEmktLista( $dbq->valor("id_emkt_lista") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarEmktContatoLista( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_contato_lista "; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_contato_lista ". 
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
			$obj = new EmktContatoLista(); 
			$obj->setIdEmktContatoLista( $dbq->valor("id_emkt_contato_lista") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setIdEmktContato( $dbq->valor("id_emkt_contato") ); 
			$obj->setIdEmktLista( $dbq->valor("id_emkt_lista") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function buscarEmktContatoListaAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){
		if(!EmktContatoListaAttribute::_IsValid($AttributeFieldNameComparer)){ return false; }
		if(empty($Value)){ return false; }
		return $this->buscarEmktContatoLista(4, SearchMounter::ValidateAndMounter(EmktContatoListaAttribute::_Table(), $AttributeFieldNameComparer, $SearchCompare, $Value));
	}

	public function consultarEmktContatoListaAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){
		return $this->consultarEmktContatoLista(3, SearchMounter::ValidateAndMounter(EmktContatoListaAttribute::_Table(), $AttributeFieldNameComparer, $SearchComparer, $Value, $AttributeFieldNameOrder, $SearchOrder));
	}

	public function inserirEmktContatoLista(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_emkt_contato_lista(identificador, id_emkt_contato, id_emkt_lista) ". 
			   "VALUES('".$this->tratarString( $this->getIdentificador() )."', ".$this->getIdEmktContato().", ".$this->getIdEmktLista().")"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 

		return $this->buscarEmktContatoLista(2, ""); 
	} 
	 
	public function alterarEmktContatoLista(){ 
 
		$sql = "UPDATE tb_emkt_contato_lista ". 
			   "SET id_emkt_contato=".$this->getIdEmktContato().", id_emkt_lista=".$this->getIdEmktLista()." ". 
			   "WHERE id_emkt_contato_lista = ".$this->getIdEmktContatoLista(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoIdEmktContato(){ 
 
		$sql = "UPDATE tb_emkt_contato_lista ". 
			   "SET id_emkt_contato=".$this->getIdEmktContato()." ". 
			   "WHERE id_emkt_contato_lista = ".$this->getIdEmktContatoLista(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoIdEmktLista(){ 
 
		$sql = "UPDATE tb_emkt_contato_lista ". 
			   "SET id_emkt_lista=".$this->getIdEmktLista()." ". 
			   "WHERE id_emkt_contato_lista = ".$this->getIdEmktContatoLista(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function excluirEmktContatoLista(){ 
		$sql = "DELETE FROM tb_emkt_contato_lista ". 
			   "WHERE id_emkt_contato_lista = ".$this->getIdEmktContatoLista(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
	 
	public function getEmktContatoLista(){ 
		return $this; 
	} 
	 
	public function setEmktContatoLista($IdEmktContatoLista, $Identificador, $IdEmktContato, $IdEmktLista){ 
			$this->setIdEmktContatoLista( $IdEmktContatoLista ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdEmktContato( $IdEmktContato ); 
			$this->setIdEmktLista( $IdEmktLista ); 
	} 
 
	public function setIdEmktContatoLista( $valor ){ $this->myIdEmktContatoLista = $valor; } 
	public function getIdEmktContatoLista(){ return $this->myIdEmktContatoLista; } 
 
	public function setIdentificador( $valor ){ $this->myIdentificador = $valor; } 
	public function getIdentificador(){ return (!empty($this->myIdentificador)) ? $this->myIdentificador : $this->myIdentificador = md5(date("YmdHis").mt_rand()); } 
 
	public function setIdEmktContato( $valor ){ $this->myIdEmktContato = $valor; } 
	public function getIdEmktContato(){ return $this->myIdEmktContato; } 
 
	public function setIdEmktLista( $valor ){ $this->myIdEmktLista = $valor; } 
	public function getIdEmktLista(){ return $this->myIdEmktLista; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 
}
?>