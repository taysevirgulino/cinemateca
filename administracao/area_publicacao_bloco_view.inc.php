<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "area_publicacao_bloco_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "area_publicacao_bloco_add.php?back=$link_back";
	$link_edit = "area_publicacao_bloco_edit.php?id=$ID&back=$link_back";
	$link_remove = "area_publicacao_bloco_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new AreaPublicacaoBloco();

	if( $obj->buscarAreaPublicacaoBloco(1, $ID) ){
		$frm_titulo = $obj->getTitulo();
		$frm_legenda = $obj->getLegenda();
		$frm_url = $obj->getUrl();
		$frm_style = $obj->getStyle();
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>