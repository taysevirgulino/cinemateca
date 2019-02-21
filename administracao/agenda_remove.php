<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_add = "agenda_add.php";
	$link_edit = "agenda_edit.php?id=$ID";
	$link_remove = "agenda_remove.php?id=$ID";
	$link_list = "agenda_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Agenda();

	if( $obj->buscarAgenda(1, $ID) ){
		$obj->excluirAgenda();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>