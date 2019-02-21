<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "arquivo_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "arquivo_add.php?back=$link_back";
	$link_edit = "arquivo_edit.php?id=$ID&back=$link_back";
	$link_remove = "arquivo_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Arquivo();

	if( $obj->buscarArquivo(1, $ID) ){
		$ValueLojista = LojistaManage::buscarLojista(1, $obj->getIdLojista());
		$frm_id_lojista = $ValueLojista["nome"];
		$ValueArquivoDisciplina = ArquivoDisciplinaManage::buscarArquivoDisciplina(1, $obj->getIdArquivoDisciplina());
		$frm_id_arquivo_disciplina = $ValueArquivoDisciplina["titulo"];
		$ValueArquivo = ArquivoManage::buscarArquivo(1, $obj->getIdArquivo());
		$frm_id_arquivo_tipo = $ValueArquivo["titulo"];
		$ValueUsuario = UsuarioManage::buscarUsuario(1, $obj->getIdUsuario());
		$frm_id_usuario = $ValueUsuario["nome"];
		$ValueUsuario = UsuarioManage::buscarUsuario(1, $obj->getIdUsuario());
		$frm_id_usuario_responsavel = $ValueUsuario["nome"];
		$frm_titulo = $obj->getTitulo();
		$frm_texto = System::_TextByHtml($obj->getTexto());
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_datahora_edicao = System::FormatarData($obj->getDatahoraEdicao(), "d/m/y [Hhi]");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>