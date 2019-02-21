<? 
class EmktDisparo{ 
	 
	protected $myIdEmktDisparo, $myIdentificador, $myIdEmkt, $myAgendamento, $myResultado, $myStatus;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarEmktDisparo( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_disparo ". 
					   "WHERE id_emkt_disparo = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_disparo ". 
					   "WHERE (identificador='".$this->getIdentificador()."')"; 
			}break; 
			case 3 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_disparo ". 
					   "WHERE (id_emkt=".$this->getIdEmkt().") AND (agendamento='".$this->getAgendamento()."') AND (resultado='".$this->getResultado()."') AND (status='".$this->getStatus()."')"; 
			}break; 
			case 4 : { 
				$sql = $valor; 
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdEmktDisparo( $dbq->valor("id_emkt_disparo") ); 
			$this->setIdentificador( $dbq->valor("identificador") ); 
			$this->setIdEmkt( $dbq->valor("id_emkt") ); 
			$this->setAgendamento( $dbq->valor("agendamento") ); 
			$this->setResultado( $dbq->valor("resultado") ); 
			$this->setStatus( $dbq->valor("status") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarEmktDisparo( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_disparo "; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_emkt_disparo ". 
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
			$obj = new EmktDisparo(); 
			$obj->setIdEmktDisparo( $dbq->valor("id_emkt_disparo") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setIdEmkt( $dbq->valor("id_emkt") ); 
			$obj->setAgendamento( $dbq->valor("agendamento") ); 
			$obj->setResultado( $dbq->valor("resultado") ); 
			$obj->setStatus( $dbq->valor("status") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function buscarEmktDisparoAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){
		if(!EmktDisparoAttribute::_IsValid($AttributeFieldNameComparer)){ return false; }
		if(empty($Value)){ return false; }
		return $this->buscarEmktDisparo(4, SearchMounter::ValidateAndMounter(EmktDisparoAttribute::_Table(), $AttributeFieldNameComparer, $SearchCompare, $Value));
	}

	public function consultarEmktDisparoAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){
		return $this->consultarEmktDisparo(3, SearchMounter::ValidateAndMounter(EmktDisparoAttribute::_Table(), $AttributeFieldNameComparer, $SearchComparer, $Value, $AttributeFieldNameOrder, $SearchOrder));
	}

	public function inserirEmktDisparo(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_emkt_disparo(identificador, id_emkt, agendamento, resultado, status) ". 
			   "VALUES('".$this->tratarString( $this->getIdentificador() )."', ".$this->getIdEmkt().", '".$this->tratarString( $this->getAgendamento() )."', '".$this->tratarString( $this->getResultado() )."', '".$this->tratarString( $this->getStatus() )."')"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 

		return $this->buscarEmktDisparo(2, ""); 
	} 
	 
	public function alterarEmktDisparo(){ 
 
		$sql = "UPDATE tb_emkt_disparo ". 
			   "SET id_emkt=".$this->getIdEmkt().", agendamento='".$this->tratarString( $this->getAgendamento() )."', resultado='".$this->tratarString( $this->getResultado() )."', status='".$this->tratarString( $this->getStatus() )."' ". 
			   "WHERE id_emkt_disparo = ".$this->getIdEmktDisparo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoIdEmkt(){ 
 
		$sql = "UPDATE tb_emkt_disparo ". 
			   "SET id_emkt=".$this->getIdEmkt()." ". 
			   "WHERE id_emkt_disparo = ".$this->getIdEmktDisparo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoAgendamento(){ 
 
		$sql = "UPDATE tb_emkt_disparo ". 
			   "SET agendamento='".$this->tratarString( $this->getAgendamento() )."' ". 
			   "WHERE id_emkt_disparo = ".$this->getIdEmktDisparo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoResultado(){ 
 
		$sql = "UPDATE tb_emkt_disparo ". 
			   "SET resultado='".$this->tratarString( $this->getResultado() )."' ". 
			   "WHERE id_emkt_disparo = ".$this->getIdEmktDisparo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function alterarAtributoStatus(){ 
 
		$sql = "UPDATE tb_emkt_disparo ". 
			   "SET status='".$this->tratarString( $this->getStatus() )."' ". 
			   "WHERE id_emkt_disparo = ".$this->getIdEmktDisparo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
 
	public function excluirEmktDisparo(){ 
		$sql = "DELETE FROM tb_emkt_disparo ". 
			   "WHERE id_emkt_disparo = ".$this->getIdEmktDisparo(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset($dbu); 
		return $result; 
	} 
	 
	public function getEmktDisparo(){ 
		return $this; 
	} 
	 
	public function setEmktDisparo($IdEmktDisparo, $Identificador, $IdEmkt, $Agendamento, $Resultado, $Status){ 
			$this->setIdEmktDisparo( $IdEmktDisparo ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdEmkt( $IdEmkt ); 
			$this->setAgendamento( $Agendamento ); 
			$this->setResultado( $Resultado ); 
			$this->setStatus( $Status ); 
	} 
 
	public function setIdEmktDisparo( $valor ){ $this->myIdEmktDisparo = $valor; } 
	public function getIdEmktDisparo(){ return $this->myIdEmktDisparo; } 
 
	public function setIdentificador( $valor ){ $this->myIdentificador = $valor; } 
	public function getIdentificador(){ return (!empty($this->myIdentificador)) ? $this->myIdentificador : $this->myIdentificador = md5(date("YmdHis").mt_rand()); } 
 
	public function setIdEmkt( $valor ){ $this->myIdEmkt = $valor; } 
	public function getIdEmkt(){ return $this->myIdEmkt; } 
 
	public function setAgendamento( $valor ){ $this->myAgendamento = $valor; } 
	public function getAgendamento(){ return $this->myAgendamento; } 
 
	public function setResultado( $valor ){ $this->myResultado = $valor; } 
	public function getResultado(){ return $this->myResultado; } 
 
	public function setStatus( $valor ){ $this->myStatus = $valor; } 
	public function getStatus(){ return $this->myStatus; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 
}
?>