<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_add = "download_add.php";
	$link_edit = "download_edit.php?id=$ID";
	$link_remove = "download_remove.php?id=$ID";
	$link_list = "download_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Download();

	if( $obj->buscarDownload(1, $ID) ){
		$obj->excluirDownload();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>