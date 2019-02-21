<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_add = "jornal_edicao_add.php";
	$link_edit = "jornal_edicao_edit.php?id=$ID";
	$link_remove = "jornal_edicao_remove.php?id=$ID";
	$link_list = "jornal_edicao_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new JornalEdicao();

	if( $obj->buscarJornalEdicao(1, $ID) ){
		$obj->excluirJornalEdicao();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>