<? 
	class AssociadoLogin { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function Entrar($Login, $Senha){
			
			$rs = array();
			$rs["id"] = "";
			
			$objAssociado = new Associado();
			
			if($objAssociado->buscarAttribute(AssociadoAttribute::Cpf(), $Login)){
				if( !AssociadoCrypt::Compare($Senha, $objAssociado->getSenha())){
					$rs["status"] = 0;
					$rs["aviso"] = "Usuário ou/e senha inválida";
				}else
				if($objAssociado->getStatus() == AssociadoStatus::Cancelado()){
					$rs["status"] = 0;
					$rs["aviso"] = "Associado inativo ou cancelado";
				}else{
					$objAssociado->setDatahoraLogin( date("Y-m-d H:i:s") );
					
					if($objAssociado->alterarAtributo(AssociadoAttribute::DatahoraLogin())){
						
						AssociadoLogin::setUsuario($objAssociado);
						AssociadoLogin::setIdeUsuario( $objAssociado->getIdentificador() );
						
						AssociadoLogin::setUsuario_Session($objAssociado->getIdentificador(), utf8_encode(AssociadoLogin::Legenda()));
						
						$rs["idp"] = $objAssociado->getIdentificador();
						$rs["status"] = 1;
						$rs["aviso"] = AssociadoLogin::Legenda();
					}else{
						$rs["status"] = 0;
						$rs["aviso"] = "Problema ao autenticar, tente novamente daqui alguns minutos";
					}
					
				}
			}else{
				$rs["status"] = 0;
				$rs["aviso"] = "Usuário ou/e senha inválida";
			}
			
			$rs["aviso"] = utf8_encode($rs["aviso"]);
			
			return $rs;
		}
		
		public static function Sair(){
			AssociadoLogin::setUsuario(null);
			AssociadoLogin::setIdeUsuario(null);
			AssociadoLogin::setUsuario_Session(null, null);
			return array("status"=>1,"aviso"=>"");
		}
		
		public static function Entrar_Cookie(){
			/*$ide = AssociadoLogin::getIdeUsuario();
			if(Validacao::isHash($ide)){
				$objAssociado = new Associado();
				if($objAssociado->buscarAssociadoAttribute(AssociadoAttribute::Identificador(), $ide)){
					$objAssociado->setDatahoraLogin( date("Y-m-d H:i:s") );
					$objAssociado->alterarAtributoDatahoraLogin();
						
					AssociadoLogin::setUsuario($objAssociado);
					AssociadoLogin::setIdeUsuario( $objAssociado->getIdentificador() );
					AssociadoLogin::setUsuario_Session($objAssociado->getIdentificador(), utf8_encode($objAssociado->getNome()));
						
					return true;
				}
			}*/
			return false;
		}
		
		public static function Validar(){
			if( !self::Autenticado() ){
				System::Redirect( Url::Associado_Entrar()."?url=".base64_encode($_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]) );
			}
			
			/*$objAssociado = AssociadoLogin::getUsuario();
			//die(get_class($objAssociado));
			if(get_class($objAssociado) == "Associado"){
				$objAssociado->setDatahoraLogin( date("Y-m-d H:i:s") );
				//die("ok");
				//$objAssociado->alterarAtributo(AssociadoAttribute::DatahoraLogin());
				//$objAssociado->alterarAtributoDatahoraLogin();
			}else{
				if( !AssociadoLogin::Entrar_Cookie() ){
					System::Redirect( Url::Usuario_Entrar()."?url=".base64_encode($_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]) );
				}
			}*/
		}
		
		public static function Autenticado(){
			$objAssociado = AssociadoLogin::getUsuario();
			return !empty($objAssociado);
			
			//$objAssociado = AssociadoLogin::getUsuario();
			//return (get_class($objAssociado) == "Associado");
		}
		
		public static function Legenda(){
			if(AssociadoLogin::Autenticado()){
				$obj = AssociadoLogin::getUsuario();
				return $obj->getNome();
			}else{
				return "";
			}
		}
		
		public static function IdUsuario(){
			$obj = AssociadoLogin::getUsuario();
			return $obj->getIdAssociado();
		}
		
		public static function IdUsuarioPadrao(){
			return 1;
		}
		
		public static function getIdeUsuario(){
			return $_SESSION["ASSOCIADO_IDE"];
			//return System::_QueryString($_COOKIE["anunciante_ide"]);
		}
		
		public static function setIdeUsuario($IdeAssociado){
			$_SESSION["ASSOCIADO_IDE"] = $IdeAssociado;
			//setcookie("anunciante_ide", $IdeAssociado, (time()+60*60*24*7));
		}
		
		public static function getUsuario(){
			$objAssociado = $_SESSION["ASSOCIADO"];
			if(get_class($objAssociado) != "Associado"){
				$objAssociado = new Associado();
				if(!$objAssociado->buscarAttribute(AssociadoAttribute::Identificador(), self::getIdeUsuario())){
					$objAssociado = null;
				}
				$_SESSION["ASSOCIADO"] = $objAssociado;
			}
			return $objAssociado;
		}
		
		public static function setUsuario($obj){
			$_SESSION["ASSOCIADO"] = $obj;
		}

		public static function getUrlBack(){
			return $_SESSION["URL_BACK"];
		}
		
		public static function setUrlBack($value){
			$_SESSION["URL_BACK"] = $value;
		}
		
		public static function setUsuario_Session($IdeAssociado, $Nome){
			/*ob_start();
				setcookie("anunciante_ide", $IdeAssociado, (time()+60*60*24*7));
				setcookie("anunciante_nome", $Nome, (time()+60*60*24*7));
			ob_flush();*/
		}

	} 
?>