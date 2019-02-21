<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "lojista_cronograma_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "lojista_cronograma_add.php?back=$link_back";
	$link_edit = "lojista_cronograma_edit.php?id=$ID&back=$link_back";
	$link_remove = "lojista_cronograma_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new LojistaCronograma();

	if( $obj->buscarLojistaCronograma(1, $ID) ){
		$ValueLojista = LojistaManage::buscarLojista(1, $obj->getIdLojista());
		$frm_id_lojista = $ValueLojista["nome"];
		$ValueCronogramaFarol = CronogramaFarolManage::buscarCronogramaFarol(1, $obj->getIdCronogramaFarol());
		$frm_id_cronograma_farol = $ValueCronogramaFarol["titulo"];
		$frm_porcentagem_indefinido = $obj->getPorcentagemIndefinido();
		$frm_porcentagem_aberto = $obj->getPorcentagemAberto();
		$frm_porcentagem_vencido = $obj->getPorcentagemVencido();
		$frm_porcentagem_concluido = $obj->getPorcentagemConcluido();
		$frm_previsao_inicio = System::FormatarData($obj->getPrevisaoInicio(), "d/m/y");
		$frm_previsao_fim = System::FormatarData($obj->getPrevisaoFim(), "d/m/y");
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
	}else{
		System::Redirect($link_list);
	}
?>