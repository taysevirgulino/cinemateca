<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "cronograma_etapa_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "cronograma_etapa_add.php?back=$link_back";
	$link_edit = "cronograma_etapa_edit.php?id=$ID&back=$link_back";
	$link_remove = "cronograma_etapa_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new CronogramaEtapa();

	if( $obj->buscarCronogramaEtapa(1, $ID) ){
		$ValueCronogramaTipo = CronogramaTipoManage::buscarCronogramaTipo(1, $obj->getIdCronogramaTipo());
		$frm_id_cronograma_tipo = $ValueCronogramaTipo["titulo"];
		$frm_titulo = $obj->getTitulo();
		$frm_descricao = $obj->getDescricao();
		$frm_porcentagem = $obj->getPorcentagem();
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>