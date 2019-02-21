<?
	require_once("config.inc.php");
	
	Validar::Completo();
		$objUsuario = UsuarioLogin::getUsuario();

	
    $template = new LayoutTemplate();
	$fileTemplate = "documento_list.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){


	    $objEmpreendimento = EmpreendimentoManage2::Empreendimento_Ativo();
	    
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
		
		$itensDocumento = DocumentoManage::consultarSearchQuery(
		    array(
		        new SearchQueryComparer(DocumentoAttribute::IdEmpreendimento(), SearchComparer::Igual(), SearchCondition::E(), $objEmpreendimento->getIdEmpreendimento()),
		        new SearchQueryComparer(DocumentoAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
		    ),
		    array(
		        new SearchQueryOrder(DocumentoAttribute::Titulo(), SearchOrder::Crescente())
		    )
		);

		$template->assign("Itens", $itensDocumento);
		$template->assign("Val", $objUsuario);

	}
	$template->display($fileTemplate);

?>