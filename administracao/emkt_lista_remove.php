<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_add = "emkt_lista_add.php";
	$link_edit = "emkt_lista_edit.php?id=$ID";
	$link_remove = "emkt_lista_remove.php?id=$ID";
	$link_list = "emkt_lista_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new EmktLista();

	if( $obj->buscarEmktLista(1, $ID) ){
		$obj->excluirEmktLista();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro n�o encontrado!", $link_list);
	}
?>