<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_add = "banner_add.php";
	$link_edit = "banner_edit.php?id=$ID";
	$link_remove = "banner_remove.php?id=$ID";
	$link_list = "banner_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Banner();

	if( $obj->buscarBanner(1, $ID) ){
		$obj->excluirBanner();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>