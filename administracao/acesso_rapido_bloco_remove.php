<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_add = "acesso_rapido_bloco_add.php";
	$link_edit = "acesso_rapido_bloco_edit.php?id=$ID";
	$link_remove = "acesso_rapido_bloco_remove.php?id=$ID";
	$link_list = "acesso_rapido_bloco_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new AcessoRapidoBloco();

	if( $obj->buscarAcessoRapidoBloco(1, $ID) ){
		$obj->excluirAcessoRapidoBloco();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>