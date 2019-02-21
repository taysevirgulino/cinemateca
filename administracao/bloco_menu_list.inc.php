<?
	$link_add = "bloco_menu_add.php";
	$link_edit = "bloco_menu_edit.php";
	$link_remove = "bloco_menu_remove.php";
	$link_list = "bloco_menu_list.php";

	$busca_comparacao = System::_REQUEST("busca-comparacao");
	$busca_campo = System::_REQUEST("busca-campo");
	$chave = System::_REQUEST("chave");
	$ordenacao_campo = System::_REQUEST("ordenacao-campo");
	$ordenacao_ordem = System::_REQUEST("ordenacao-ordem");
	$pesquisar = System::_REQUEST("pesquisar");

	$SearchQueryComparerCollection = array();
	$SearchQueryOrderCollection = array();

	$SearchQueryComparerCollection[] = new SearchQueryComparer(BlocoMenuAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), Current::IdeOrigem());
	if(empty($busca_campo)){
		$busca_campo = BlocoMenuAttribute::Nome();
	}
	if(!empty($chave)){
		$SearchQueryComparerCollection[] = new SearchQueryComparer($busca_campo, $busca_comparacao, SearchCondition::E(), $chave);
	}
	if(!empty($ordenacao_campo)){
		$SearchQueryOrderCollection[] = new SearchQueryOrder($ordenacao_campo, $ordenacao_ordem);
	}else{
		$SearchQueryOrderCollection[] = new SearchQueryOrder(BlocoMenuAttribute::IdBlocoMenuPai(), SearchOrder::Crescente());
		$SearchQueryOrderCollection[] = new SearchQueryOrder(BlocoMenuAttribute::Prioridade(), SearchOrder::Crescente());
		$ordenacao_campo = BlocoMenuAttribute::Prioridade();
		$ordenacao_ordem = SearchOrder::Crescente();
	}
	$ordenacao_ordem_inverso = SearchOrder::_Inverso($ordenacao_ordem);

	// Paginчуo de resultados ----------------------------------------------------------|
	$vobjCount = SearchMysqlQuery::CountBySql( SearchMounter::MounterByQueryCount(BlocoMenuAttribute::_Table(), $SearchQueryComparerCollection) );
	$PG = intval( System::_REQUEST("pg") );
	$paginacao = new Paginacao(50, $vobjCount, $PG, "$link_list?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=$ordenacao_campo&ordenacao-ordem=$ordenacao_ordem");
	$PG_INICIO = $paginacao->getPaginacaoInicio();
	$PG_REG_POR_PAGINA = $paginacao->getRegistrosPorPagina();
	$PG_REG_AFETADOS = $paginacao->getRegistrosAfetados();
	$PG_LABEL = $paginacao->getLabelPaginacao();
	// ---------------------------------------------------------------------------------|

	$vobj = BlocoMenuManage::consultarBlocoMenu(3, SearchMounter::MounterByQueryLimit(BlocoMenuAttribute::_Table(), $SearchQueryComparerCollection, $SearchQueryOrderCollection, $paginacao->getPaginacaoInicio(), $paginacao->getRegistrosPorPagina()));

	$Orders = SearchOrder::_GetAllOrders();
	$Comparers = SearchComparer::_GetAllComparers();
	$Attributes = BlocoMenuAttribute::_GetAllAttributes();
?>