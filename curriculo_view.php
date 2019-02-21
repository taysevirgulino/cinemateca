<?
	require_once("config.inc.php");

	Validar::Completo();
	
	$obj = new Curriculo();
	if( !$obj->buscarAttribute(CurriculoAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Painel() );
	}
	CurriculoManage2::Acessar($obj);
	
	$template = new LayoutTemplate();
	$fileTemplate = "curriculo_view.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Currículo de ".$obj->getNome();
		
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( "Currículos", Url::_Path()."curriculo-list" );
		$Navegacao->Adicionar( $Titulo );
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("Titulo", $Titulo);
		
		$template->assign("obj", $obj);
		
		$objCurriculoArea = new CurriculoArea();
		$objCurriculoArea->buscarAttribute(CurriculoAreaAttribute::IdCurriculoArea(), $obj->getIdCurriculoArea());
		$template->assign("objCurriculoArea", $objCurriculoArea);
		
		$objCurriculoSegmento = new CurriculoSegmento();
		$objCurriculoSegmento->buscarAttribute(CurriculoSegmentoAttribute::IdCurriculoSegmento(), $obj->getIdCurriculoSegmento());
		$template->assign("objCurriculoSegmento", $objCurriculoSegmento);
		
		$template->assign("estado_civil", System::EstadoCivil( $obj->getEstadoCivil() ));
		
		$template->assign("error", $error);
		$template->assign("success", $success);
	
	}
	$template->display($fileTemplate);

?>