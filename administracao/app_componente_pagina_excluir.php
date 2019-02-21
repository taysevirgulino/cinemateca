<?
	require_once("config.inc.php"); 
	require_once("logon.inc.php"); 
	
	$ID = intval( $_REQUEST["id"] );
	
	if( Validacao::isVazio($ID) ){ System::Redirect("index.php"); }

	$obj = new AppComponentePagina();
	
	if( $obj->buscarAppComponentePagina(1, $ID) ){
		$obj->excluirAppComponentePagina();
		System::AlertRedirect("Página excluida com sucesso!", "app_componente_pagina_listar.php");
	}else{
		System::AlertRedirect("Página não encontrada!", "app_componente_pagina_listar.php");
	}
	
	
?>