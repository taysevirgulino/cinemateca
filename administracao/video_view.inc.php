<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "video_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "video_add.php?back=$link_back";
	$link_edit = "video_edit.php?id=$ID&back=$link_back";
	$link_remove = "video_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Video();

	if( $obj->buscarVideo(1, $ID) ){
		$ValueVideoCategoria = VideoCategoriaManage::buscarVideoCategoria(1, $obj->getIdVideoCategoria());
		$frm_id_video_categoria = $ValueVideoCategoria["nome"];
		$frm_titulo = $obj->getTitulo();
		$frm_descricao = System::_TextByHtml($obj->getDescricao());
		$frm_arquivo = $obj->getArquivo();
		$frm_embed = System::_TextByHtml($obj->getEmbed());
		$frm_width = $obj->getWidth();
		$frm_height = $obj->getHeight();
		$frm_imagem = $obj->getImagem();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
		
		$frm_player = VideoPlayer::PlayerByVideo($obj);
	}else{
		System::Redirect($link_list);
	}
?>