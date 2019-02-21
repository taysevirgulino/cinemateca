<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "arquivo_download_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "arquivo_download_add.php?back=$link_back";
	$link_edit = "arquivo_download_edit.php?id=$ID&back=$link_back";
	$link_remove = "arquivo_download_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new ArquivoDownload();

	if( $obj->buscarArquivoDownload(1, $ID) ){
		$ValueArquivoAnexo = ArquivoAnexoManage::buscarArquivoAnexo(1, $obj->getIdArquivoAnexo());
		$frm_id_arquivo_anexo = $ValueArquivoAnexo["arquivo"];
		$ValueUsuario = UsuarioManage::buscarUsuario(1, $obj->getIdUsuario());
		$frm_id_usuario = $ValueUsuario["nome"];
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_ip = $obj->getIp();
	}else{
		System::Redirect($link_list);
	}
?>