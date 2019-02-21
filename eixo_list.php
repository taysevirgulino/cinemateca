<?
	require_once("config.inc.php");
	
    $template = new LayoutTemplate();
	$fileTemplate = "eixo_list.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
	    
		/*
		 * DEFAULT
		 */
	    $Titulo = "Eixo";
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$template->assign("Titulo", $Titulo);
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar("Eixo");
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$itensEixo = EixoManage::consultarSearchQuery(
		    array(
		        new SearchQueryComparer(EixoAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
		    ),
		    array(
		        new SearchQueryOrder(EixoAttribute::Nome(), SearchOrder::Crescente())
		    )
		);
		$template->assign("Itens", $itensEixo);

	}
	$template->display($fileTemplate);

?>