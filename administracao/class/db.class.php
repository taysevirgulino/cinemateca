<?
class db{
	protected $dbConexao, $myHost, $myDatabase, $myUser, $myPassword;
	
	public function __construct(){ 
		//$this->setDb(Config::DB_Host(), Config::DB_Database(), Config::DB_User(), Config::DB_Password());
		//$this->conectar($this->myHost, $this->myDatabase, $this->myUser, $this->myPassword);
	}

	public function __destruct(){
		//$this->desconectar();
	}

	public static function _Start(){
		$dbConexao = mysql_connect(Config::DB_Host(), Config::DB_User(), Config::DB_Password()) or die( mysql_error() );
		mysql_select_db(Config::DB_Database(), $dbConexao) or die( mysql_error() );
		if( $dbConexao == null ){
			die( "Erro ao conectar ao servidor!!" );
		}
		define("MYSQL_CONECT", $dbConexao);
	}
	
	public static function _End(){
		mysql_close( MYSQL_CONECT );
	}
	
	function conectar($host, $database, $user, $password){
		/*$this->dbConexao = mysql_connect($host, $user, $password) or die( mysql_error() ); 
		mysql_select_db($database, $this->dbConexao) or die( mysql_error() );

		if( empty($this->dbConexao) ){
			die( "Erro ao conectar ao servidor!!" );
		}*/
	}

	function desconectar(){
		/*@mysql_close( $this->dbConexao );*/
	}	

	public function setDb($Host, $Database, $User, $Password){
		$this->setHost($Host);
		$this->setDatabase($Database);
		$this->setUser($User);
		$this->setPassword($Password);
	}
	public function getDb(){ return $this; }

	public function setConexao( $value ){	/*$this->dbConexao = $value;*/ }
	public function getConexao(){ return MYSQL_CONECT; /*return $this->dbConexao;*/ }

	public function setHost( $value ){ $this->myHost = $value; }
	public function getHost(){ return $this->myHost; }
	
	public function setDatabase( $value ){ $this->myDatabase = $value; }
	public function getDatabase(){ return $this->myDatabase; }

	public function setUser( $value ){ $this->myUser = $value; }
	public function getUser(){ return $this->myUser; }

	public function setPassword( $value ){ $this->myPassword = $value; }
	public function getPassword(){ return $this->myPassword; }
}
?>