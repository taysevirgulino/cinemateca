<?
	$link_add = "jornal_pagina_add.php";
	$link_edit = "jornal_pagina_edit.php";
	$link_remove = "jornal_pagina_remove.php";
	$link_list = "jornal_pagina_list.php";

	$busca_comparacao = System::_REQUEST("busca-comparacao");
	$busca_campo = System::_REQUEST("busca-campo");
	$chave = System::_REQUEST("chave");
	$ordenacao_campo = System::_REQUEST("ordenacao-campo");
	$ordenacao_ordem = System::_REQUEST("ordenacao-ordem");
	$pesquisar = System::_REQUEST("pesquisar");

	$SearchQueryComparerCollection = array();
	$SearchQueryOrderCollection = array();

	if(empty($busca_campo)){
		$busca_campo = JornalPaginaAttribute::Imagem();
	}
	if(!empty($chave)){
		$SearchQueryComparerCollection[] = new SearchQueryComparer($busca_campo, $busca_comparacao, SearchCondition::E(), $chave);
	}
	if(!empty($ordenacao_campo)){
		$SearchQueryOrderCollection[] = new SearchQueryOrder($ordenacao_campo, $ordenacao_ordem);
	}else{
		$SearchQueryOrderCollection[] = new SearchQueryOrder(JornalPaginaAttribute::Imagem(), SearchOrder::Crescente());
		$ordenacao_campo = JornalPaginaAttribute::Imagem();
		$ordenacao_ordem = SearchOrder::Crescente();
	}
	$ordenacao_ordem_inverso = SearchOrder::_Inverso($ordenacao_ordem);

	// Pagin��o de resultados ----------------------------------------------------------|
	$vobjCount = JornalPaginaManage::count( SearchMounter::MounterByQueryCount(JornalPaginaAttribute::_Table(), $SearchQueryComparerCollection) );
	$PG = intval( System::_REQUEST("pg") );
	$paginacao = new Paginacao(30, $vobjCount, $PG, "$link_list?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=$ordenacao_campo&ordenacao-ordem=$ordenacao_ordem");
	$PG_INICIO = $paginacao->getPaginacaoInicio();
	$PG_REG_POR_PAGINA = $paginacao->getRegistrosPorPagina();
	$PG_REG_AFETADOS = $paginacao->getRegistrosAfetados();
	$PG_LABEL = $paginacao->getLabelPaginacao();
	// ---------------------------------------------------------------------------------|

	$vobj = JornalPaginaManage::consultar(SearchMounter::MounterByQueryLimit(JornalPaginaAttribute::_Table(), $SearchQueryComparerCollection, $SearchQueryOrderCollection, $paginacao->getPaginacaoInicio(), $paginacao->getRegistrosPorPagina()));

	$Orders = SearchOrder::_GetAllOrders();
	$Comparers = SearchComparer::_GetAllComparers();
	$Attributes = JornalPaginaAttribute::_GetAllAttributes();
?>