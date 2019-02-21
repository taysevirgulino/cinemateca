<?
	require_once("config.inc.php"); 
	require_once("logon.inc.php"); 
	
	$ID = intval( $_REQUEST["id"] );
	$TIPO = intval( $_REQUEST["t"] );
	
	if( Validacao::isVazio($ID) ){ System::Redirect("index.php"); }

	$obj = new AppComponentePermissao();
	
	if( $obj->buscarAppComponentePermissao(1, $ID) ){
		$obj->excluirAppComponentePermissao();
		System::Alert("Permissão excluida com sucesso!");
	}
	
	System::Redirect("app_componente_permissao_cadastrar.php?id=".$TIPO);
?>