<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "pagina_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "pagina_add.php?back=$link_back";
	$link_edit = "pagina_edit.php?id=$ID&back=$link_back";
	$link_remove = "pagina_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Pagina();

	if( $obj->buscarPagina(1, $ID) ){
		$obj->excluirPagina();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro n�o encontrado!", $link_list);
	}
?>