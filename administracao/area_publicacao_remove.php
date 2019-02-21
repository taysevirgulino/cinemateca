<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "area_publicacao_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "area_publicacao_add.php?back=$link_back";
	$link_edit = "area_publicacao_edit.php?id=$ID&back=$link_back";
	$link_remove = "area_publicacao_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new AreaPublicacao();

	if( $obj->buscarAreaPublicacao(1, $ID) ){
		$obj->excluirAreaPublicacao();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>