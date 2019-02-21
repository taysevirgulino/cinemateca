<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID_ATUAL = System::_REQUEST("idatual");
	$ID_ALTERAR = System::_REQUEST("idalterar");
	$link_add = "acesso_rapido_bloco_add.php";
	$link_edit = "acesso_rapido_bloco_edit.php";
	$link_remove = "acesso_rapido_bloco_remove.php";
	$link_list = "acesso_rapido_bloco_list.php";

	if( Validacao::isVazio($ID_ATUAL) ){ System::Redirect($link_list); }
	if( Validacao::isVazio($ID_ALTERAR) ){ System::Redirect($link_list); }

	if($ID_ATUAL == $ID_ALTERAR){ System::Redirect($link_list);}

	$obj_atual = new AcessoRapidoBloco();
	if(!$obj_atual->buscarAcessoRapidoBloco(1, $ID_ATUAL)){ System::Redirect($link_list); }

	$obj_alterar = new AcessoRapidoBloco();
	if(!$obj_alterar->buscarAcessoRapidoBloco(1, $ID_ALTERAR)){ System::Redirect($link_list); }

	$aux = $obj_atual->getPrioridade();
	$obj_atual->setPrioridade( $obj_alterar->getPrioridade() );
	$obj_alterar->setPrioridade( $aux );

	$obj_atual->alterarAtributoPrioridade();
	$obj_alterar->alterarAtributoPrioridade();

	System::Redirect($link_list);
?>