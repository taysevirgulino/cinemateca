<?
	require_once("config.inc.php");
	
	// Validar::Completo();
	// $objUsuario = UsuarioLogin::getUsuario();

	
    $template = new LayoutTemplate();
	$fileTemplate = "disciplina_list.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){


	    // $objEmpreendimento = EmpreendimentoManage2::Empreendimento_Ativo();
	    
		/*
		 * DEFAULT
		 */
	    $Titulo = "Disciplina";
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$template->assign("Titulo", $Titulo);
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar("Disciplina");
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$itensDisciplina = DisciplinaManage::consultarSearchQuery(
		    array(
		        new SearchQueryComparer(DisciplinaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
		    ),
		    array(
		        new SearchQueryOrder(DisciplinaAttribute::Nome(), SearchOrder::Crescente())
		    )
		);

		$template->assign("Itens", $itensDisciplina);
		// $template->assign("Val", $objUsuario);

	}
	$template->display($fileTemplate);

?>