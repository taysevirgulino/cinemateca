<?
	$link_add = "conteudo_add.php";
	$link_edit = "conteudo_edit.php";
	$link_remove = "conteudo_remove.php";
	$link_list = "conteudo_list.php";

	$busca_comparacao = System::_REQUEST("busca-comparacao");
	$busca_campo = System::_REQUEST("busca-campo");
	$chave = System::_REQUEST("chave");
	$ordenacao_campo = System::_REQUEST("ordenacao-campo");
	$ordenacao_ordem = System::_REQUEST("ordenacao-ordem");
	$pesquisar = System::_REQUEST("pesquisar");
	$exportar = System::_REQUEST("exportar");

	$SearchQueryComparerCollection = array();
	$SearchQueryOrderCollection = array();

	$SearchQueryComparerCollection[] = new SearchQueryComparer(ConteudoAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), Current::IdeOrigem());
	if(empty($busca_campo)){
		$busca_campo = ConteudoAttribute::Titulo();
	}
	if(!empty($chave)){
		$SearchQueryComparerCollection[] = new SearchQueryComparer($busca_campo, $busca_comparacao, SearchCondition::E(), $chave);
	}
	if(!empty($ordenacao_campo)){
		$SearchQueryOrderCollection[] = new SearchQueryOrder($ordenacao_campo, $ordenacao_ordem);
	}else{
		$SearchQueryOrderCollection[] = new SearchQueryOrder(ConteudoAttribute::Prioridade(), SearchOrder::Crescente());
		$ordenacao_campo = ConteudoAttribute::Prioridade();
		$ordenacao_ordem = SearchOrder::Crescente();
	}
	$ordenacao_ordem_inverso = SearchOrder::_Inverso($ordenacao_ordem);

	if(!Validacao::isVazio($exportar)){
		$export_ide = md5(date("YmdHis"));
		$export = array();
		$export["Object"] = "Conteudo";
		$export["SearchQueryComparerCollection"] = $SearchQueryComparerCollection;
		$export["SearchQueryOrderCollection"] = $SearchQueryOrderCollection;
		$_SESSION[$export_ide] = $export;
		System::Redirect("conteudo_export.php?ide=$export_ide");
	}

	// Paginчуo de resultados ----------------------------------------------------------|
	$vobjCount = ConteudoManage::count( SearchMounter::MounterByQueryCount(ConteudoAttribute::_Table(), $SearchQueryComparerCollection) );
	$PG = intval( System::_REQUEST("pg") );
	$link_back = "$link_list?busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=$ordenacao_campo&ordenacao-ordem=$ordenacao_ordem&pesquisar=Pesquisar";
	$paginacao = new Paginacao(30, $vobjCount, $PG, $link_back);
	$link_back = base64_encode($link_back."&pg=$PG");
	$PG_INICIO = $paginacao->getPaginacaoInicio();
	$PG_REG_POR_PAGINA = $paginacao->getRegistrosPorPagina();
	$PG_REG_AFETADOS = $paginacao->getRegistrosAfetados();
	$PG_LABEL = $paginacao->getLabelPaginacao();
	// ---------------------------------------------------------------------------------|

	$vobj = ConteudoManage::consultar(SearchMounter::MounterByQueryLimit(ConteudoAttribute::_Table(), $SearchQueryComparerCollection, $SearchQueryOrderCollection, $paginacao->getPaginacaoInicio(), $paginacao->getRegistrosPorPagina()));

	$Orders = SearchOrder::_GetAllOrders();
	$Comparers = SearchComparer::_GetAllComparers();
	$Attributes = ConteudoAttribute::_GetAllAttributes();
?>