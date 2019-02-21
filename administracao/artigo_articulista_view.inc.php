<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "artigo_articulista_add.php";
	$link_edit = "artigo_articulista_edit.php?id=$ID";
	$link_remove = "artigo_articulista_remove.php?id=$ID";
	$link_list = "artigo_articulista_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new ArtigoArticulista();

	if( $obj->buscarArtigoArticulista(1, $ID) ){
		$frm_nome = $obj->getNome();
		$frm_perfil = System::_TextByHtml($obj->getPerfil());
		$frm_email = $obj->getEmail();
		$frm_telefone = $obj->getTelefone();
		$frm_foto = "<img src='../images/artigo_articulista/A".$obj->getFoto()."' />";
	}else{
		System::Redirect($link_list);
	}
?>