<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "jornal_estrutura_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "jornal_estrutura_add.php?back=$link_back";
	$link_edit = "jornal_estrutura_edit.php?id=$ID&back=$link_back";
	$link_remove = "jornal_estrutura_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new JornalEstrutura();

	if( $obj->buscarJornalEstrutura(1, $ID) ){
		$frm_nome = $obj->getNome();
		$frm_prioridade = $obj->getPrioridade();
	}else{
		System::Redirect($link_list);
	}
?>