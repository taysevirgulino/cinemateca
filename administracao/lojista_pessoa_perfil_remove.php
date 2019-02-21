<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "lojista_pessoa_perfil_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "lojista_pessoa_perfil_add.php?back=$link_back";
	$link_edit = "lojista_pessoa_perfil_edit.php?id=$ID&back=$link_back";
	$link_remove = "lojista_pessoa_perfil_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new LojistaPessoaPerfil();

	if( $obj->buscarLojistaPessoaPerfil(1, $ID) ){
		$obj->excluirLojistaPessoaPerfil();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>