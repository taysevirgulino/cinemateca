<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "link_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "link_add.php?back=$link_back";
	$link_edit = "link_edit.php?back=$link_back";
	$link_remove = "link_remove.php?back=$link_back";

	$frm_nome = System::_POST("FrmNome");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_url = System::_POST("FrmUrl");
	$frm_target = System::_POST("FrmTarget");
	$frm_prioridade = LinkManage::ultimaPrioridade();
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		if( Validacao::isVazio($frm_url) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Url (Endereço)#";
		}
		if( Validacao::isVazio($frm_target) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Abrir#";
		}
		if( Validacao::isVazio($frm_prioridade) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Prioridade#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(LinkManage::inserirLink(-1, null, null, $frm_nome, $frm_descricao, $frm_url, $frm_target, $frm_prioridade, System::FormatarData($frm_datahora, "Y-m-d H:i:s"), $frm_status)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>