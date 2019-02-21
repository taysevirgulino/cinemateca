<?
	require_once("config.inc.php");
	
	Validar::Completo();
	$objUsuario = UsuarioLogin::getUsuario();
	
		
	$template = new LayoutTemplate();
	if( $objUsuario->getIdUsuarioPerfil() != 1){
		$fileTemplate = "lojista_list.tpl.php";
	}else{
		 System::Redirect( Url::Painel() );
	}
	
	
	if( !$template->isCached($fileTemplate) ){


	    $objEmpreendimento = EmpreendimentoManage2::Empreendimento_Ativo();
	    
		/*
		 * DEFAULT
		 */
	    $Titulo = "Lojistas do ".$objEmpreendimento->getTitulo();
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$template->assign("Titulo", $Titulo);
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar("Lojistas");
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$itens = LojistaManage2::Listagem($objEmpreendimento);

		foreach ($itens as $i => $value) {
		    $itens[$i]["farol"] = LojistaManage2::Farol($value['id_lojista']);
		}

		$template->assign("Itens", $itens);
		
	}
	$template->display($fileTemplate);

?>