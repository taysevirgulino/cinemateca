<? 
	class UsuarioLogin { 

	    /**
	     * @var Usuario
	     */
	    private static $_usuario = null;
        
		public static function Entrar($Login, $Senha, $saveCookie=false){
			
			$rs = array();
			$rs["id"] = "";
			
			$objUsuario = new Usuario();
			
			if($objUsuario->buscarAttribute(UsuarioAttribute::Login(), $Login)){
				if( !UsuarioCrypt::Compare($Senha, $objUsuario->getSenha())){
					$rs["status"] = 0;
					$rs["aviso"] = "Usuário ou/e senha inválida";
				}else
				if($objUsuario->getStatus() != UsuarioStatus::Ativo()){
					$rs["status"] = 0;
					$rs["aviso"] = "Usuario inativo ou cancelado";
				}else{
					$objUsuario->setDatahoraLogin( date("Y-m-d H:i:s") );
					
					if($objUsuario->alterarAtributo(UsuarioAttribute::DatahoraLogin())){
						
					    self::$_usuario = $objUsuario;
						UsuarioLogin::setIdeUsuario( $objUsuario->getIdentificador(), $saveCookie);
						
						$rs["idp"] = $objUsuario->getIdentificador();
						$rs["status"] = 1;
						$rs["aviso"] = UsuarioLogin::Legenda();
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
		    self::$_usuario = null;
			UsuarioLogin::setIdeUsuario(null, true);
			return array("status"=>1,"aviso"=>"");
		}
		
		public static function Validar(){
			if( !self::Autenticado() ){
				System::Redirect( Url::Entrar()."?url=".base64_encode($_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]) );
			}
		}
		
		public static function Autenticado(){
			$objUsuario = UsuarioLogin::getUsuario();
			return !empty($objUsuario);
		}
		
		public static function Legenda(){
			if(UsuarioLogin::Autenticado()){
				$obj = UsuarioLogin::getUsuario();
				return $obj->getNome();
			}else{
				return "";
			}
		}
		
		public static function IdUsuario(){
			$obj = UsuarioLogin::getUsuario();
			return $obj->getIdUsuario();
		}
		
		public static function IdUsuarioPadrao(){
			return 1;
		}
		
		public static function getIdeUsuario(){
			$ide = $_SESSION["UIDE"];
			if( !Validacao::isHash($ide) ){
			    $ide = $_COOKIE["UIDE"];
			    if( !Validacao::isHash($ide) ){
			        return "";
			    }
			}
			return $ide;
		}
		
		public static function setIdeUsuario($IdeUsuario, $saveCookie = false){
			$_SESSION["UIDE"] = $IdeUsuario;
			if( $saveCookie ){
			    ob_start();
			    	setcookie("UIDE", $IdeUsuario, (time()+60*60*24*7));
			    ob_flush();
			}
		}
		
		/**
		 * @return Usuario
		 */
		public static function getUsuario(){
		    if(self::$_usuario == null){
		        self::$_usuario = new Usuario();
	            if(self::$_usuario->buscarAttribute(UsuarioAttribute::Identificador(), self::getIdeUsuario())){
	                self::setIdeUsuario(self::$_usuario->getIdentificador());
	            }else{
	                self::$_usuario = null;
	            }
		    }
		    return self::$_usuario;
		}
		
		public static function getUrlBack(){
			return $_SESSION["URL_BACK"];
		}
		
		public static function setUrlBack($value){
			$_SESSION["URL_BACK"] = $value;
		}

	} 
?>