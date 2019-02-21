<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$IDJ = intval( System::_REQUEST("idj") );
	$link_add = "jornal_pagina_add.php";
	$link_edit = "jornal_pagina_edit.php?id=$ID";
	$link_remove = "jornal_pagina_remove.php?id=$ID";
	$link_list = "jornal_edicao_edit.php?id=$IDJ";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new JornalPagina();

	if( $obj->buscarJornalPagina(1, $ID) ){
		$obj->excluirJornalPagina();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>