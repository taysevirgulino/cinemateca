<?
	$link_add = "mural_recado_add.php";
	$link_edit = "mural_recado_edit.php";
	$link_remove = "mural_recado_remove.php";
	$link_list = "mural_recado_list.php";

	$busca_comparacao = System::_REQUEST("busca-comparacao");
	$busca_campo = System::_REQUEST("busca-campo");
	$chave = System::_REQUEST("chave");
	$ordenacao_campo = System::_REQUEST("ordenacao-campo");
	$ordenacao_ordem = System::_REQUEST("ordenacao-ordem");
	$pesquisar = System::_REQUEST("pesquisar");

	$SearchQueryComparerCollection = array();
	$SearchQueryOrderCollection = array();

	if(empty($busca_campo)){
		$busca_campo = MuralRecadoAttribute::Nome();
	}
	if(!empty($chave)){
		$SearchQueryComparerCollection[] = new SearchQueryComparer($busca_campo, $busca_comparacao, SearchCondition::E(), $chave);
	}
	if(!empty($ordenacao_campo)){
		$SearchQueryOrderCollection[] = new SearchQueryOrder($ordenacao_campo, $ordenacao_ordem);
	}else{
		$SearchQueryOrderCollection[] = new SearchQueryOrder(MuralRecadoAttribute::Datahora(), SearchOrder::Decrescente());
		$ordenacao_campo = MuralRecadoAttribute::Datahora();
		$ordenacao_ordem = SearchOrder::Decrescente();
	}
	$ordenacao_ordem_inverso = SearchOrder::_Inverso($ordenacao_ordem);

	// Paginчуo de resultados ----------------------------------------------------------|
	$vobjCount = SearchMysqlQuery::CountBySql( SearchMounter::MounterByQueryCount(MuralRecadoAttribute::_Table(), $SearchQueryComparerCollection) );
	$PG = intval( System::_REQUEST("pg") );
	$paginacao = new Paginacao(30, $vobjCount, $PG, "$link_list?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=$ordenacao_campo&ordenacao-ordem=$ordenacao_ordem");
	$PG_INICIO = $paginacao->getPaginacaoInicio();
	$PG_REG_POR_PAGINA = $paginacao->getRegistrosPorPagina();
	$PG_REG_AFETADOS = $paginacao->getRegistrosAfetados();
	$PG_LABEL = $paginacao->getLabelPaginacao();
	// ---------------------------------------------------------------------------------|

	$vobj = MuralRecadoManage::consultarMuralRecado(3, SearchMounter::MounterByQueryLimit(MuralRecadoAttribute::_Table(), $SearchQueryComparerCollection, $SearchQueryOrderCollection, $paginacao->getPaginacaoInicio(), $paginacao->getRegistrosPorPagina()));

	$Orders = SearchOrder::_GetAllOrders();
	$Comparers = SearchComparer::_GetAllComparers();
	$Attributes = MuralRecadoAttribute::_GetAllAttributes();
?>