<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_add = "site_add.php";
	$link_edit = "site_edit.php?id=$ID";
	$link_remove = "site_remove.php?id=$ID";
	$link_list = "site_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Site();

	if( $obj->buscarSite(1, $ID) ){
		$obj->excluirSite();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>