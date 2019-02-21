<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "bloco_menu_add.php";
	$link_edit = "bloco_menu_edit.php?id=$ID";
	$link_remove = "bloco_menu_remove.php?id=$ID";
	$link_list = "bloco_menu_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new BlocoMenu();

	if( $obj->buscarBlocoMenu(1, $ID) ){
		$frm_id_bloco_menu_pai = BlocoMenuManage::HerancaByString($obj->getIdBlocoMenuPai());
		$frm_nome = $obj->getNome();
		$frm_url = $obj->getUrl();
		$frm_target = (($obj->getTarget()=='_blank') ? "Nova Página" : "Mesma Página");
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>