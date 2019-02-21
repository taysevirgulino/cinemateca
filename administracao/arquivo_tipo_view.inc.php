<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "arquivo_tipo_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "arquivo_tipo_add.php?back=$link_back";
	$link_edit = "arquivo_tipo_edit.php?id=$ID&back=$link_back";
	$link_remove = "arquivo_tipo_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new ArquivoTipo();

	if( $obj->buscarArquivoTipo(1, $ID) ){
		$frm_titulo = $obj->getTitulo();
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>