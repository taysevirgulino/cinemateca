<? 
class AppComponenteRegra{ 
	 
	protected $myIdAppComponenteRegra, $myIdentificador, $myDescricao;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarAppComponenteRegra( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente_regra ". 
					   "WHERE id_app_componente_regra = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente_regra ". 
					   "WHERE (identificador='".$this->getIdentificador()."')"; 
			}break; 
			case 3 : { 
				$sql = $valor;
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdAppComponenteRegra( $dbq->valor("id_app_componente_regra") ); 
			$this->setIdentificador( $dbq->valor("identificador") ); 
			$this->setDescricao( $dbq->valor("descricao") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarAppComponenteRegra( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente_regra "; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_componente_regra ". 
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
			$obj = new AppComponenteRegra(); 
			$obj->setIdAppComponenteRegra( $dbq->valor("id_app_componente_regra") ); 
			$obj->setIdentificador( $dbq->valor("identificador") ); 
			$obj->setDescricao( $dbq->valor("descricao") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function inserirAppComponenteRegra(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_app_componente_regra(id_app_componente_regra, identificador, descricao) ". 
			   "VALUES(".$this->getIdAppComponenteRegra().", '".$this->tratarString( $this->getIdentificador() )."', '".$this->tratarString( $this->getDescricao() )."')"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
	 
	public function alterarAppComponenteRegra(){ 
 
		$sql = "UPDATE tb_app_componente_regra ". 
			   "SET identificador='".$this->tratarString( $this->getIdentificador() )."', descricao='".$this->tratarString( $this->getDescricao() )."' ". 
			   "WHERE id_app_componente_regra = ".$this->getIdAppComponenteRegra(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
 
	public function excluirAppComponenteRegra(){ 
		$sql = "DELETE FROM tb_app_componente_regra ". 
			   "WHERE id_app_componente_regra = ".$this->getIdAppComponenteRegra(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
	 
	public function getAppComponenteRegra(){ 
		return $this; 
	} 
	 
	public function setAppComponenteRegra($IdAppComponenteRegra, $Identificador, $Descricao){ 
			$this->setIdAppComponenteRegra( $IdAppComponenteRegra ); 
			$this->setIdentificador( $Identificador ); 
			$this->setDescricao( $Descricao ); 
	} 
 
	public function setIdAppComponenteRegra( $valor ){ $this->myIdAppComponenteRegra = $valor; } 
	public function getIdAppComponenteRegra(){ return $this->myIdAppComponenteRegra; } 
 
	public function setIdentificador( $valor ){ $this->myIdentificador = $valor; } 
	public function getIdentificador(){ return $this->myIdentificador; } 
 
	public function setDescricao( $valor ){ $this->myDescricao = $valor; } 
	public function getDescricao(){ return $this->myDescricao; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 

	public function compareTo( $obj ){ 
		return( get_class( $this ) == get_class( $obj ) ); 
	}	 
} 
?>