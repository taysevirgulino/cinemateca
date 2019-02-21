<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "fale_conosco_assunto_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "fale_conosco_assunto_add.php?back=$link_back";
	$link_edit = "fale_conosco_assunto_edit.php?id=$ID&back=$link_back";
	$link_remove = "fale_conosco_assunto_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new FaleConoscoAssunto();

	if( $obj->buscarFaleConoscoAssunto(1, $ID) ){
		$obj->excluirFaleConoscoAssunto();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>