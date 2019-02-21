<?
	$IDA = intval(System::_REQUEST("ida"));
	$objAlbum = new GaleriaAlbum();
	if(!$objAlbum->buscarGaleriaAlbum(1, $IDA)){ System::Redirect("galeria_album_list.php"); }
	$album_label = $objAlbum->getNome();

	$ID = intval( System::_REQUEST("id") );
	$link_add = "galeria_foto_add.php?ida=$IDA";
	$link_edit = "galeria_foto_edit.php?id=$ID&ida=$IDA";
	$link_remove = "galeria_foto_remove.php?id=$ID&ida=$IDA";
	$link_list = "galeria_foto_list.php?ida=$IDA";
	
	$conteudoPadrao = false;
	$frm_credito = System::_POST("FrmCredito");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_bt = System::_POST("btSubmit");
	
	if ( ! Validacao::isVazio($frm_bt) ){
		$conteudoPadrao = true;
	}
?>