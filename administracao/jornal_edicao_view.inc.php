<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "jornal_edicao_add.php";
	$link_edit = "jornal_edicao_edit.php?id=$ID";
	$link_remove = "jornal_edicao_remove.php?id=$ID";
	$link_list = "jornal_edicao_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new JornalEdicao();

	if( $obj->buscarJornalEdicao(1, $ID) ){
		$frm_numero = $obj->getNumero();
		$frm_ano = $obj->getAno();
		$frm_data_inicial = System::FormatarData($obj->getDataInicial(), "d/m/y");
		$frm_data_final = System::FormatarData($obj->getDataFinal(), "d/m/y");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
		
		$VObjJornalEstrutura = JornalEstruturaManage::consultarJornalEstruturaAttribute("", "", "", JornalEstruturaAttribute::Prioridade(), SearchOrder::Crescente());
	}else{
		System::Redirect($link_list);
	}
?>