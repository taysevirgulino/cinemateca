<?
	$link_add = "emkt_destinatario_add.php";
	$link_edit = "emkt_destinatario_edit.php";
	$link_remove = "emkt_destinatario_remove.php";
	$link_list = "emkt_destinatario_list.php";

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
			if(EmktDestinatarioManage::inserirEmktDestinatario(-1, null, $frm_id_emkt_disparo, $frm_id_emkt_lista)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>