<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( $_REQUEST["id"] );

	if( Validacao::isVazio($ID) ){ System::Redirect("index.php"); }

	$obj = new AppUsuarioGrupo();

	if( $obj->buscarAppUsuarioGrupo(1, $ID) ){
		$obj->excluirAppUsuarioGrupo();
		System::AlertRedirect("Registro excluido com sucesso!", "app_usuario_grupo_list.php");
	}else{
		System::AlertRedirect("Registro não encontrado!", "app_usuario_grupo_list.php");
	}
?>