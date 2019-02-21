<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "galeria_foto_add.php";
	$link_edit = "galeria_foto_edit.php?id=$ID";
	$link_remove = "galeria_foto_remove.php?id=$ID";
	$link_list = "galeria_foto_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new GaleriaFoto();

	if( $obj->buscarGaleriaFoto(1, $ID) ){
		$ValueGaleriaAlbum = GaleriaAlbumManage::buscarGaleriaAlbum(1, $obj->getIdGaleriaAlbum());
		$frm_id_galeria_album = $ValueGaleriaAlbum["nome"];
		$frm_credito = $obj->getCredito();
		$frm_descricao = $obj->getDescricao();
		$frm_foto = $obj->getFoto();
	}else{
		System::Redirect($link_list);
	}
?>