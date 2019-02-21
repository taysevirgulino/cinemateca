<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( $_REQUEST["id"] );

	if( Validacao::isVazio($ID) ){ System::Redirect("index.php"); }

	$obj = new AppComponente();

	if( $obj->buscarAppComponente(1, $ID) ){
		$obj->excluirAppComponente();
		System::AlertRedirect("Registro excluido com sucesso!", "app_componente_list.php");
	}else{
		System::AlertRedirect("Registro não encontrado!", "app_componente_list.php");
	}
?>