<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "mensagem_resposta_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "mensagem_resposta_add.php?back=$link_back";
	$link_edit = "mensagem_resposta_edit.php?id=$ID&back=$link_back";
	$link_remove = "mensagem_resposta_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new MensagemResposta();

	if( $obj->buscarMensagemResposta(1, $ID) ){
		$obj->excluirMensagemResposta();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>