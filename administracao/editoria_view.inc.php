<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "editoria_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "editoria_add.php?back=$link_back";
	$link_edit = "editoria_edit.php?id=$ID&back=$link_back";
	$link_remove = "editoria_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Editoria();

	if( $obj->buscarEditoria(1, $ID) ){
		$frm_id_editoria_pai = EditoriaManage2::HerancaByString($obj->getIdEditoriaPai());
		$frm_id_editoria_pai = ((!empty($frm_id_editoria_pai)) ? $frm_id_editoria_pai : "[sem editoria]" );
		$frm_nome = $obj->getNome();
		$frm_legenda = $obj->getLegenda();
		$frm_descricao = $obj->getDescricao();
		$frm_imagem = $obj->getImagem();
		$frm_imagem_pagina = $obj->getImagemPagina();
		$frm_blog = (($obj->getBlog()==1) ? "Sim" : "Não");
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>