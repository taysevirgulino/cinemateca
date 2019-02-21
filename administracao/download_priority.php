<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID_ATUAL = System::_REQUEST("idatual");
	$ID_ALTERAR = System::_REQUEST("idalterar");
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "download_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "download_add.php?back=$link_back";
	$link_edit = "download_edit.php?back=$link_back";
	$link_remove = "download_remove.php?back=$link_back";

	if( Validacao::isVazio($ID_ATUAL) ){ System::Redirect($link_list); }
	if( Validacao::isVazio($ID_ALTERAR) ){ System::Redirect($link_list); }

	if($ID_ATUAL == $ID_ALTERAR){ System::Redirect($link_list);}

	$obj_atual = new Download();
	if(!$obj_atual->buscarDownload(1, $ID_ATUAL)){ System::Redirect($link_list); }

	$obj_alterar = new Download();
	if(!$obj_alterar->buscarDownload(1, $ID_ALTERAR)){ System::Redirect($link_list); }

	$aux = $obj_atual->getPrioridade();
	$obj_atual->setPrioridade( $obj_alterar->getPrioridade() );
	$obj_alterar->setPrioridade( $aux );

	$obj_atual->alterarAtributoPrioridade();
	$obj_alterar->alterarAtributoPrioridade();

	System::Redirect($link_list);
?>