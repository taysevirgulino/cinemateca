<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "lojista_cronograma_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "lojista_cronograma_add.php?back=$link_back";
	$link_edit = "lojista_cronograma_edit.php?back=$link_back";
	$link_remove = "lojista_cronograma_remove.php?back=$link_back";

	$frm_id_lojista = System::_POST("FrmIdLojista");
	$frm_id_cronograma_farol = System::_POST("FrmIdCronogramaFarol");
	$frm_porcentagem_indefinido = System::_POST("FrmPorcentagemIndefinido");
	$frm_porcentagem_aberto = System::_POST("FrmPorcentagemAberto");
	$frm_porcentagem_vencido = System::_POST("FrmPorcentagemVencido");
	$frm_porcentagem_concluido = System::_POST("FrmPorcentagemConcluido");
	$frm_previsao_inicio = System::_POST("FrmPrevisaoInicio");
	$frm_previsao_fim = System::_POST("FrmPrevisaoFim");
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjLojista = LojistaManage::consultarLojista(1, "");
	$VObjCronogramaFarol = CronogramaFarolManage::consultarCronogramaFarol(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_lojista) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Lojista#";
		}
		if( Validacao::isVazio($frm_id_cronograma_farol) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Cronograma Farol#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new LojistaCronograma();
			$obj->setIdLojista( $frm_id_lojista ); 
			$obj->setIdCronogramaFarol( $frm_id_cronograma_farol ); 
			$obj->setPorcentagemIndefinido( $frm_porcentagem_indefinido ); 
			$obj->setPorcentagemAberto( $frm_porcentagem_aberto ); 
			$obj->setPorcentagemVencido( $frm_porcentagem_vencido ); 
			$obj->setPorcentagemConcluido( $frm_porcentagem_concluido ); 
			$obj->setPrevisaoInicio( System::FormatarData($frm_previsao_inicio, "Y-m-d") );
			$obj->setPrevisaoFim( System::FormatarData($frm_previsao_fim, "Y-m-d") );
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );

			if($obj->inserirLojistaCronograma()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>