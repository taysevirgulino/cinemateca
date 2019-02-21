<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "curriculo_area_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "curriculo_area_add.php?back=$link_back";
	$link_edit = "curriculo_area_edit.php?id=$ID&back=$link_back";
	$link_remove = "curriculo_area_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new CurriculoArea();

	if( $obj->buscarCurriculoArea(1, $ID) ){
		$frm_titulo = $obj->getTitulo();
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>