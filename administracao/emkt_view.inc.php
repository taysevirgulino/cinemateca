<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "emkt_add.php";
	$link_edit = "emkt_edit.php?id=$ID";
	$link_remove = "emkt_remove.php?id=$ID";
	$link_list = "emkt_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Emkt();

	if( $obj->buscarEmkt(1, $ID) ){
		$frm_titulo = $obj->getTitulo();
		$frm_assunto = $obj->getAssunto();
		$frm_remetente_nome = $obj->getRemetenteNome();
		$frm_remetente_email = $obj->getRemetenteEmail();
		$frm_mensagem_html = System::_TextByHtml($obj->getMensagemHtml());
		$frm_mensagem_texto = $obj->getMensagemTexto();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
	}else{
		System::Redirect($link_list);
	}
?>