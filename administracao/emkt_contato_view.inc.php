<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "emkt_contato_add.php";
	$link_edit = "emkt_contato_edit.php?id=$ID";
	$link_remove = "emkt_contato_remove.php?id=$ID";
	$link_list = "emkt_contato_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new EmktContato();

	if( $obj->buscarEmktContato(1, $ID) ){
		$frm_nome = $obj->getNome();
		$frm_email = $obj->getEmail();
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
		
		$Listas = EmktListaManage::ListasByContato($obj->getIdEmktContato());
	}else{
		System::Redirect($link_list);
	}
?>