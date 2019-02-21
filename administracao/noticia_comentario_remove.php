<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_add = "noticia_comentario_add.php";
	$link_edit = "noticia_comentario_edit.php?id=$ID";
	$link_remove = "noticia_comentario_remove.php?id=$ID";
	$link_list = "noticia_comentario_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new NoticiaComentario();

	if( $obj->buscarNoticiaComentario(1, $ID) ){
		$obj->excluirNoticiaComentario();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>