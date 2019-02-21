<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "lojista_etapa_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "lojista_etapa_add.php?back=$link_back";
	$link_edit = "lojista_etapa_edit.php?back=$link_back";
	$link_remove = "lojista_etapa_remove.php?back=$link_back";

	$frm_id_cronograma_etapa = System::_POST("FrmIdCronogramaEtapa");
	$frm_id_lojista = System::_POST("FrmIdLojista");
	$frm_id_usuario = System::_POST("FrmIdUsuario");
	$frm_data = System::_POST("FrmData");
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjCronogramaEtapa = CronogramaEtapaManage::consultarCronogramaEtapa(1, "");
	$VObjLojista = LojistaManage::consultarLojista(1, "");
	$VObjUsuario = UsuarioManage::consultarUsuario(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_cronograma_etapa) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Cronograma Etapa#";
		}
		if( Validacao::isVazio($frm_id_lojista) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Lojista#";
		}
		if( Validacao::isVazio($frm_id_usuario) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuário#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new LojistaEtapa();
			$obj->setIdCronogramaEtapa( $frm_id_cronograma_etapa ); 
			$obj->setIdLojista( $frm_id_lojista ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setData( System::FormatarData($frm_data, "Y-m-d") );
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setStatus( $frm_status ); 

			if($obj->inserirLojistaEtapa()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>