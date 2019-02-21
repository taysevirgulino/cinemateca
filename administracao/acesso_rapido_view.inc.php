<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "acesso_rapido_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "acesso_rapido_add.php?back=$link_back";
	$link_edit = "acesso_rapido_edit.php?id=$ID&back=$link_back";
	$link_remove = "acesso_rapido_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new AcessoRapido();

	if( $obj->buscarAcessoRapido(1, $ID) ){
		$frm_id_acesso_rapido_pai = AcessoRapidoManage2::HerancaByString($obj->getIdAcessoRapidoPai());
		$frm_id_acesso_rapido_pai = ((!empty($frm_id_acesso_rapido_pai)) ? $frm_id_acesso_rapido_pai : "[sem menu]" );
		$ValueAcessoRapidoBloco = AcessoRapidoBlocoManage::buscarAcessoRapidoBloco(1, $obj->getIdAcessoRapidoBloco());
		$frm_id_acesso_rapido_bloco = $ValueAcessoRapidoBloco["nome"];
		$frm_nome = $obj->getNome();
		$frm_url = $obj->getUrl();
		$frm_target = (($obj->getTarget()=='_blank') ? "Nova Página" : "Mesma Página");
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>