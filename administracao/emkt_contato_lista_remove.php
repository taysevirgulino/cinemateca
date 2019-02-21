<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_add = "emkt_contato_lista_add.php";
	$link_edit = "emkt_contato_lista_edit.php?id=$ID";
	$link_remove = "emkt_contato_lista_remove.php?id=$ID";
	$link_list = "emkt_contato_lista_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new EmktContatoLista();

	if( $obj->buscarEmktContatoLista(1, $ID) ){
		$obj->excluirEmktContatoLista();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>