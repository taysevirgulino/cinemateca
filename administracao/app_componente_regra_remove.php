<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( $_REQUEST["id"] );

	if( Validacao::isVazio($ID) ){ System::Redirect("index.php"); }

	$obj = new AppComponenteRegra();

	if( $obj->buscarAppComponenteRegra(1, $ID) ){
		$obj->excluirAppComponenteRegra();
		System::AlertRedirect("Registro excluido com sucesso!", "app_componente_regra_list.php");
	}else{
		System::AlertRedirect("Registro não encontrado!", "app_componente_regra_list.php");
	}
?>