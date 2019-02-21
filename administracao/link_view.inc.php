<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "link_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "link_add.php?back=$link_back";
	$link_edit = "link_edit.php?id=$ID&back=$link_back";
	$link_remove = "link_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Link();

	if( $obj->buscarLink(1, $ID) ){
		$frm_nome = $obj->getNome();
		$frm_descricao = $obj->getDescricao();
		$frm_url = $obj->getUrl();
		$frm_target = (($obj->getTarget()=='_blank') ? "Nova Página" : "Mesma Página");
		$frm_prioridade = $obj->getPrioridade();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>