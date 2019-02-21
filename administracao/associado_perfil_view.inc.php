<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "associado_perfil_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "associado_perfil_add.php?back=$link_back";
	$link_edit = "associado_perfil_edit.php?id=$ID&back=$link_back";
	$link_remove = "associado_perfil_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new AssociadoPerfil();

	if( $obj->buscarAssociadoPerfil(1, $ID) ){
		$frm_titulo = $obj->getTitulo();
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>