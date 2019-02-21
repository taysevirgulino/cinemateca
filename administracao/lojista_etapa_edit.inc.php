<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "lojista_etapa_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "lojista_etapa_add.php?back=$link_back";
	$link_edit = "lojista_etapa_edit.php?id=$ID&back=$link_back";
	$link_remove = "lojista_etapa_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new LojistaEtapa();
	if(!$obj->buscarLojistaEtapa(1, $ID)){ System::Redirect($link_list); }

	$frm_id_cronograma_etapa = System::_POST("FrmIdCronogramaEtapa");
	$frm_id_lojista = System::_POST("FrmIdLojista");
	$frm_id_usuario = System::_POST("FrmIdUsuario");
	$frm_data = System::_POST("FrmData");
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
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
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuсrio#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setIdCronogramaEtapa( $frm_id_cronograma_etapa ); 
			$obj->setIdLojista( $frm_id_lojista ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setData( System::FormatarData($frm_data, "Y-m-d") );
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setStatus( $frm_status ); 

			if($obj->alterarLojistaEtapa()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_cronograma_etapa = $obj->getIdCronogramaEtapa();
		$frm_id_lojista = $obj->getIdLojista();
		$frm_id_usuario = $obj->getIdUsuario();
		$frm_data = System::FormatarData($obj->getData(), "d/m/Y");
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_status = $obj->getStatus();
	}
?>