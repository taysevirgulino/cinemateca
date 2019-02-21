<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "associado_plano_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "associado_plano_add.php?back=$link_back";
	$link_edit = "associado_plano_edit.php?id=$ID&back=$link_back";
	$link_remove = "associado_plano_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new AssociadoPlano();

	if( $obj->buscarAssociadoPlano(1, $ID) ){
		$obj->excluirAssociadoPlano();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>