<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "cronograma_etapa_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "cronograma_etapa_add.php?back=$link_back";
	$link_edit = "cronograma_etapa_edit.php?back=$link_back";
	$link_remove = "cronograma_etapa_remove.php?back=$link_back";

	$frm_id_cronograma_tipo = System::_POST("FrmIdCronogramaTipo");
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_porcentagem = System::_POST("FrmPorcentagem");
	$frm_prioridade = CronogramaEtapaManage::ultimaPrioridade();
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjCronogramaTipo = CronogramaTipoManage::consultarCronogramaTipo(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_cronograma_tipo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Tipo#";
		}
		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Título#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new CronogramaEtapa();
			$obj->setIdCronogramaTipo( $frm_id_cronograma_tipo ); 
			$obj->setTitulo( $frm_titulo ); 
			$obj->setDescricao( $frm_descricao ); 
			$obj->setPorcentagem( $frm_porcentagem ); 
			$obj->setPrioridade( $frm_prioridade ); 
			$obj->setStatus( $frm_status ); 

			if($obj->inserirCronogramaEtapa()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}else{
	    $frm_status = 1;
	}
?>