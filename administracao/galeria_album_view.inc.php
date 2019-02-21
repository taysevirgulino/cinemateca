<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "galeria_album_add.php";
	$link_edit = "galeria_album_edit.php?id=$ID";
	$link_remove = "galeria_album_remove.php?id=$ID";
	$link_list = "galeria_album_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new GaleriaAlbum();

	if( $obj->buscarGaleriaAlbum(1, $ID) ){
		$ValueGaleriaCategoria = GaleriaCategoriaManage::buscarGaleriaCategoria(1, $obj->getIdGaleriaCategoria());
		$frm_id_galeria_categoria = $ValueGaleriaCategoria["nome"];
		$frm_nome = $obj->getNome();
		$frm_descricao = System::_TextByHtml($obj->getDescricao());
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>