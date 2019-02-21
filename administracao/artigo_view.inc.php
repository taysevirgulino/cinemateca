<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "artigo_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "artigo_add.php?back=$link_back";
	$link_edit = "artigo_edit.php?id=$ID&back=$link_back";
	$link_remove = "artigo_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Artigo();

	if( $obj->buscarArtigo(1, $ID) ){
		$ValueArtigoArticulista = ArtigoArticulistaManage::buscarArtigoArticulista(1, $obj->getIdArtigoArticulista());
		$frm_id_artigo_articulista = $ValueArtigoArticulista["nome"];
		$frm_titulo = $obj->getTitulo();
		$frm_resumo = System::_TextByHtml($obj->getResumo());
		$frm_texto = System::_TextByHtml($obj->getTexto());
		$frm_arquivo_anexo = $obj->getArquivoAnexo();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>