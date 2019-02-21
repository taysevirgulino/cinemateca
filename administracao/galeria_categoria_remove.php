<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "galeria_categoria_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "galeria_categoria_add.php?back=$link_back";
	$link_edit = "galeria_categoria_edit.php?id=$ID&back=$link_back";
	$link_remove = "galeria_categoria_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new GaleriaCategoria();

	if( $obj->buscarGaleriaCategoria(1, $ID) ){
		$obj->excluirGaleriaCategoria();
		GaleriaCategoriaManage2::Reordenar();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>