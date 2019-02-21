<?
	$link_add = "emkt_disparo_add.php";
	$link_edit = "emkt_disparo_edit.php";
	$link_remove = "emkt_disparo_remove.php";
	$link_list = "emkt_disparo_list.php";

	$busca_comparacao = System::_REQUEST("busca-comparacao");
	$busca_campo = System::_REQUEST("busca-campo");
	$chave = System::_REQUEST("chave");
	$ordenacao_campo = System::_REQUEST("ordenacao-campo");
	$ordenacao_ordem = System::_REQUEST("ordenacao-ordem");
	$pesquisar = System::_REQUEST("pesquisar");

	$SearchQueryComparerCollection = array();
	$SearchQueryOrderCollection = array();

	if(empty($busca_campo)){
		$busca_campo = EmktDisparoAttribute::Agendamento();
	}
	if(!empty($chave)){
		$SearchQueryComparerCollection[] = new SearchQueryComparer($busca_campo, $busca_comparacao, SearchCondition::E(), $chave);
	}
	if(!empty($ordenacao_campo)){
		$SearchQueryOrderCollection[] = new SearchQueryOrder($ordenacao_campo, $ordenacao_ordem);
	}else{
		$SearchQueryOrderCollection[] = new SearchQueryOrder(EmktDisparoAttribute::Agendamento(), SearchOrder::Crescente());
		$ordenacao_campo = EmktDisparoAttribute::Agendamento();
		$ordenacao_ordem = SearchOrder::Crescente();
	}
	$ordenacao_ordem_inverso = SearchOrder::_Inverso($ordenacao_ordem);

	// Paginчуo de resultados ----------------------------------------------------------|
	$vobjCount = SearchMysqlQuery::CountBySql( SearchMounter::MounterByQueryCount(EmktDisparoAttribute::_Table(), $SearchQueryComparerCollection) );
	$PG = intval( System::_REQUEST("pg") );
	$paginacao = new Paginacao(30, $vobjCount, $PG, "$link_list?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=$ordenacao_campo&ordenacao-ordem=$ordenacao_ordem");
	$PG_INICIO = $paginacao->getPaginacaoInicio();
	$PG_REG_POR_PAGINA = $paginacao->getRegistrosPorPagina();
	$PG_REG_AFETADOS = $paginacao->getRegistrosAfetados();
	$PG_LABEL = $paginacao->getLabelPaginacao();
	// ---------------------------------------------------------------------------------|

	$vobj = EmktDisparoManage::consultarEmktDisparo(3, SearchMounter::MounterByQueryLimit(EmktDisparoAttribute::_Table(), $SearchQueryComparerCollection, $SearchQueryOrderCollection, $paginacao->getPaginacaoInicio(), $paginacao->getRegistrosPorPagina()));

	$Orders = SearchOrder::_GetAllOrders();
	$Comparers = SearchComparer::_GetAllComparers();
	$Attributes = EmktDisparoAttribute::_GetAllAttributes();
?>