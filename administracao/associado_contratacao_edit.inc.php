<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "associado_contratacao_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "associado_contratacao_add.php?back=$link_back";
	$link_edit = "associado_contratacao_edit.php?id=$ID&back=$link_back";
	$link_remove = "associado_contratacao_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new AssociadoContratacao();
	if(!$obj->buscarAssociadoContratacao(1, $ID)){ System::Redirect($link_list); }

	$frm_id_associado = System::_POST("FrmIdAssociado");
	$frm_id_associado_plano = System::_POST("FrmIdAssociadoPlano");
	$frm_valor_bruto = System::_POST("FrmValorBruto");
	$frm_valor_desconto = System::_POST("FrmValorDesconto");
	$frm_valor_final = System::_POST("FrmValorFinal");
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
	$frm_pagamento_retorno = System::_POST("FrmPagamentoRetorno");
	$frm_pagamento_datahora = System::_POST("FrmPagamentoDatahora");
	$frm_pagamento_valor = System::_POST("FrmPagamentoValor");
	$frm_plano_data_inicial = System::_POST("FrmPlanoDataInicial");
	$frm_plano_data_final = System::_POST("FrmPlanoDataFinal");
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjAssociado = AssociadoManage::consultarAssociado(1, "");
	$VObjAssociadoPlano = AssociadoPlanoManage::consultarAssociadoPlano(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_associado) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Associado#";
		}
		if( Validacao::isVazio($frm_id_associado_plano) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Associado Plano#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setIdAssociado( $frm_id_associado ); 
			$obj->setIdAssociadoPlano( $frm_id_associado_plano ); 
			$obj->setValorBruto( $frm_valor_bruto ); 
			$obj->setValorDesconto( $frm_valor_desconto ); 
			$obj->setValorFinal( $frm_valor_final ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setPagamentoRetorno( $frm_pagamento_retorno ); 
			$obj->setPagamentoDatahora( System::FormatarData($frm_pagamento_datahora, "Y-m-d H:i:s") );
			$obj->setPagamentoValor( $frm_pagamento_valor ); 
			$obj->setPlanoDataInicial( System::FormatarData($frm_plano_data_inicial, "Y-m-d") );
			$obj->setPlanoDataFinal( System::FormatarData($frm_plano_data_final, "Y-m-d") );
			$obj->setStatus( $frm_status ); 

			if($obj->alterarAssociadoContratacao()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_associado = $obj->getIdAssociado();
		$frm_id_associado_plano = $obj->getIdAssociadoPlano();
		$frm_valor_bruto = $obj->getValorBruto();
		$frm_valor_desconto = $obj->getValorDesconto();
		$frm_valor_final = $obj->getValorFinal();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_pagamento_retorno = System::_TextByHtml($obj->getPagamentoRetorno());
		$frm_pagamento_datahora = System::FormatarData($obj->getPagamentoDatahora(), "d/m/Y H:i:s");
		$frm_pagamento_valor = $obj->getPagamentoValor();
		$frm_plano_data_inicial = System::FormatarData($obj->getPlanoDataInicial(), "d/m/Y");
		$frm_plano_data_final = System::FormatarData($obj->getPlanoDataFinal(), "d/m/Y");
		$frm_status = $obj->getStatus();
	}
?>