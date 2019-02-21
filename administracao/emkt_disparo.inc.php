<?
	$link_list = "emkt_list.php";

	$ID = intval( System::_REQUEST("id") );
	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Emkt();
	if(!$obj->buscarEmkt(1, $ID)){ System::Redirect($link_list); }

	$frm_emkt = $obj->getTitulo();
	
	$objDisparo = EmktDisparoManage::buscarEmktDisparoAttribute(EmktDisparoAttribute::IdEmkt(), $obj->getIdEmkt());	
?>