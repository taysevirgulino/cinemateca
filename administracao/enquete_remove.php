<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_add = "enquete_add.php";
	$link_edit = "enquete_edit.php?id=$ID";
	$link_remove = "enquete_remove.php?id=$ID";
	$link_list = "enquete_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Enquete();

	if( $obj->buscarEnquete(1, $ID) ){
		$obj->excluirEnquete();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>