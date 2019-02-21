<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "cronograma_farol_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "cronograma_farol_add.php?back=$link_back";
	$link_edit = "cronograma_farol_edit.php?id=$ID&back=$link_back";
	$link_remove = "cronograma_farol_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new CronogramaFarol();

	if( $obj->buscarCronogramaFarol(1, $ID) ){
		$frm_titulo = $obj->getTitulo();
		$frm_cor = $obj->getCor();
		$frm_peso = $obj->getPeso();
		$frm_prioridade = $obj->getPrioridade();
	}else{
		System::Redirect($link_list);
	}
?>