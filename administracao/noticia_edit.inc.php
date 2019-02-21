<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "noticia_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "noticia_add.php?back=$link_back";
	$link_edit = "noticia_edit.php?id=$ID&back=$link_back";
	$link_remove = "noticia_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Noticia();
	if(!$obj->buscarNoticia(1, $ID)){ System::Redirect($link_list); }

	$frm_id_editoria = System::_POST("FrmIdEditoria");
	$frm_id_area_publicacao = System::_POST("FrmIdAreaPublicacao");
	$frm_id_app_usuario_cadastro = $obj->getIdAppUsuarioCadastro();
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
	$frm_click = $obj->getClick();
	$frm_shares = $obj->getShares();
	$frm_comments = $obj->getComments();
	$frm_slug = $obj->getSlug();
	$frm_url_curta = $obj->getUrlCurta();
	$frm_datahora = System::_POST("FrmDatahora");
	$frm_datahora_cadastro = $obj->getDatahoraCadastro();
	$frm_datahora_edicao = date("Y-m-d H:i:s");
	$frm_tipo = System::_POST("FrmTipo");
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");
	$frm_bt2 = System::_POST("btSubmit2");
	$frm_tags = $_POST["tag"];
	$frm_relacao = $_POST["relacao"];

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjEditoria = EditoriaManage::consultarEditoriaAttribute(EditoriaAttribute::Status(), 1, SearchComparer::Igual(), EditoriaAttribute::Prioridade());
	$VObjEditoria = array_chunk($VObjEditoria, ceil(count($VObjEditoria)/2));
	$VObjAreaPublicacao = AreaPublicacaoManage2::Areas_Blocos();
	$VObjStatus = NoticiaStatus::_Values();
	$frm_foto_arquivo_crop = NoticiaForm::Imagem_Crop_Config( $obj->getFotoArquivo() );

	if ( ! Validacao::isVazio($frm_titulo) ){

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
			$frm_slug = NoticiaManage2::Slug($obj->getIdNoticia(), $frm_titulo, $frm_id_editoria);
			
			$obj->setNoticia($obj->getIdNoticia(), $obj->getIdentificador(), $obj->getIdeOrigem(), $frm_id_editoria, $frm_id_area_publicacao, $frm_id_app_usuario_cadastro, $frm_id_app_usuario_edicao, $frm_chapeu, $frm_titulo, $frm_resumo, $frm_texto, $frm_link, $frm_link_target, $frm_foto_credito, $frm_foto_descricao, $frm_foto_arquivo, $frm_foto_area_publicacao, $frm_click, $frm_shares, $frm_comments, $frm_slug, $frm_url_curta, System::FormatarData($frm_datahora, "Y-m-d H:i:s"), System::FormatarData($frm_datahora_cadastro, "Y-m-d H:i:s"), System::FormatarData($frm_datahora_edicao, "Y-m-d H:i:s"), $frm_tipo, $frm_status);
			if( ($frm_titulo != $obj->getTitulo()) || ($frm_id_editoria != $obj->getIdEditoria()) ){
				$obj->setUrlCurta( NoticiaManage2::EncurtarUrl( Url::_Host().Url::Noticia_Slug($obj->getIdNoticia(), $obj->getSlug())) );
			}
			
			if($obj->alterarNoticia()){
				TagManage2::Gerenciar($obj->getIdNoticia(), $frm_tags);
				NoticiaRelacaoManage2::Gerenciar($obj->getIdNoticia(), $frm_relacao);
				
				if(!empty($frm_bt2)){
					System::Redirect($link_edit."&timestamp=".time());
				}else{
					System::Redirect($link_list);
				}
				
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_id_editoria = $obj->getIdEditoria();
		$frm_id_area_publicacao = $obj->getIdAreaPublicacao();
		$frm_id_app_usuario_cadastro = $obj->getIdAppUsuarioCadastro();
		$frm_id_app_usuario_edicao = $obj->getIdAppUsuarioEdicao();
		$frm_chapeu = $obj->getChapeu();
		$frm_titulo = $obj->getTitulo();
		$frm_resumo = ($obj->getResumo());
		$frm_texto = System::_TextByHtml($obj->getTexto());
		$frm_link = $obj->getLink();
		$frm_link_target = $obj->getLinkTarget();
		$frm_foto_credito = $obj->getFotoCredito();
		$frm_foto_descricao = $obj->getFotoDescricao();
		$frm_foto_arquivo = $obj->getFotoArquivo();
		$frm_foto_area_publicacao = $obj->getFotoAreaPublicacao();
		$frm_click = $obj->getClick();
		$frm_slug = $obj->getSlug();
		$frm_url_curta = $obj->getUrlCurta();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_datahora_cadastro = System::FormatarData($obj->getDatahoraCadastro(), "d/m/Y H:i:s");
		$frm_datahora_edicao = System::FormatarData($obj->getDatahoraEdicao(), "d/m/Y H:i:s");
		$frm_tipo = $obj->getTipo();
		$frm_status = $obj->getStatus();
		
		$area = new AreaPublicacao();
		if($area->buscarAreaPublicacao(1, $obj->getIdAreaPublicacao())){
			$frm_id_area_publicacao_bloco = $area->getIdAreaPublicacaoBloco();
		}
		
		$frm_tags = array();
		$Tags = TagManage2::Tags_Noticia($obj->getIdNoticia());
		foreach ($Tags as $Tag) {
			$frm_tags[] = $Tag["nome"];
		}
		
		$frm_relacao = array();
		$Relacoes = NoticiaManage2::Noticias_Relacionadas($obj->getIdNoticia());
		foreach ($Relacoes as $Item) {
			$frm_relacao[] = $Item["titulo"]." (".System::FormatarData($Item["datahora"], "d/m/y Hhi").") [#".$Item["id_noticia"]."]";
		}
	}
?>