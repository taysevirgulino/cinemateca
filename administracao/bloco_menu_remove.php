<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_add = "bloco_menu_add.php";
	$link_edit = "bloco_menu_edit.php?id=$ID";
	$link_remove = "bloco_menu_remove.php?id=$ID";
	$link_list = "bloco_menu_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new BlocoMenu();

	if( $obj->buscarBlocoMenu(1, $ID) ){
		$obj->excluirBlocoMenu();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>