<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "emkt_disparo_add.php";
	$link_edit = "emkt_disparo_edit.php?id=$ID";
	$link_remove = "emkt_disparo_remove.php?id=$ID";
	$link_list = "emkt_disparo_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new EmktDisparo();
	if(!$obj->buscarEmktDisparo(1, $ID)){ System::Redirect($link_list); }

	$frm_id_emkt = System::_POST("FrmIdEmkt");
	$frm_agendamento = System::_POST("FrmAgendamento");
	$frm_resultado = System::_POST("FrmResultado");
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjEmkt = EmktManage::consultarEmkt(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_emkt) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Emkt#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(EmktDisparoManage::alterarEmktDisparo($ID, null, $frm_id_emkt, System::FormatarData($frm_agendamento, "Y-m-d H:i:s"), $frm_resultado, $frm_status)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_emkt = $obj->getIdEmkt();
		$frm_agendamento = System::FormatarData($obj->getAgendamento(), "d/m/Y H:i:s");
		$frm_resultado = System::_TextByHtml($obj->getResultado());
		$frm_status = $obj->getStatus();
	}
?>