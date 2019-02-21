<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "emkt_contato_lista_add.php";
	$link_edit = "emkt_contato_lista_edit.php?id=$ID";
	$link_remove = "emkt_contato_lista_remove.php?id=$ID";
	$link_list = "emkt_contato_lista_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new EmktContatoLista();

	if( $obj->buscarEmktContatoLista(1, $ID) ){
		$ValueEmktContato = EmktContatoManage::buscarEmktContato(1, $obj->getIdEmktContato());
		$frm_id_emkt_contato = $ValueEmktContato["nome"];
		$ValueEmktLista = EmktListaManage::buscarEmktLista(1, $obj->getIdEmktLista());
		$frm_id_emkt_lista = $ValueEmktLista["3"];
	}else{
		System::Redirect($link_list);
	}
?>