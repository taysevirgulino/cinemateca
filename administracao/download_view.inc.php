<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "download_add.php";
	$link_edit = "download_edit.php?id=$ID";
	$link_remove = "download_remove.php?id=$ID";
	$link_list = "download_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Download();

	if( $obj->buscarDownload(1, $ID) ){
		$ValueDownloadCategoria = DownloadCategoriaManage::buscarDownloadCategoria(1, $obj->getIdDownloadCategoria());
		$frm_id_download_categoria = $ValueDownloadCategoria["nome"];
		$frm_nome = $obj->getNome();
		$frm_descricao = $obj->getDescricao();
		$frm_arquivo = $obj->getArquivo();
		$frm_imagem = $obj->getImagem();
		$frm_click = $obj->getClick();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>