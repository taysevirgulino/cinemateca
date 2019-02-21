<?
	$link_add = "emkt_contato_lista_add.php";
	$link_edit = "emkt_contato_lista_edit.php";
	$link_remove = "emkt_contato_lista_remove.php";
	$link_list = "emkt_contato_lista_list.php";

	$frm_id_emkt_contato = System::_POST("FrmIdEmktContato");
	$frm_id_emkt_lista = System::_POST("FrmIdEmktLista");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjEmktContato = EmktContatoManage::consultarEmktContato(1, "");
	$VObjEmktLista = EmktListaManage::consultarEmktLista(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_emkt_contato) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Emkt Contato#";
		}
		if( Validacao::isVazio($frm_id_emkt_lista) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Emkt Lista#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(EmktContatoListaManage::inserirEmktContatoLista(-1, null, $frm_id_emkt_contato, $frm_id_emkt_lista)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>