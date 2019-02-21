<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "emkt_destinatario_add.php";
	$link_edit = "emkt_destinatario_edit.php?id=$ID";
	$link_remove = "emkt_destinatario_remove.php?id=$ID";
	$link_list = "emkt_destinatario_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new EmktDestinatario();
	if(!$obj->buscarEmktDestinatario(1, $ID)){ System::Redirect($link_list); }

	$frm_id_emkt_disparo = System::_POST("FrmIdEmktDisparo");
	$frm_id_emkt_lista = System::_POST("FrmIdEmktLista");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjEmktDisparo = EmktDisparoManage::consultarEmktDisparo(1, "");
	$VObjEmktLista = EmktListaManage::consultarEmktLista(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_emkt_disparo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Emkt Disparo#";
		}
		if( Validacao::isVazio($frm_id_emkt_lista) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Emkt Lista#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(EmktDestinatarioManage::alterarEmktDestinatario($ID, null, $frm_id_emkt_disparo, $frm_id_emkt_lista)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_emkt_disparo = $obj->getIdEmktDisparo();
		$frm_id_emkt_lista = $obj->getIdEmktLista();
	}
?>