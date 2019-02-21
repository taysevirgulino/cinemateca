<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_add = "artigo_articulista_add.php";
	$link_edit = "artigo_articulista_edit.php?id=$ID";
	$link_remove = "artigo_articulista_remove.php?id=$ID";
	$link_list = "artigo_articulista_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new ArtigoArticulista();

	if( $obj->buscarArtigoArticulista(1, $ID) ){
		$obj->excluirArtigoArticulista();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>