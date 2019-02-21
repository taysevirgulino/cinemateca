<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "emkt_destinatario_add.php";
	$link_edit = "emkt_destinatario_edit.php?id=$ID";
	$link_remove = "emkt_destinatario_remove.php?id=$ID";
	$link_list = "emkt_destinatario_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new EmktDestinatario();

	if( $obj->buscarEmktDestinatario(1, $ID) ){
		$ValueEmktDisparo = EmktDisparoManage::buscarEmktDisparo(1, $obj->getIdEmktDisparo());
		$frm_id_emkt_disparo = $ValueEmktDisparo["agendamento"];
		$ValueEmktLista = EmktListaManage::buscarEmktLista(1, $obj->getIdEmktLista());
		$frm_id_emkt_lista = $ValueEmktLista["3"];
	}else{
		System::Redirect($link_list);
	}
?>