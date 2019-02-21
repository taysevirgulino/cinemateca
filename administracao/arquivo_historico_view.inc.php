<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "arquivo_historico_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "arquivo_historico_add.php?back=$link_back";
	$link_edit = "arquivo_historico_edit.php?id=$ID&back=$link_back";
	$link_remove = "arquivo_historico_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new ArquivoHistorico();

	if( $obj->buscarArquivoHistorico(1, $ID) ){
		$ValueArquivo = ArquivoManage::buscarArquivo(1, $obj->getIdArquivo());
		$frm_id_arquivo = $ValueArquivo["titulo"];
		$ValueArquivo = ArquivoManage::buscarArquivo(1, $obj->getIdArquivo());
		$frm_id_arquivo_tipo = $ValueArquivo["titulo"];
		$ValueUsuario = UsuarioManage::buscarUsuario(1, $obj->getIdUsuario());
		$frm_id_usuario = $ValueUsuario["nome"];
		$ValueUsuario = UsuarioManage::buscarUsuario(1, $obj->getIdUsuario());
		$frm_id_usuario_responsavel = $ValueUsuario["nome"];
		$frm_texto = System::_TextByHtml($obj->getTexto());
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>