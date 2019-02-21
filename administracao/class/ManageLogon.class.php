<?
	class ManageLogon{
		
		protected $myPessoa, $myAppLogon;
		
		public function __construct(){}
		public function __destruct(){}
		
		public function Logar($login, $senha, $ip){
			
			$pessoa = new Pessoa();
			
			$pessoa->setLogin( $login );
			$pessoa->setSenha( md5( $senha ) );
			$pessoa->setStatus( 1 );
			
			if( $pessoa->buscarPessoa(3, "") ){
				$logon = new AppLogon();
				
				$logon->setAppLogon(0, $pessoa->getIdPessoa(), date("Y-m-d H:i:s"), null, $ip);
				
				if( ! $logon->inserirAppLogon() ){ return false; }
				if( ! $logon->buscarAppLogon(2, "") ){ return false; } 				

				$this->setAppLogon( $logon );			
				$this->setPessoa( $pessoa );
				
				return true;				
			}

			return false;
		}
		
		public function Logout( $AppLogon ){
			$AppLogon->setDatahoraLogout( date("Y-m-d H:i:s") );
			return $AppLogon->alterarAppLogon();
		}
		
		public function setPessoa( $valor ){ $this->myPessoa = $valor; }
		public function getPessoa(){ return $this->myPessoa; }

		public function setAppLogon( $valor ){ $this->myAppLogon = $valor; }
		public function getAppLogon(){ return $this->myAppLogon; }
	}
?>