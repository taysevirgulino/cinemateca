<? 
class EmktDestinatario{ 
	 
	protected $myIdEmktDestinatario, $myIdentificador, $myIdEmktDisparo, $myIdEmktLista;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarEmktDestinatario( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_destinatario ". 
					   "WHERE id_emkt_destinatario = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_destinatario ". 
					   "WHERE (identificador='".$this->getIdentificador()."')"; 
			}break; 
			case 3 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_destinatario ". 
					   "WHERE (id_emkt_disparo=".$this->getIdEmktDisparo().") AND (id_emkt_lista=".$this->getIdEmktLista().")"; 
			}break; 
			case 4 : { 
				$sql = $valor; 
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdEmktDestinatario( $dbq->valor("id_emkt_destinatario") ); 
			$this->setIdentificador( $dbq->valor("identificador") ); 
			$this->setIdEmktDisparo( $dbq->valor("id_emkt_disparo") ); 
			$this->setIdEmktLista( $dbq->valor("id_emkt_lista") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarEmktDestinatario( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_destinatario "; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_destinatario ". 
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
			$obj = new EmktDestinatario(); 
			$obj->setIdEmktDestinatario( $dbq->valor("id_emkt_destinatario") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setIdEmktDisparo( $dbq->valor("id_emkt_disparo") ); 
			$obj->setIdEmktLista( $dbq->valor("id_emkt_lista") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function buscarEmktDestinatarioAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){
		if(!EmktDestinatarioAttribute::_IsValid($AttributeFieldNameComparer)){ return false; }
		if(empty($Value)){ return false; }
		return $this->buscarEmktDestinatario(4, SearchMounter::ValidateAndMounter(EmktDestinatarioAttribute::_Table(), $AttributeFieldNameComparer, $SearchCompare, $Value));
	}

	public function consultarEmktDestinatarioAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){
		return $this->consultarEmktDestinatario(3, SearchMounter::ValidateAndMounter(EmktDestinatarioAttribute::_Table(), $AttributeFieldNameComparer, $SearchComparer, $Value, $AttributeFieldNameOrder, $SearchOrder));
	}

	public function inserirEmktDestinatario(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_emkt_destinatario(identificador, id_emkt_disparo, id_emkt_lista) ". 
			   "VALUES('".$this->tratarString( $this->getIdentificador() )."', ".$this->getIdEmktDisparo().", ".$this->getIdEmktLista().")"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 

		return $this->buscarEmktDestinatario(2, ""); 
	} 
	 
	public function alterarEmktDestinatario(){ 
 
		$sql = "UPDATE tb_emkt_destinatario ". 
			   "SET id_emkt_disparo=".$this->getIdEmktDisparo().", id_emkt_lista=".$this->getIdEmktLista()." ". 
			   "WHERE id_emkt_destinatario = ".$this->getIdEmktDestinatario(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoIdEmktDisparo(){ 
 
		$sql = "UPDATE tb_emkt_destinatario ". 
			   "SET id_emkt_disparo=".$this->getIdEmktDisparo()." ". 
			   "WHERE id_emkt_destinatario = ".$this->getIdEmktDestinatario(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoIdEmktLista(){ 
 
		$sql = "UPDATE tb_emkt_destinatario ". 
			   "SET id_emkt_lista=".$this->getIdEmktLista()." ". 
			   "WHERE id_emkt_destinatario = ".$this->getIdEmktDestinatario(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function excluirEmktDestinatario(){ 
		$sql = "DELETE FROM tb_emkt_destinatario ". 
			   "WHERE id_emkt_destinatario = ".$this->getIdEmktDestinatario(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
	 
	public function getEmktDestinatario(){ 
		return $this; 
	} 
	 
	public function setEmktDestinatario($IdEmktDestinatario, $Identificador, $IdEmktDisparo, $IdEmktLista){ 
			$this->setIdEmktDestinatario( $IdEmktDestinatario ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdEmktDisparo( $IdEmktDisparo ); 
			$this->setIdEmktLista( $IdEmktLista ); 
	} 
 
	public function setIdEmktDestinatario( $valor ){ $this->myIdEmktDestinatario = $valor; } 
	public function getIdEmktDestinatario(){ return $this->myIdEmktDestinatario; } 
 
	public function setIdentificador( $valor ){ $this->myIdentificador = $valor; } 
	public function getIdentificador(){ return (!empty($this->myIdentificador)) ? $this->myIdentificador : $this->myIdentificador = md5(date("YmdHis").mt_rand()); } 
 
	public function setIdEmktDisparo( $valor ){ $this->myIdEmktDisparo = $valor; } 
	public function getIdEmktDisparo(){ return $this->myIdEmktDisparo; } 
 
	public function setIdEmktLista( $valor ){ $this->myIdEmktLista = $valor; } 
	public function getIdEmktLista(){ return $this->myIdEmktLista; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 
}
?>