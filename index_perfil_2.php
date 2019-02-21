<?
	require_once("config.inc.php");
	
	$objUsuario = UsuarioLogin::getUsuario();
	
	$template = new LayoutTemplate();
	$fileTemplate = "index_perfil_2.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){


	    $objEmpreendimento = EmpreendimentoManage2::Empreendimento_Ativo();
	    
		/*
		 * DEFAULT
		 */
	    $Titulo = "Painel";
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$template->assign("Titulo", $Titulo);
		
		$Navegacao = new Navegacao(false);
		$Navegacao->Adicionar( sprintf("%s seja bem-vindo(a).", $objUsuario->getNome()));
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		
		
	}
	$template->display($fileTemplate);

?>