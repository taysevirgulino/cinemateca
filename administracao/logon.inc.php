<? 
	$USER = $_SESSION[Config::Server_Username()."USER"];
	$APP_LOGON = $_SESSION[Config::Server_Username()."APP_LOGON"];
	$USER_STATUS = false;
	$USER_ID = -1;
	$USER_GRUPO = $USER_GRUPO_VISITANTE;
	$USER_NOME = "Visitante";
	$USER_LOGIN = "";
	
	if ( ! empty( $USER ) ) {
		if ( get_class( $USER ) == "AppUsuario" ) {
			if ( $USER->buscarAppUsuario(1, $USER->getIdAppUsuario()) ) {
				$USER_ID = $USER->getIdAppUsuario();
				$USER_GRUPO = $USER->getIdAppUsuarioGrupo();
				$USER_NOME = $USER->getNome();
				$USER_LOGIN = $USER->getLogin();
				
				$USER_STATUS = true;
			}
		}
		/*if ( get_class( $APP_LOGON ) == "AppLogon" ) {
			$APP_LOGON->setDatahoraLogout( date("Y-m-d H:i:s") );
			$APP_LOGON->alterarAppLogon();
			
			$app_logon_historico = new AppLogonHistorico();
			$app_logon_historico->setAppLogonHistorico(-1, $APP_LOGON->getIdAppLogon(), date("Y-m-d H:i:s"), $_SERVER['SCRIPT_NAME'], $_SERVER['QUERY_STRING'], $_SERVER['REQUEST_METHOD'], $_SERVER['HTTP_USER_AGENT'], $_SERVER['HTTP_HOST']);
			$app_logon_historico->inserirAppLogonHistorico();
			unset($app_logon_historico);
		}*/
	}
	// Verifica permissão da página
	ManageAppComponentePagina::validarPagina($_SERVER['SCRIPT_NAME'], $USER_GRUPO, "erropermissao.php?l=".$_SERVER['SCRIPT_NAME']);
?>