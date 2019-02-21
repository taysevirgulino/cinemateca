<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_add = "emkt_disparo_add.php";
	$link_edit = "emkt_disparo_edit.php?id=$ID";
	$link_remove = "emkt_disparo_remove.php?id=$ID";
	$link_list = "emkt_disparo.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new EmktDisparo();

	if( $obj->buscarEmktDisparo(1, $ID) ){
		$obj->excluirEmktDisparo();
		System::AlertRedirect("- Agendamento CANCELADO com sucesso;", $link_list."?id=".$obj->getIdEmkt());
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>