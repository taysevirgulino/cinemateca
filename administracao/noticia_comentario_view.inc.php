<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "noticia_comentario_add.php";
	$link_edit = "noticia_comentario_edit.php?id=$ID";
	$link_remove = "noticia_comentario_remove.php?id=$ID";
	$link_list = "noticia_comentario_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new NoticiaComentario();

	if( $obj->buscarNoticiaComentario(1, $ID) ){
		$ValueNoticia = NoticiaManage::buscarNoticia(1, $obj->getIdNoticia());
		$frm_id_noticia = $ValueNoticia["titulo"];
		$frm_nome = $obj->getNome();
		$frm_email = $obj->getEmail();
		$frm_texto = System::_TextByHtml($obj->getTexto());
		$frm_ip = $obj->getIp();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>