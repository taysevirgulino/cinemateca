<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "video_categoria_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "video_categoria_add.php?back=$link_back";
	$link_edit = "video_categoria_edit.php?id=$ID&back=$link_back";
	$link_remove = "video_categoria_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new VideoCategoria();

	if( $obj->buscarVideoCategoria(1, $ID) ){
		$frm_nome = $obj->getNome();
		$frm_descricao = $obj->getDescricao();
		$frm_prioridade = $obj->getPrioridade();
	}else{
		System::Redirect($link_list);
	}
?>