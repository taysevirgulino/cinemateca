<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID_ATUAL = intval( $_REQUEST["idatual"] );
	$ID_ALTERAR = intval( $_REQUEST["idalterar"] );

	if( Validacao::isVazio($ID_ATUAL) ){ System::Redirect("app_componente_menu_list.php"); }
	if( Validacao::isVazio($ID_ALTERAR) ){ System::Redirect("app_componente_menu_list.php"); }

	if($ID_ATUAL == $ID_ALTERAR){ System::Redirect("app_componente_menu_list.php");}

	$obj_atual = new AppComponenteMenu();
	if(!$obj_atual->buscarAppComponenteMenu(1, $ID_ATUAL)){ System::Redirect("app_componente_menu_list.php"); }

	$obj_alterar = new AppComponenteMenu();
	if(!$obj_alterar->buscarAppComponenteMenu(1, $ID_ALTERAR)){ System::Redirect("app_componente_menu_list.php"); }

	$aux = $obj_atual->getPrioridade();
	$obj_atual->setPrioridade( $obj_alterar->getPrioridade() );
	$obj_alterar->setPrioridade( $aux );

	$obj_atual->alterarAtributoPrioridade();
	$obj_alterar->alterarAtributoPrioridade();

	System::Redirect("app_componente_menu_list.php");
?>