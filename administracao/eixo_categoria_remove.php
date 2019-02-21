<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "eixo_categoria_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "eixo_categoria_add.php?back=$link_back";
	$link_edit = "eixo_categoria_edit.php?id=$ID&back=$link_back";
	$link_remove = "eixo_categoria_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new EixoCategoria();

	if( $obj->buscarEixoCategoria(1, $ID) ){
		$obj->excluirEixoCategoria();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>