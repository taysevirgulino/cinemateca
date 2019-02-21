<?
	require_once("config.inc.php");
	
	Validar::Completo();
	$objUsuario = UsuarioLogin::getUsuario();

	$template = new LayoutTemplate();
	$fileTemplate = "curriculo_list.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){


	    $objEmpreendimento = EmpreendimentoManage2::Empreendimento_Ativo();
	    
		/*
		 * DEFAULT
		 */
	    $Titulo = "Currículos";
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$template->assign("Titulo", $Titulo);
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar("Currículos");
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		
		$itens = CurriculoManage::consultarSearchQuery(
		    array(
		        new SearchQueryComparer(CurriculoAttribute::IdEmpreendimento(), SearchComparer::Igual(), SearchCondition::E(), $objEmpreendimento->getIdEmpreendimento()),
		        new SearchQueryComparer(CurriculoAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
		    ),
		    array(
		        new SearchQueryOrder(CurriculoAttribute::Nome(), SearchOrder::Crescente())
		    )
		);
		foreach ($itens as $i => $value) {
		    $itens[$i]["area"] = CurriculoAreaManage::buscarAttribute(CurriculoAreaAttribute::IdCurriculoArea(), $value['id_curriculo_area']);
		    $itens[$i]["segmento"] = CurriculoSegmentoManage::buscarAttribute(CurriculoSegmentoAttribute::IdCurriculoSegmento(), $value['id_curriculo_segmento']);
		    $itens[$i]["datahora"] = System::FormatarData($value['datahora'], 'd/m/Y Hhi');
		    $itens[$i]["data_nascimento"] = ( (Validacao::isData($value["data_nascimento"])) ? System::FormatarData($value["data_nascimento"], "d/m/Y") : "" );
		    $itens[$i]["estado_civil"] = System::EstadoCivil($value["estado_civil"]);
		    $itens[$i]["sexo"] = (($value["sexo"] == "M") ? "Masculino" : "Feminino" );
		}
		
		$template->assign("Itens", $itens);
		$template->assign("Val", $objUsuario);
		
	}
	$template->display($fileTemplate);

?>