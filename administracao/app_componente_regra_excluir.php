<?
	require_once("config.inc.php"); 
	require_once("logon.inc.php"); 
	
	$ID = intval( $_REQUEST["id"] );
	
	if( Validacao::isVazio($ID) ){ System::Redirect("index.php"); }

	$obj = new AppComponenteRegra();
	
	if( $obj->buscarAppComponenteRegra(1, $ID) ){
		$obj->excluirAppComponenteRegra();
		System::AlertRedirect("Regra excluida com sucesso!", "app_componente_regra_listar.php");
	}else{
		System::AlertRedirect("Página não encontrada!", "app_componente_regra_listar.php");
	}
	
	
?>