<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "download_categoria_add.php";
	$link_edit = "download_categoria_edit.php?id=$ID";
	$link_remove = "download_categoria_remove.php?id=$ID";
	$link_list = "download_categoria_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new DownloadCategoria();

	if( $obj->buscarDownloadCategoria(1, $ID) ){
		$frm_nome = $obj->getNome();
		$frm_descricao = $obj->getDescricao();
		$frm_prioridade = $obj->getPrioridade();
	}else{
		System::Redirect($link_list);
	}
?>