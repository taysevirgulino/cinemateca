<?
	$link_add = "pagina_add.php";
	$link_edit = "pagina_edit.php";
	$link_remove = "pagina_remove.php";
	$link_list = "pagina_list.php";

	$busca_comparacao = System::_REQUEST("busca-comparacao");
	$busca_campo = System::_REQUEST("busca-campo");
	$chave = System::_REQUEST("chave");
	$ordenacao_campo = System::_REQUEST("ordenacao-campo");
	$ordenacao_ordem = System::_REQUEST("ordenacao-ordem");
	$pesquisar = System::_REQUEST("pesquisar");
	$exportar = System::_REQUEST("exportar");

	$SearchQueryComparerCollection = array();
	$SearchQueryOrderCollection = array();

	$SearchQueryComparerCollection[] = new SearchQueryComparer(PaginaAttribute::IdPaginaPai(), SearchComparer::Igual(), SearchCondition::E(), 0);
	$SearchQueryComparerCollection[] = new SearchQueryComparer(PaginaAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), Current::IdeOrigem());
	if(empty($busca_campo)){
		$busca_campo = PaginaAttribute::Slug();
	}
	if(!empty($chave)){
		$SearchQueryComparerCollection[] = new SearchQueryComparer($busca_campo, $busca_comparacao, SearchCondition::E(), $chave);
	}
	if(!empty($ordenacao_campo)){
		$SearchQueryOrderCollection[] = new SearchQueryOrder($ordenacao_campo, $ordenacao_ordem);
	}else{
		$SearchQueryOrderCollection[] = new SearchQueryOrder(PaginaAttribute::Prioridade(), SearchOrder::Crescente());
		$ordenacao_campo = PaginaAttribute::Prioridade();
		$ordenacao_ordem = SearchOrder::Crescente();
	}
	$ordenacao_ordem_inverso = SearchOrder::_Inverso($ordenacao_ordem);

	if(!Validacao::isVazio($exportar)){
		$export_ide = md5(date("YmdHis"));
		$export = array();
		$export["Object"] = "Pagina";
		$export["SearchQueryComparerCollection"] = $SearchQueryComparerCollection;
		$export["SearchQueryOrderCollection"] = $SearchQueryOrderCollection;
		$_SESSION[$export_ide] = $export;
		System::Redirect("pagina_export.php?ide=$export_ide");
	}

	// Paginчуo de resultados ----------------------------------------------------------|
	//$vobjCount = SearchMysqlQuery::CountBySql( SearchMounter::MounterByQueryCount(PaginaAttribute::_Table(), $SearchQueryComparerCollection) );
	$vobjCount = PaginaManage::count( SearchMounter::MounterByQueryCount(PaginaAttribute::_Table(), $SearchQueryComparerCollection) );
	$PG = intval( System::_REQUEST("pg") );
	$link_back = "$link_list?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=$ordenacao_campo&ordenacao-ordem=$ordenacao_ordem&pesquisar=Pesquisar";
	$paginacao = new Paginacao(100, $vobjCount, $PG, $link_back);
	$link_back = base64_encode($link_back."&pg=$PG");
	$PG_INICIO = $paginacao->getPaginacaoInicio();
	$PG_REG_POR_PAGINA = $paginacao->getRegistrosPorPagina();
	$PG_REG_AFETADOS = $paginacao->getRegistrosAfetados();
	$PG_LABEL = $paginacao->getLabelPaginacao();
	// ---------------------------------------------------------------------------------|

	$vobj = PaginaManage::consultarPagina(3, SearchMounter::MounterByQueryLimit(PaginaAttribute::_Table(), $SearchQueryComparerCollection, $SearchQueryOrderCollection, $paginacao->getPaginacaoInicio(), $paginacao->getRegistrosPorPagina()));

	$Orders = SearchOrder::_GetAllOrders();
	$Comparers = SearchComparer::_GetAllComparers();
	$Attributes = PaginaAttribute::_GetAllAttributes();
?>