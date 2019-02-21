<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_add = "emkt_destinatario_add.php";
	$link_edit = "emkt_destinatario_edit.php?id=$ID";
	$link_remove = "emkt_destinatario_remove.php?id=$ID";
	$link_list = "emkt_destinatario_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new EmktDestinatario();

	if( $obj->buscarEmktDestinatario(1, $ID) ){
		$obj->excluirEmktDestinatario();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>