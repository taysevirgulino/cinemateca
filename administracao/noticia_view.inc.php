<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "noticia_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "noticia_add.php?back=$link_back";
	$link_edit = "noticia_edit.php?id=$ID&back=$link_back";
	$link_remove = "noticia_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Noticia();

	if( $obj->buscarNoticia(1, $ID) ){
		$ValueEditoria = EditoriaManage::buscarEditoria(1, $obj->getIdEditoria());
		$frm_id_editoria = $ValueEditoria["nome"];
		$ValueAreaPublicacao = AreaPublicacaoManage::buscarAreaPublicacao(1, $obj->getIdAreaPublicacao());
		$frm_id_area_publicacao = $ValueAreaPublicacao["nome"];
		$ValueAppUsuario = AppUsuarioManage::buscarAppUsuario(1, $obj->getIdAppUsuarioCadastro());
		$frm_id_app_usuario_cadastro = $ValueAppUsuario["nome"];
		$ValueAppUsuario = AppUsuarioManage::buscarAppUsuario(1, $obj->getIdAppUsuarioEdicao());
		$frm_id_app_usuario_edicao = $ValueAppUsuario["nome"];
		$frm_chapeu = $obj->getChapeu();
		$frm_titulo = $obj->getTitulo();
		$frm_resumo = System::_TextByHtml($obj->getResumo());
		$frm_texto = System::_TextByHtml($obj->getTexto());
		$frm_link = $obj->getLink();
		$frm_link_target = $obj->getLinkTarget();
		$frm_foto_credito = $obj->getFotoCredito();
		$frm_foto_descricao = $obj->getFotoDescricao();
		$frm_foto_arquivo = $obj->getFotoArquivo();
		$frm_foto_area_publicacao = $obj->getFotoAreaPublicacao();
		$frm_click = $obj->getClick();
		$frm_shares = $obj->getShares();
		$frm_comments = $obj->getComments();
		$frm_slug = $obj->getSlug();
		$frm_url_curta = $obj->getUrlCurta();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_datahora_cadastro = System::FormatarData($obj->getDatahoraCadastro(), "d/m/y [Hhi]");
		$frm_datahora_edicao = System::FormatarData($obj->getDatahoraEdicao(), "d/m/y [Hhi]");
		$frm_tipo = NoticiaTipo::_Descricao($obj->getTipo());
		$frm_status = NoticiaStatus::_Descricao($obj->getStatus());
		
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
	}else{
		System::Redirect($link_list);
	}
?>