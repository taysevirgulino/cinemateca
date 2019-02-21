<?
	require_once("config.inc.php");

	Validar::Completo();
	
	$page = System::_GET("page");
	if( empty($page) ){
	    System::Redirect( Url::Principal() );
	}
	
	$itensLojista = LojistaManage2::Lojistas_Usuario(UsuarioLogin::getUsuario());

	
	if( count($itensLojista) == 1 ){
	    System::Redirect( Url::_Path().$page."-".$itensLojista[0]->getIdentificador() );
	}
	
	$template = new LayoutTemplate();
	$fileTemplate = "lojista_selecionar.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Selecionar Lojista";
		
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( "Lojistas", Url::_Path()."lojista-list" );
		$Navegacao->Adicionar( $Titulo );
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("Titulo", $Titulo);
		
		$template->assign("itensLojista", $itensLojista);
		
		$template->assign("error", $error);
		$template->assign("success", $success);
		
	}
	$template->display($fileTemplate);

?>