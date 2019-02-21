<?
	require_once("config.inc.php");
	
	Validar::Completo();
	$objUsuario = UsuarioLogin::getUsuario();

	$obj = new Lojista();
	if( !$obj->buscarAttribute(LojistaAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Painel() );
	}
	
	$template = new LayoutTemplate();
	$fileTemplate = "lojista_cronograma.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){


	    $objEmpreendimento = EmpreendimentoManage2::Empreendimento_Ativo();
	    
		/*
		 * DEFAULT
		 */
	    $Titulo = "Cronograma Lojista: ".$obj->getNome();
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */

	
		
		$template->assign("Titulo", $Titulo);
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar("Lojistas", Url::_Path()."lojista-list");
		$Navegacao->Adicionar("Cronograma");
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("objLojista", $obj);
			
		$id = $obj->getIdLojista();
		
		$objCronograma = LojistaCronogramaManage2::Update($id);
		$objFarol = new CronogramaFarol(); $objFarol->buscarAttribute(CronogramaFarolAttribute::IdCronogramaFarol(), $objCronograma->getIdCronogramaFarol());
		$template->assign("objCronograma", $objCronograma);
		$template->assign("objFarol", $objFarol);
		
		
		$itensCronogramaTipo = CronogramaTipoManage::consultarSearchQuery(
		    array(
		        new SearchQueryComparer(CronogramaTipoAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
		    ),
		    array(
		        new SearchQueryOrder(CronogramaTipoAttribute::Prioridade(), SearchOrder::Crescente())
		    )
		);
		foreach ($itensCronogramaTipo as $i => $valueCronogramaTipo) {
		    $itensCronogramaEtapa = CronogramaEtapaManage::consultarSearchQuery(
		        array(
		            new SearchQueryComparer(CronogramaEtapaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
		            new SearchQueryComparer(CronogramaEtapaAttribute::IdCronogramaTipo(), SearchComparer::Igual(), SearchCondition::E(), $valueCronogramaTipo['id_cronograma_tipo']),
		        ),
		        array(
		            new SearchQueryOrder(CronogramaEtapaAttribute::Titulo(), SearchOrder::Crescente())
		        )
		    );
		    $itensCronogramaTipo[$i]["etapas"] = $itensCronogramaEtapa;
		}
		
		$template->assign("itensCronogramaTipo", $itensCronogramaTipo);
		
		$itensLojistaEtapa = LojistaEtapaManage::consultarSearchQuery(
		    array(
		        new SearchQueryComparer(LojistaEtapaAttribute::IdLojista(), SearchComparer::Igual(), SearchCondition::E(), $obj->getIdLojista()),
		    ),
		    array(
		        new SearchQueryOrder(LojistaEtapaAttribute::IdCronogramaEtapa(), SearchOrder::Crescente())
		    )
		);
		foreach ($itensLojistaEtapa as $i => $valueLojistaEtapa) {
		    $itensLojistaEtapa[$i]["etapa"] = CronogramaEtapaManage::buscarAttribute(CronogramaEtapaAttribute::IdCronogramaEtapa(), $valueLojistaEtapa['id_cronograma_etapa']);
		    $itensLojistaEtapa[$i]["data"] = (Validacao::isData($itensLojistaEtapa[$i]["data"]) ? System::FormatarData($itensLojistaEtapa[$i]["data"], "d/m/Y") : "" );
		    
		    if($valueLojistaEtapa['status'] == 1){
		        $status = '<span class="btn btn-xs btn-success"><i class="fa fa-check"></i> Concluído</span>';
		    }else
		        if($valueLojistaEtapa['data'] >= date("Y-m-d")){
		        $status = '<span class="btn btn-xs btn-warning"><i class="fa fa-clock-o"></i> Aberto</span>';
		    }else{
		        $status = '<span class="btn btn-xs btn-primary"><i class="fa fa-exclamation-triangle"></i> Vencido</span>';
		    }
		    
		    $itensLojistaEtapa[$i]["status_label"] = $status;
		}
		print_r($objCronograma->getPorcentagemConcluido);
		
		$template->assign("itensLojistaEtapa", $itensLojistaEtapa);
		$template->assign("Val", $objUsuario);

	}
	$template->display($fileTemplate);

?>