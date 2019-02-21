<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "documento_download_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "documento_download_add.php?back=$link_back";
	$link_edit = "documento_download_edit.php?id=$ID&back=$link_back";
	$link_remove = "documento_download_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new DocumentoDownload();

	if( $obj->buscarDocumentoDownload(1, $ID) ){
		$ValueDocumento = DocumentoManage::buscarDocumento(1, $obj->getIdDocumento());
		$frm_id_documento = $ValueDocumento["titulo"];
		$ValueUsuario = UsuarioManage::buscarUsuario(1, $obj->getIdUsuario());
		$frm_id_usuario = $ValueUsuario["nome"];
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_ip = $obj->getIp();
	}else{
		System::Redirect($link_list);
	}
?>