<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "pagina_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode("pagina_view.php?id=$ID");
	$link_add = "pagina_add.php?back=$link_back";
	$link_edit = "pagina_edit.php?id=$ID&back=$link_back";
	$link_remove = "pagina_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Pagina();

	if( $obj->buscarPagina(1, $ID) ){
		$frm_pagina = "";
		$frm_id_pagina_pai = $obj->getIdPaginaPai();
		if($frm_id_pagina_pai > 0){ 
			$objPai = PaginaManage::buscarPagina(1, $frm_id_pagina_pai);
			$frm_pagina = $objPai["titulo"];
		}		
		$frm_slug = $obj->getSlug();
		$frm_titulo = $obj->getTitulo();
		$frm_resumo = $obj->getResumo();
		$frm_texto = System::_TextByHtml($obj->getTexto());
		$frm_imagem = $obj->getImagem();
		$frm_filhos_exibir = (($obj->getFilhosExibir()==1) ? "Sim" : "Nуo");
		$frm_filhos_titulo = $obj->getFilhosTitulo();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
	
	
	
	$busca_comparacao = System::_REQUEST("busca-comparacao");
	$busca_campo = System::_REQUEST("busca-campo");
	$chave = System::_REQUEST("chave");
	$ordenacao_campo = System::_REQUEST("ordenacao-campo");
	$ordenacao_ordem = System::_REQUEST("ordenacao-ordem");
	$pesquisar = System::_REQUEST("pesquisar");

	$SearchQueryComparerCollection = array();
	$SearchQueryOrderCollection = array();

	$SearchQueryComparerCollection[] = new SearchQueryComparer(PaginaAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), Current::IdeOrigem());
	$SearchQueryComparerCollection[] = new SearchQueryComparer(PaginaAttribute::IdPaginaPai(), SearchComparer::Igual(), SearchCondition::E(), $ID);
	if(empty($busca_campo)){
		$busca_campo = PaginaAttribute::Titulo();
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

	// Paginчуo de resultados ----------------------------------------------------------|
	//$vobjCount = SearchMysqlQuery::CountBySql( SearchMounter::MounterByQueryCount(PaginaAttribute::_Table(), $SearchQueryComparerCollection) );
	$vobjCount = PaginaManage::count( SearchMounter::MounterByQueryCount(PaginaAttribute::_Table(), $SearchQueryComparerCollection) );
	$PG = intval( System::_REQUEST("pg") );
	$link_back = "pagina_view.php?id=$ID&busca-comparacao=$busca_comparacao&chave=$chave&busca-campo=$busca_campo&ordenacao-campo=$ordenacao_campo&ordenacao-ordem=$ordenacao_ordem&pesquisar=Pesquisar";
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