<? 
class EmktContato{ 
	 
	protected $myIdEmktContato, $myIdentificador, $myNome, $myEmail, $myStatus;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarEmktContato( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_contato ". 
					   "WHERE id_emkt_contato = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_contato ". 
					   "WHERE (identificador='".$this->getIdentificador()."')"; 
			}break; 
			case 3 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_contato ". 
					   "WHERE (nome='".$this->getNome()."') AND (email='".$this->getEmail()."') AND (status='".$this->getStatus()."')"; 
			}break; 
			case 4 : { 
				$sql = $valor; 
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdEmktContato( $dbq->valor("id_emkt_contato") ); 
			$this->setIdentificador( $dbq->valor("identificador") ); 
			$this->setNome( $dbq->valor("nome") ); 
			$this->setEmail( $dbq->valor("email") ); 
			$this->setStatus( $dbq->valor("status") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarEmktContato( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_contato "; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_contato ". 
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
			$obj = new EmktContato(); 
			$obj->setIdEmktContato( $dbq->valor("id_emkt_contato") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setNome( $dbq->valor("nome") ); 
			$obj->setEmail( $dbq->valor("email") ); 
			$obj->setStatus( $dbq->valor("status") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function buscarEmktContatoAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){
		if(!EmktContatoAttribute::_IsValid($AttributeFieldNameComparer)){ return false; }
		if(empty($Value)){ return false; }
		return $this->buscarEmktContato(4, SearchMounter::ValidateAndMounter(EmktContatoAttribute::_Table(), $AttributeFieldNameComparer, $SearchCompare, $Value));
	}

	public function consultarEmktContatoAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){
		return $this->consultarEmktContato(3, SearchMounter::ValidateAndMounter(EmktContatoAttribute::_Table(), $AttributeFieldNameComparer, $SearchComparer, $Value, $AttributeFieldNameOrder, $SearchOrder));
	}

	public function inserirEmktContato(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_emkt_contato(identificador, nome, email, status) ". 
			   "VALUES('".$this->tratarString( $this->getIdentificador() )."', '".$this->tratarString( $this->getNome() )."', '".$this->tratarString( $this->getEmail() )."', '".$this->tratarString( $this->getStatus() )."')"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 

		return $this->buscarEmktContato(2, ""); 
	} 
	 
	public function alterarEmktContato(){ 
 
		$sql = "UPDATE tb_emkt_contato ". 
			   "SET nome='".$this->tratarString( $this->getNome() )."', email='".$this->tratarString( $this->getEmail() )."', status='".$this->tratarString( $this->getStatus() )."' ". 
			   "WHERE id_emkt_contato = ".$this->getIdEmktContato(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoNome(){ 
 
		$sql = "UPDATE tb_emkt_contato ". 
			   "SET nome='".$this->tratarString( $this->getNome() )."' ". 
			   "WHERE id_emkt_contato = ".$this->getIdEmktContato(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoEmail(){ 
 
		$sql = "UPDATE tb_emkt_contato ". 
			   "SET email='".$this->tratarString( $this->getEmail() )."' ". 
			   "WHERE id_emkt_contato = ".$this->getIdEmktContato(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoStatus(){ 
 
		$sql = "UPDATE tb_emkt_contato ". 
			   "SET status='".$this->tratarString( $this->getStatus() )."' ". 
			   "WHERE id_emkt_contato = ".$this->getIdEmktContato(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function excluirEmktContato(){ 
		$sql = "DELETE FROM tb_emkt_contato ". 
			   "WHERE id_emkt_contato = ".$this->getIdEmktContato(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
	 
	public function getEmktContato(){ 
		return $this; 
	} 
	 
	public function setEmktContato($IdEmktContato, $Identificador, $Nome, $Email, $Status){ 
			$this->setIdEmktContato( $IdEmktContato ); 
			$this->setIdentificador( $Identificador ); 
			$this->setNome( $Nome ); 
			$this->setEmail( $Email ); 
			$this->setStatus( $Status ); 
	} 
 
	public function setIdEmktContato( $valor ){ $this->myIdEmktContato = $valor; } 
	public function getIdEmktContato(){ return $this->myIdEmktContato; } 
 
	public function setIdentificador( $valor ){ $this->myIdentificador = $valor; } 
	public function getIdentificador(){ return (!empty($this->myIdentificador)) ? $this->myIdentificador : $this->myIdentificador = md5(date("YmdHis").mt_rand()); } 
 
	public function setNome( $valor ){ $this->myNome = $valor; } 
	public function getNome(){ return $this->myNome; } 
 
	public function setEmail( $valor ){ $this->myEmail = $valor; } 
	public function getEmail(){ return $this->myEmail; } 
 
	public function setStatus( $valor ){ $this->myStatus = $valor; } 
	public function getStatus(){ return $this->myStatus; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 
}
?>