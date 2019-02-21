<?
	require_once("config.inc.php");
	
	// Validar::Completo();
	// $objUsuario = UsuarioLogin::getUsuario();

	
    $template = new LayoutTemplate();
	$fileTemplate = "eixo_categoria_list.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){


	    // $objEmpreendimento = EmpreendimentoManage2::Empreendimento_Ativo();
	    
		/*
		 * DEFAULT
		 */
	    $Titulo = "Categoria do Eixo";
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$template->assign("Titulo", $Titulo);
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar("Categoria do Eixo");
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$itensEixoCategoria = EixoCategoriaManage::consultarSearchQuery(
		    array(
		        new SearchQueryComparer(EixoCategoriaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
		    ),
		    array(
		        new SearchQueryOrder(EixoCategoriaAttribute::Nome(), SearchOrder::Crescente())
		    )
		);

		$template->assign("Itens", $itensEixoCategoria);
		// $template->assign("Val", $objUsuario);

	}
	$template->display($fileTemplate);

?>