<?
	$busca_comparacao = $_REQUEST["busca-comparacao"];
	$busca_campo = $_REQUEST["busca-campo"];
	$chave = $_REQUEST["chave"];
	$ordenacao_campo = $_REQUEST["ordenacao-campo"];
	$ordenacao_ordem = $_REQUEST["ordenacao-ordem"];
	$pesquisar = $_REQUEST["pesquisar"];

	$SearchQueryComparerCollection = array();
	$SearchQueryOrderCollection = array();

	if(!empty($chave)){
		$SearchQueryComparerCollection[] = new SearchQueryComparer($busca_campo, $busca_comparacao, SearchCondition::E(), $chave);
	}
	if(!empty($ordenacao_campo)){
		$SearchQueryOrderCollection[] = new SearchQueryOrder($ordenacao_campo, $ordenacao_ordem);
	}else{
	}
	$vobj = AppComponenteManage::consultarAppComponente(3, SearchMounter::MounterByQueryComparerOrder(AppComponenteAttribute::_Table(), $SearchQueryComparerCollection, $SearchQueryOrderCollection));

	$Orders = SearchOrder::_GetAllOrders();
	$Comparers = SearchComparer::_GetAllComparers();
	$Attributes = AppComponenteAttribute::_GetAllAttributes();


	// Pagin��o de resultados ----------------------------------------------------------|
	$PG = intval( $_REQUEST["pg"] );
	$paginacao = new Paginacao(30, count($vobj), $PG, "app_componente_list.php?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=$ordenacao_campo&ordenacao-ordem=$ordenacao_ordem");
	$PG_INICIO = $paginacao->getPaginacaoInicio();
	$PG_REG_POR_PAGINA = $paginacao->getRegistrosPorPagina();
	$PG_REG_AFETADOS = $paginacao->getRegistrosAfetados();
	$PG_LABEL = $paginacao->getLabelPaginacao();
	// ---------------------------------------------------------------------------------|
?>