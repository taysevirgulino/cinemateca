<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "area_publicacao_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "area_publicacao_add.php?back=$link_back";
	$link_edit = "area_publicacao_edit.php?back=$link_back";
	$link_remove = "area_publicacao_remove.php?back=$link_back";

	$frm_id_area_publicacao_bloco = System::_POST("FrmIdAreaPublicacaoBloco");
	$frm_nome = System::_POST("FrmNome");
	$frm_quantidade = System::_POST("FrmQuantidade");
	$frm_img = System::_POST("FrmImg");
	$frm_img_width = System::_POST("FrmImgWidth");
	$frm_img_height = System::_POST("FrmImgHeight");
	$frm_prioridade = AreaPublicacaoManage::ultimaPrioridade();
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjAreaPublicacaoBloco = AreaPublicacaoBlocoManage::consultarAttribute(null, null, null, AreaPublicacaoBlocoAttribute::Prioridade());

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_area_publicacao_bloco) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Сrea Publicaчуo Bloco#";
		}
		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			$obj = new AreaPublicacao();
			$obj->setAreaPublicacao(-1, null, $frm_id_area_publicacao_bloco, $frm_nome, $frm_quantidade, $frm_img, $frm_img_width, $frm_img_height, $frm_prioridade);
			if($obj->inserirAreaPublicacao()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro nуo Efetuado";
			}
		}
	}
?>