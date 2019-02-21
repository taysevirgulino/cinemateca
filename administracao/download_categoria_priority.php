<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID_ATUAL = System::_REQUEST("idatual");
	$ID_ALTERAR = System::_REQUEST("idalterar");
	$link_add = "download_categoria_add.php";
	$link_edit = "download_categoria_edit.php";
	$link_remove = "download_categoria_remove.php";
	$link_list = "download_categoria_list.php";

	if( Validacao::isVazio($ID_ATUAL) ){ System::Redirect($link_list); }
	if( Validacao::isVazio($ID_ALTERAR) ){ System::Redirect($link_list); }

	if($ID_ATUAL == $ID_ALTERAR){ System::Redirect($link_list);}

	$obj_atual = new DownloadCategoria();
	if(!$obj_atual->buscarDownloadCategoria(1, $ID_ATUAL)){ System::Redirect($link_list); }

	$obj_alterar = new DownloadCategoria();
	if(!$obj_alterar->buscarDownloadCategoria(1, $ID_ALTERAR)){ System::Redirect($link_list); }

	$aux = $obj_atual->getPrioridade();
	$obj_atual->setPrioridade( $obj_alterar->getPrioridade() );
	$obj_alterar->setPrioridade( $aux );

	$obj_atual->alterarAtributoPrioridade();
	$obj_alterar->alterarAtributoPrioridade();

	System::Redirect($link_list);
?>