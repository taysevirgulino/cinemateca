<?
	require_once("config.inc.php");
	
	Validar::Completo();
	
	$template = new LayoutTemplate();
	$fileTemplate = "notificacoes.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$template->setTitle("Notificações");
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$template->assign("Titulo", "Notificações");
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar("Notificações");
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$SearchQueryComparerCollection = array();
		$SearchQueryOrderCollection = array();
		
		$SearchQueryComparerCollection[] = new SearchQueryComparer(NotificacaoAttribute::Status(), SearchComparer::Diferente(), SearchCondition::E(), NotificacaoStatus::Excluido());
		$SearchQueryComparerCollection[] = new SearchQueryComparer(NotificacaoAttribute::IdUsuario(), SearchComparer::Igual(), SearchCondition::E(), UsuarioLogin::IdUsuario());
		$SearchQueryOrderCollection[] = new SearchQueryOrder(NotificacaoAttribute::Datahora(), SearchOrder::Decrescente());
		
		// Paginção de resultados ----------------------------------------------------------|
		$vobjCount = NotificacaoManage::count( SearchMounter::Count(NotificacaoAttribute::_Table(), $SearchQueryComparerCollection) );
		$PG = intval( $_REQUEST["pg"] );
		$paginacao = new Paginacao(15, $vobjCount, $PG, Url::Notificacoes());
		$template->assign("PG_INICIO", $paginacao->getPaginacaoInicio());
		$template->assign("PG_REG_POR_PAGINA", $paginacao->getRegistrosPorPagina());
		$template->assign("PG_REG_AFETADOS", $paginacao->getRegistrosAfetados());
		$template->assign("PG_LABEL", $paginacao->getLabelPaginacao());
		// ---------------------------------------------------------------------------------|
		
		$vobj = NotificacaoManage2::consultar(SearchMounter::MounterByQueryLimit(NotificacaoAttribute::_Table(), $SearchQueryComparerCollection, $SearchQueryOrderCollection, $paginacao->getPaginacaoInicio(), $paginacao->getRegistrosPorPagina()));
		
		foreach ($vobj as $key => $value) {
		    if( $value["status"] == NotificacaoStatus::Aberto() ){
		        NotificacaoManage2::Ler($value["id_notificacao"]);
		    }
		}
		$template->assign("Itens", NotificacaoManage2::consultarResult($vobj));
		
	}
	$template->display($fileTemplate);

?>