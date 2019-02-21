<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "painel_menu_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "painel_menu_add.php?back=$link_back";
	$link_edit = "painel_menu_edit.php?id=$ID&back=$link_back";
	$link_remove = "painel_menu_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new PainelMenu();

	if( $obj->buscarPainelMenu(1, $ID) ){
		$ValuePainelMenu = PainelMenuManage::buscarPainelMenu(1, $obj->getIdPainelMenuPai());
		$frm_id_painel_menu_pai = $ValuePainelMenu["nome"];
		$frm_nome = $obj->getNome();
		$frm_url = $obj->getUrl();
		$frm_style = $obj->getStyle();
		$frm_target = (($obj->getTarget()=='_blank') ? "Nova Página" : "Mesma Página");
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>