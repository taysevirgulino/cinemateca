<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_add = "mural_recado_add.php";
	$link_edit = "mural_recado_edit.php?id=$ID";
	$link_remove = "mural_recado_remove.php?id=$ID";
	$link_list = "mural_recado_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new MuralRecado();

	if( $obj->buscarMuralRecado(1, $ID) ){
		$obj->excluirMuralRecado();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>