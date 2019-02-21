<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "acesso_rapido_bloco_add.php";
	$link_edit = "acesso_rapido_bloco_edit.php?id=$ID";
	$link_remove = "acesso_rapido_bloco_remove.php?id=$ID";
	$link_list = "acesso_rapido_bloco_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new AcessoRapidoBloco();

	if( $obj->buscarAcessoRapidoBloco(1, $ID) ){
		$frm_nome = $obj->getNome();
		$frm_prioridade = $obj->getPrioridade();
	}else{
		System::Redirect($link_list);
	}
?>