<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "associado_contratacao_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "associado_contratacao_add.php?back=$link_back";
	$link_edit = "associado_contratacao_edit.php?back=$link_back";
	$link_remove = "associado_contratacao_remove.php?back=$link_back";

	$frm_id_associado = System::_POST("FrmIdAssociado");
	$frm_id_associado_plano = System::_POST("FrmIdAssociadoPlano");
	$frm_valor_bruto = System::_POST("FrmValorBruto");
	$frm_valor_desconto = System::_POST("FrmValorDesconto");
	$frm_valor_final = System::_POST("FrmValorFinal");
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
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

			$obj = new AssociadoContratacao();
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

			if($obj->inserirAssociadoContratacao()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>