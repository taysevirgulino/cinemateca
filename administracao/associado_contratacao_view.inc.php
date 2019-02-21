<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "associado_contratacao_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "associado_contratacao_add.php?back=$link_back";
	$link_edit = "associado_contratacao_edit.php?id=$ID&back=$link_back";
	$link_remove = "associado_contratacao_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new AssociadoContratacao();

	if( $obj->buscarAssociadoContratacao(1, $ID) ){
		$ValueAssociado = AssociadoManage::buscarAssociado(1, $obj->getIdAssociado());
		$frm_id_associado = $ValueAssociado["apelido"];
		$ValueAssociadoPlano = AssociadoPlanoManage::buscarAssociadoPlano(1, $obj->getIdAssociadoPlano());
		$frm_id_associado_plano = $ValueAssociadoPlano["titulo"];
		$frm_valor_bruto = $obj->getValorBruto();
		$frm_valor_desconto = $obj->getValorDesconto();
		$frm_valor_final = $obj->getValorFinal();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_pagamento_retorno = System::_TextByHtml($obj->getPagamentoRetorno());
		$frm_pagamento_datahora = System::FormatarData($obj->getPagamentoDatahora(), "d/m/y [Hhi]");
		$frm_pagamento_valor = $obj->getPagamentoValor();
		$frm_plano_data_inicial = System::FormatarData($obj->getPlanoDataInicial(), "d/m/y");
		$frm_plano_data_final = System::FormatarData($obj->getPlanoDataFinal(), "d/m/y");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>