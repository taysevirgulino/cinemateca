<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_add = "banner_local_add.php";
	$link_edit = "banner_local_edit.php?id=$ID";
	$link_remove = "banner_local_remove.php?id=$ID";
	$link_list = "banner_local_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new BannerLocal();

	if( $obj->buscarBannerLocal(1, $ID) ){
		$obj->excluirBannerLocal();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>