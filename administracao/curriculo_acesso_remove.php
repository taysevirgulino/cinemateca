<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "curriculo_acesso_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "curriculo_acesso_add.php?back=$link_back";
	$link_edit = "curriculo_acesso_edit.php?id=$ID&back=$link_back";
	$link_remove = "curriculo_acesso_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new CurriculoAcesso();

	if( $obj->buscarCurriculoAcesso(1, $ID) ){
		$obj->excluirCurriculoAcesso();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>