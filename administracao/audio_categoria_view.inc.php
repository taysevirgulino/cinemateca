<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "audio_categoria_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "audio_categoria_add.php?back=$link_back";
	$link_edit = "audio_categoria_edit.php?id=$ID&back=$link_back";
	$link_remove = "audio_categoria_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new AudioCategoria();

	if( $obj->buscarAudioCategoria(1, $ID) ){
		$frm_nome = $obj->getNome();
		$frm_descricao = $obj->getDescricao();
		$frm_prioridade = $obj->getPrioridade();
	}else{
		System::Redirect($link_list);
	}
?>