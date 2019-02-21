<?
	$ID = intval( $_REQUEST["id"] );

	if( Validacao::isVazio($ID) ){ System::Redirect("app_componente_pagina_list.php"); }

	$obj = new AppComponentePagina();

	if( $obj->buscarAppComponentePagina(1, $ID) ){
		$frm_url = $obj->getUrl();
		$frm_descricao = $obj->getDescricao();
	}else{
		System::Redirect("app_componente_pagina_list.php");
	}
?>