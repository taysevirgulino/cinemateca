<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_add = "galeria_album_add.php";
	$link_edit = "galeria_album_edit.php?id=$ID";
	$link_remove = "galeria_album_remove.php?id=$ID";
	$link_list = "galeria_album_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new GaleriaAlbum();

	if( $obj->buscarGaleriaAlbum(1, $ID) ){
		$obj->excluirGaleriaAlbum();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>