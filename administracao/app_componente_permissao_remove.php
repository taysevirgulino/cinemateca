<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( $_REQUEST["id"] );

	if( Validacao::isVazio($ID) ){ System::Redirect("index.php"); }

	$obj = new AppComponentePermissao();

	if( $obj->buscarAppComponentePermissao(1, $ID) ){
		$obj->excluirAppComponentePermissao();
		System::AlertRedirect("Registro excluido com sucesso!", "app_componente_permissao_list.php");
	}else{
		System::AlertRedirect("Registro não encontrado!", "app_componente_permissao_list.php");
	}
?>