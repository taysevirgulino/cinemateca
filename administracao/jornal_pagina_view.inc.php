<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "jornal_pagina_add.php";
	$link_edit = "jornal_pagina_edit.php?id=$ID";
	$link_remove = "jornal_pagina_remove.php?id=$ID";
	$link_list = "jornal_pagina_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new JornalPagina();

	if( $obj->buscarJornalPagina(1, $ID) ){
		$ValueJornalEdicao = JornalEdicaoManage::buscarJornalEdicao(1, $obj->getIdJornalEdicao());
		$frm_id_jornal_edicao = $ValueJornalEdicao["numero"];
		$ValueJornalEstrutura = JornalEstruturaManage::buscarJornalEstrutura(1, $obj->getIdJornalEstrutura());
		$frm_id_jornal_estrutura = $ValueJornalEstrutura["nome"];
		$frm_imagem = $obj->getImagem();
	}else{
		System::Redirect($link_list);
	}
?>