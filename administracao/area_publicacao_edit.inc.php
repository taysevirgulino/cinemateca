<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "area_publicacao_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "area_publicacao_add.php?back=$link_back";
	$link_edit = "area_publicacao_edit.php?id=$ID&back=$link_back";
	$link_remove = "area_publicacao_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new AreaPublicacao();
	if(!$obj->buscarAreaPublicacao(1, $ID)){ System::Redirect($link_list); }

	$frm_id_area_publicacao_bloco = System::_POST("FrmIdAreaPublicacaoBloco");
	$frm_nome = System::_POST("FrmNome");
	$frm_quantidade = System::_POST("FrmQuantidade");
	$frm_img = System::_POST("FrmImg");
	$frm_img_width = System::_POST("FrmImgWidth");
	$frm_img_height = System::_POST("FrmImgHeight");
	$frm_prioridade = $obj->getPrioridade();
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjAreaPublicacaoBloco = AreaPublicacaoBlocoManage::consultarAreaPublicacaoBloco(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_area_publicacao_bloco) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Сrea Publicaчуo Bloco#";
		}
		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(AreaPublicacaoManage::alterarAreaPublicacao($ID, null, $frm_id_area_publicacao_bloco, $frm_nome, $frm_quantidade, $frm_img, $frm_img_width, $frm_img_height, $frm_prioridade)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_area_publicacao_bloco = $obj->getIdAreaPublicacaoBloco();
		$frm_nome = $obj->getNome();
		$frm_quantidade = $obj->getQuantidade();
		$frm_img = $obj->getImg();
		$frm_img_width = $obj->getImgWidth();
		$frm_img_height = $obj->getImgHeight();
		$frm_prioridade = $obj->getPrioridade();
	}
?>