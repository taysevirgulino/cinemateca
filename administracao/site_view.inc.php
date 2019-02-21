<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "site_add.php";
	$link_edit = "site_edit.php?id=$ID";
	$link_remove = "site_remove.php?id=$ID";
	$link_list = "site_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Site();

	if( $obj->buscarSite(1, $ID) ){
		$frm_titulo = $obj->getTitulo();
		$frm_email = $obj->getEmail();
		$frm_email_nome = $obj->getEmailNome();
		$frm_url = $obj->getUrl();
		$frm_host = $obj->getHost();
		$frm_template = $obj->getTemplate();
		$frm_imagem_topo = $obj->getImagemTopo();
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>