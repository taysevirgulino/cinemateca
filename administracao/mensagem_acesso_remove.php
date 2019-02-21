<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "mensagem_acesso_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "mensagem_acesso_add.php?back=$link_back";
	$link_edit = "mensagem_acesso_edit.php?id=$ID&back=$link_back";
	$link_remove = "mensagem_acesso_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new MensagemAcesso();

	if( $obj->buscarMensagemAcesso(1, $ID) ){
		$obj->excluirMensagemAcesso();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>