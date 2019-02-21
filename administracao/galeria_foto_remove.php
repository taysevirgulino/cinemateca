<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$IDA = intval(System::_REQUEST("ida"));
	$objAlbum = new GaleriaAlbum();
	if(!$objAlbum->buscarGaleriaAlbum(1, $IDA)){ System::Redirect("galeria_album_list.php"); }
	$album_label = $objAlbum->getNome();

	$ID = intval( System::_REQUEST("id") );
	$link_add = "galeria_foto_add.php?ida=$IDA";
	$link_edit = "galeria_foto_edit.php?id=$I&ida=$IDAD";
	$link_remove = "galeria_foto_remove.php?id=$ID&ida=$IDA";
	$link_list = "galeria_foto_list.php?ida=$IDA";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new GaleriaFoto();

	if( $obj->buscarGaleriaFoto(1, $ID) ){
		$obj->excluirGaleriaFoto();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>