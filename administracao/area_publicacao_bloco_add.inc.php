<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "area_publicacao_bloco_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "area_publicacao_bloco_add.php?back=$link_back";
	$link_edit = "area_publicacao_bloco_edit.php?back=$link_back";
	$link_remove = "area_publicacao_bloco_remove.php?back=$link_back";

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_legenda = System::_POST("FrmLegenda");
	$frm_url = System::_POST("FrmUrl");
	$frm_style = System::_POST("FrmStyle");
	$frm_prioridade = AreaPublicacaoBlocoManage::ultimaPrioridade();
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Título#";
		}
		if( Validacao::isVazio($frm_url) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Url (Endereço)#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			$obj = new AreaPublicacaoBloco();
			$obj->setAreaPublicacaoBloco(-1, null, $frm_titulo, $frm_legenda, $frm_url, $frm_style, $frm_prioridade, $frm_status);
			if($obj->inserirAreaPublicacaoBloco()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>