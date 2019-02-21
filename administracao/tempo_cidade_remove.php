<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "tempo_cidade_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "tempo_cidade_add.php?back=$link_back";
	$link_edit = "tempo_cidade_edit.php?id=$ID&back=$link_back";
	$link_remove = "tempo_cidade_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new TempoCidade();

	if( $obj->buscarTempoCidade(1, $ID) ){
		$obj->excluirTempoCidade();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>