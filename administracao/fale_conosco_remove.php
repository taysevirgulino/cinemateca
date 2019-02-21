<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_add = "fale_conosco_add.php";
	$link_edit = "fale_conosco_edit.php?id=$ID";
	$link_remove = "fale_conosco_remove.php?id=$ID";
	$link_list = "fale_conosco_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new FaleConosco();

	if( $obj->buscarFaleConosco(1, $ID) ){
		$obj->excluirFaleConosco();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>