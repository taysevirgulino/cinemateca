<? 
class AppComponente{ 
	 
	protected $myIdAppComponente, $myData;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarAppComponente( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente ". 
					   "WHERE id_app_componente = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente ". 
					   "WHERE (data='".$this->getData()."')"; 
			}break; 
			case 3 : { 
				$sql = $valor;
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdAppComponente( $dbq->valor("id_app_componente") ); 
			$this->setData( $dbq->valor("data") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarAppComponente( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente "; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente ". 
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
			$obj = new AppComponente(); 
			$obj->setIdAppComponente( $dbq->valor("id_app_componente") ); 
			$obj->setData( $dbq->valor("data") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function inserirAppComponente(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_app_componente(data) ". 
			   "VALUES('".$this->tratarString( $this->getData() )."')"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
	 
	public function alterarAppComponente(){ 
 
		$sql = "UPDATE tb_app_componente ". 
			   "SET data='".$this->tratarString( $this->getData() )."' ". 
			   "WHERE id_app_componente = ".$this->getIdAppComponente(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
 
	public function excluirAppComponente(){ 
		$sql = "DELETE FROM tb_app_componente ". 
			   "WHERE id_app_componente = ".$this->getIdAppComponente(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
	 
	public function getAppComponente(){ 
		return $this; 
	} 
	 
	public function setAppComponente($IdAppComponente, $Data){ 
			$this->setIdAppComponente( $IdAppComponente ); 
			$this->setData( $Data ); 
	} 
 
	public function setIdAppComponente( $valor ){ $this->myIdAppComponente = $valor; } 
	public function getIdAppComponente(){ return $this->myIdAppComponente; } 
 
	public function setData( $valor ){ $this->myData = $valor; } 
	public function getData(){ return $this->myData; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 

	public function compareTo( $obj ){ 
		return( get_class( $this ) == get_class( $obj ) ); 
	}	 
} 
?>