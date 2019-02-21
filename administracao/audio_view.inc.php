<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "audio_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "audio_add.php?back=$link_back";
	$link_edit = "audio_edit.php?id=$ID&back=$link_back";
	$link_remove = "audio_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Audio();

	if( $obj->buscarAudio(1, $ID) ){
		$ValueAudioCategoria = AudioCategoriaManage::buscarAudioCategoria(1, $obj->getIdAudioCategoria());
		$frm_id_audio_categoria = $ValueAudioCategoria["nome"];
		$frm_titulo = $obj->getTitulo();
		$frm_descricao = System::_TextByHtml($obj->getDescricao());
		$frm_arquivo = $obj->getArquivo();
		$frm_embed = System::_TextByHtml($obj->getEmbed());
		$frm_width = $obj->getWidth();
		$frm_height = $obj->getHeight();
		$frm_imagem = $obj->getImagem();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
		
		$frm_player = AudioPlayer::PlayerByAudio($obj);
	}else{
		System::Redirect($link_list);
	}
?>