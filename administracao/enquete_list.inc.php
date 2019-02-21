<?
	$link_add = "enquete_add.php";
	$link_edit = "enquete_edit.php";
	$link_remove = "enquete_remove.php";
	$link_list = "enquete_list.php";

	$busca_comparacao = System::_REQUEST("busca-comparacao");
	$busca_campo = System::_REQUEST("busca-campo");
	$chave = System::_REQUEST("chave");
	$ordenacao_campo = System::_REQUEST("ordenacao-campo");
	$ordenacao_ordem = System::_REQUEST("ordenacao-ordem");
	$pesquisar = System::_REQUEST("pesquisar");
	$exportar = System::_REQUEST("exportar");

	$SearchQueryComparerCollection = array();
	$SearchQueryOrderCollection = array();

	$SearchQueryComparerCollection[] = new SearchQueryComparer(EnqueteAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), Current::IdeOrigem());
	if(empty($busca_campo)){
		$busca_campo = EnqueteAttribute::Pergunta();
	}
	if(!empty($chave)){
		$SearchQueryComparerCollection[] = new SearchQueryComparer($busca_campo, $busca_comparacao, SearchCondition::E(), $chave);
	}
	if(!empty($ordenacao_campo)){
		$SearchQueryOrderCollection[] = new SearchQueryOrder($ordenacao_campo, $ordenacao_ordem);
	}else{
		$SearchQueryOrderCollection[] = new SearchQueryOrder(EnqueteAttribute::DataInicial(), SearchOrder::Decrescente());
		$ordenacao_campo = EnqueteAttribute::DataInicial();
		$ordenacao_ordem = SearchOrder::Decrescente();
	}
	$ordenacao_ordem_inverso = SearchOrder::_Inverso($ordenacao_ordem);

	if(!Validacao::isVazio($exportar)){
		$export_ide = md5(date("YmdHis"));
		$export = array();
		$export["Object"] = "Enquete";
		$export["SearchQueryComparerCollection"] = $SearchQueryComparerCollection;
		$export["SearchQueryOrderCollection"] = $SearchQueryOrderCollection;
		$_SESSION[$export_ide] = $export;
		System::Redirect("enquete_export.php?ide=$export_ide");
	}

	// Paginчуo de resultados ----------------------------------------------------------|
	$vobjCount = EnqueteManage::count( SearchMounter::MounterByQueryCount(EnqueteAttribute::_Table(), $SearchQueryComparerCollection) );
	$PG = intval( System::_REQUEST("pg") );
	$paginacao = new Paginacao(30, $vobjCount, $PG, "$link_list?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=$ordenacao_campo&ordenacao-ordem=$ordenacao_ordem");
	$PG_INICIO = $paginacao->getPaginacaoInicio();
	$PG_REG_POR_PAGINA = $paginacao->getRegistrosPorPagina();
	$PG_REG_AFETADOS = $paginacao->getRegistrosAfetados();
	$PG_LABEL = $paginacao->getLabelPaginacao();
	// ---------------------------------------------------------------------------------|

	$vobj = EnqueteManage::consultar(SearchMounter::MounterByQueryLimit(EnqueteAttribute::_Table(), $SearchQueryComparerCollection, $SearchQueryOrderCollection, $paginacao->getPaginacaoInicio(), $paginacao->getRegistrosPorPagina()));

	$Orders = SearchOrder::_GetAllOrders();
	$Comparers = SearchComparer::_GetAllComparers();
	$Attributes = EnqueteAttribute::_GetAllAttributes();
?>