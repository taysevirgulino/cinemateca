<?
	require_once("config.inc.php");
	
	if( UsuarioLogin::Autenticado() ){
		System::Redirect( Url::Painel() );
	}
	
	/*
	 * POST
	*/
	$error = array();
	$success = array();
	
	$frm_login = System::_POST("FrmLogin");
	$frm_bt = System::_POST("btSubmit");
	
	if( !Validacao::isVazio($frm_login) ){
		
	    $objUsuario = new Usuario();
	    
		if( !$objUsuario->buscarAttribute(UsuarioAttribute::Login(), $frm_login) ){
    		if( !$objUsuario->buscarAttribute(UsuarioAttribute::Email(), $frm_login) ){
    			$error[] = "Usuário não localizado, informe os dados corretamente";
    		}
		}
	
		if( count($error) <= 0 ){
	       
		    $mail = new Email(CurrentSite::Site());
		    
			if( $mail->Usuario_Senha($objUsuario) ){
			    $success[] = "Sua senha foi enviada para o e-mail ".$objUsuario->getEmail().". Caso necessário verifique a caixa de SPAM.";
			}else{
				$error[] = "Problema ao enviar senha, tente novamente daqui alguns minutos";
			}
			
		}
	}
	/*
	 * END POST
	*/
	
	$template = new LayoutTemplate();
	$fileTemplate = "senha.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Lembrar senha";
		
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( "Painel", Url::Painel() );
		$Navegacao->Adicionar( "Entrar" );
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("Titulo", $Titulo);
		
		$template->assign("error", $error);
		$template->assign("success", $success);
		
	}
	$template->display($fileTemplate);

?>