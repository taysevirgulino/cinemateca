<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID_ATUAL = System::_GET("idatual");
	$ID_ALTERAR = System::_GET("idalterar");
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "painel_menu_list.php" : base64_decode(System::_GET("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "painel_menu_add.php?back=$link_back";
	$link_edit = "painel_menu_edit.php?back=$link_back";
	$link_remove = "painel_menu_remove.php?back=$link_back";

	if( Validacao::isVazio($ID_ATUAL) ){ System::Redirect($link_list); }
	if( Validacao::isVazio($ID_ALTERAR) ){ System::Redirect($link_list); }

	if($ID_ATUAL == $ID_ALTERAR){ System::Redirect($link_list);}

	$obj_atual = new PainelMenu();
	if(!$obj_atual->buscarAttribute(PainelMenuAttribute::IdPainelMenu(), $ID_ATUAL)){ System::Redirect($link_list); }

	$obj_alterar = new PainelMenu();
	if(!$obj_alterar->buscarAttribute(PainelMenuAttribute::IdPainelMenu(), $ID_ALTERAR)){ System::Redirect($link_list); }

	$aux = $obj_atual->getPrioridade();
	$obj_atual->setPrioridade( $obj_alterar->getPrioridade() );
	$obj_alterar->setPrioridade( $aux );

	$obj_atual->alterarAtributo(PainelMenuAttribute::Prioridade());
	$obj_alterar->alterarAtributo(PainelMenuAttribute::Prioridade());

	System::Redirect($link_list);
?>