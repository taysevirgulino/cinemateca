<?
	require_once("config.inc.php"); 
	require_once("logon.inc.php"); 
	
	$ID_MENU = intval( $_REQUEST["id"] );
	
	if( Validacao::isVazio($ID_MENU) ){ System::Redirect("index.php"); }

	$appcm = new AppComponenteMenu();
	
	if( $appcm->buscarAppComponenteMenu(1, $ID_MENU) ){
		$appcm->excluirAppComponenteMenu();
		System::Alert("Menu excluido com sucesso!");
	}
	
	System::Redirect("app_componente_menu_listar.php");
?>