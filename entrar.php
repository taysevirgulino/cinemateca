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
	$frm_senha = System::_POST("FrmSenha");
	$frm_lembrar = intval(System::_POST("FrmLembrar"));
	$frm_bt = System::_POST("btSubmit");
	
	if( !Validacao::isVazio($frm_login) ){
		
		if( Validacao::isVazio($frm_senha) ){
			$error[] = "Preencha a Senha";
		}
	
		if( count($error) <= 0 ){
	
			$result = UsuarioLogin::Entrar($frm_login, $frm_senha, ($frm_lembrar==1));
			
			if($result["status"] == 1){
				$url = System::_GET("url");
				if(!empty($url)){
					$url = base64_decode($url);
				}else{
					$url = Url::Painel();
				}
				System::Redirect( $url );
			}else{
				$error[] = utf8_decode($result["aviso"]);
			}
			
		}
	}
	/*
	 * END POST
	*/
	
	$template = new LayoutTemplate();
	$fileTemplate = "entrar.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Entrar";
		
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