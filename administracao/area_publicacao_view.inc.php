<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "area_publicacao_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "area_publicacao_add.php?back=$link_back";
	$link_edit = "area_publicacao_edit.php?id=$ID&back=$link_back";
	$link_remove = "area_publicacao_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new AreaPublicacao();

	if( $obj->buscarAreaPublicacao(1, $ID) ){
		$ValueAreaPublicacaoBloco = AreaPublicacaoBlocoManage::buscarAreaPublicacaoBloco(1, $obj->getIdAreaPublicacaoBloco());
		$frm_id_area_publicacao_bloco = $ValueAreaPublicacaoBloco["titulo"];
		$frm_nome = $obj->getNome();
		$frm_quantidade = $obj->getQuantidade();
		$frm_img = $obj->getImg();
		$frm_img_width = $obj->getImgWidth();
		$frm_img_height = $obj->getImgHeight();
		$frm_prioridade = $obj->getPrioridade();
	}else{
		System::Redirect($link_list);
	}
?>