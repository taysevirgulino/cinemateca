<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "emkt_disparo_add.php";
	$link_edit = "emkt_disparo_edit.php?id=$ID";
	$link_remove = "emkt_disparo_remove.php?id=$ID";
	$link_list = "emkt_disparo_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new EmktDisparo();

	if( $obj->buscarEmktDisparo(1, $ID) ){
		$ValueEmkt = EmktManage::buscarEmkt(1, $obj->getIdEmkt());
		$frm_id_emkt = $ValueEmkt["titulo"];
		$frm_agendamento = System::FormatarData($obj->getAgendamento(), "d/m/y [Hhi]");
		$frm_resultado = System::_TextByHtml($obj->getResultado());
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>