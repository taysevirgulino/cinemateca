<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "segmento_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "segmento_add.php?back=$link_back";
	$link_edit = "segmento_edit.php?id=$ID&back=$link_back";
	$link_remove = "segmento_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Segmento();

	if( $obj->buscarSegmento(1, $ID) ){
		$frm_titulo = $obj->getTitulo();
		$frm_cor = $obj->getCor();
		$frm_prioridade = $obj->getPrioridade();
	}else{
		System::Redirect($link_list);
	}
?>