<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "noticia_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "noticia_add.php?back=$link_back";
	$link_edit = "noticia_edit.php?back=$link_back";
	$link_remove = "noticia_remove.php?back=$link_back";

	$frm_id_editoria = System::_POST("FrmIdEditoria");
	$frm_id_area_publicacao = System::_POST("FrmIdAreaPublicacao");
	$frm_id_app_usuario_cadastro = $USER_ID;
	$frm_id_app_usuario_edicao = $USER_ID;
	$frm_chapeu = System::_POST("FrmChapeu");
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_resumo = System::_POST("FrmResumo");
	$frm_texto = System::_POST("FrmTexto");
	$frm_link = System::_POST("FrmLink");
	$frm_link_target = System::_POST("FrmLinkTarget");
	$frm_foto_credito = System::_POST("FrmFotoCredito");
	$frm_foto_descricao = System::_POST("FrmFotoDescricao");
	$frm_foto_arquivo = System::_POST("FrmFotoArquivo");
	$frm_foto_area_publicacao = System::_POST("FrmFotoAreaPublicacao");
	$frm_click = 0;
	$frm_shares = 0;
	$frm_comments = 0;
	$frm_slug = System::_POST("FrmSlug");
	$frm_url_curta = System::_POST("FrmUrlCurta");
	$frm_datahora = System::_POST("FrmDatahora");
	$frm_datahora_cadastro = date("Y-m-d H:i:s");
	$frm_datahora_edicao = $frm_datahora_cadastro;
	$frm_tipo = System::_POST("FrmTipo");
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");
	$frm_tags = $_POST["tag"];
	$frm_relacao = $_POST["relacao"];

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjEditoria = EditoriaManage::consultarEditoriaAttribute(EditoriaAttribute::Status(), 1, SearchComparer::Igual(), EditoriaAttribute::Prioridade());
	$VObjEditoria = array_chunk($VObjEditoria, ceil(count($VObjEditoria)/2));
	$VObjAreaPublicacao = AreaPublicacaoManage2::Areas_Blocos();
	$VObjStatus = NoticiaStatus::_Values();
	$frm_foto_arquivo_crop = NoticiaForm::Imagem_Crop_Config();

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_editoria) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Editoria#";
		}
		if( Validacao::isVazio($frm_id_area_publicacao) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Бrea Publicaзгo#";
		}
		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Tнtulo#";
		}
		
		$frm_foto_arquivo = preg_replace("/^([a-z]){1}/i", "", $frm_foto_arquivo);

		if( Validacao::isVazio($label_alerta_erro) ){
			$obj = new Noticia();
			$obj->setNoticia(-1, null, null, $frm_id_editoria, $frm_id_area_publicacao, $frm_id_app_usuario_cadastro, $frm_id_app_usuario_edicao, $frm_chapeu, $frm_titulo, $frm_resumo, $frm_texto, $frm_link, $frm_link_target, $frm_foto_credito, $frm_foto_descricao, $frm_foto_arquivo, $frm_foto_area_publicacao, $frm_click, $frm_shares, $frm_comments, $frm_slug, $frm_url_curta, System::FormatarData($frm_datahora, "Y-m-d H:i:s"), System::FormatarData($frm_datahora_cadastro, "Y-m-d H:i:s"), System::FormatarData($frm_datahora_edicao, "Y-m-d H:i:s"), $frm_tipo, $frm_status);
			if($obj->inserirNoticia()){
				$obj->setSlug( NoticiaManage2::Slug($obj->getIdNoticia(), $obj->getTitulo(), $obj->getIdEditoria()) );
				$obj->setUrlCurta( NoticiaManage2::EncurtarUrl( Url::_Host().Url::Noticia_Slug($obj->getIdNoticia(), $obj->getSlug())) );
				$obj->alterarNoticia();
				
				TagManage2::Gerenciar($obj->getIdNoticia(), $frm_tags);
				NoticiaRelacaoManage2::Gerenciar($obj->getIdNoticia(), $frm_relacao);
				
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro nгo Efetuado";
			}
		}
	}else{
		$frm_tipo = NoticiaTipo::_Default();
		$frm_link_target = "_parent";
		$frm_datahora = date("d/m/Y H:i:s");
		$frm_status = NoticiaStatus::_Default();
		$frm_id_editoria = 1392380240;
	}
?>