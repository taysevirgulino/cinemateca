<? 
class AppLogon{ 
	 
	protected $myIdAppLogon, $myIdAppUsuario, $myDatahoraLogin, $myDatahoraLogout, $myIp;
	 
	public function __construct(){} 
	public function __destruct(){} 
	 
	public function buscarAppLogon( $tipo, $valor ){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_logon ". 
					   "WHERE id_app_logon = ".$valor; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_logon ". 
					   "WHERE (id_app_usuario=".$this->getIdAppUsuario().") AND (datahora_login='".$this->getDatahoraLogin()."')"; 
			}break; 
			case 3 : { 
				$sql = $valor;
			}break; 
		} 
		 
		if( empty($sql) ){ return false;} 
		 
		$dbq = new dbQuery(); 
		$dbq->consultar($sql); 
		 
		if( $dbq->registro() ){ 
			$this->setIdAppLogon( $dbq->valor("id_app_logon") ); 
			$this->setIdAppUsuario( $dbq->valor("id_app_usuario") ); 
			$this->setDatahoraLogin( $dbq->valor("datahora_login") ); 
			$this->setDatahoraLogout( $dbq->valor("datahora_logout") ); 
			$this->setIp( $dbq->valor("ip") ); 
			$dbq->desconectar(); unset($dbq); 
			return true; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		return false; 
	} 
	 
	public function consultarAppLogon( $tipo, $valor){ 
		$sql = ""; 
		switch ( $tipo ){ 
			case 1 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_logon "; 
			}break; 
			case 2 : { 
				$sql = "SELECT * ". 
					   "FROM tb_app_logon ". 
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
			$obj = new AppLogon(); 
			$obj->setIdAppLogon( $dbq->valor("id_app_logon") ); 
			$obj->setIdAppUsuario( $dbq->valor("id_app_usuario") ); 
			$obj->setDatahoraLogin( $dbq->valor("datahora_login") ); 
			$obj->setDatahoraLogout( $dbq->valor("datahora_logout") ); 
			$obj->setIp( $dbq->valor("ip") ); 
			$objs[ $i ] = $obj; 
			$i++; 
		} 
		 
		$dbq->desconectar(); unset($dbq); 
		 
		return $objs; 
	} 
 
	public function inserirAppLogon(){ 
 
		$sql = "INSERT INTO ". 
			   "tb_app_logon(id_app_usuario, datahora_login, datahora_logout, ip) ". 
			   "VALUES(".$this->getIdAppUsuario().", '".$this->tratarString( $this->getDatahoraLogin() )."', '".$this->tratarString( $this->getDatahoraLogout() )."', '".$this->tratarString( $this->getIp() )."')"; 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
	 
	public function alterarAppLogon(){ 
 
		$sql = "UPDATE tb_app_logon ". 
			   "SET id_app_usuario=".$this->getIdAppUsuario().", datahora_login='".$this->tratarString( $this->getDatahoraLogin() )."', datahora_logout='".$this->tratarString( $this->getDatahoraLogout() )."', ip='".$this->tratarString( $this->getIp() )."' ". 
			   "WHERE id_app_logon = ".$this->getIdAppLogon(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
 
	public function excluirAppLogon(){ 
		$sql = "DELETE FROM tb_app_logon ". 
			   "WHERE id_app_logon = ".$this->getIdAppLogon(); 
 
		$dbu = new dbUpdate(); 
		$result = $dbu->executar($sql); 
		$dbu->desconectar(); unset( $dbu ); 
		return $result; 
	} 
	 
	public function getAppLogon(){ 
		return $this; 
	} 
	 
	public function setAppLogon($IdAppLogon, $IdAppUsuario, $DatahoraLogin, $DatahoraLogout, $Ip){ 
			$this->setIdAppLogon( $IdAppLogon ); 
			$this->setIdAppUsuario( $IdAppUsuario ); 
			$this->setDatahoraLogin( $DatahoraLogin ); 
			$this->setDatahoraLogout( $DatahoraLogout ); 
			$this->setIp( $Ip ); 
	} 
 
	public function setIdAppLogon( $valor ){ $this->myIdAppLogon = $valor; } 
	public function getIdAppLogon(){ return $this->myIdAppLogon; } 
 
	public function setIdAppUsuario( $valor ){ $this->myIdAppUsuario = $valor; } 
	public function getIdAppUsuario(){ return $this->myIdAppUsuario; } 
 
	public function setDatahoraLogin( $valor ){ $this->myDatahoraLogin = $valor; } 
	public function getDatahoraLogin(){ return $this->myDatahoraLogin; } 
 
	public function setDatahoraLogout( $valor ){ $this->myDatahoraLogout = $valor; } 
	public function getDatahoraLogout(){ return $this->myDatahoraLogout; } 
 
	public function setIp( $valor ){ $this->myIp = $valor; } 
	public function getIp(){ return $this->myIp; } 
 
	public function tratarString( $str ){ 
		return str_ireplace("'", "''", $str); 
	}	 

	public function compareTo( $obj ){ 
		return( get_class( $this ) == get_class( $obj ) ); 
	}	 
} 
?>