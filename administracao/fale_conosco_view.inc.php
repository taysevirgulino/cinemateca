<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "fale_conosco_add.php";
	$link_edit = "fale_conosco_edit.php?id=$ID";
	$link_remove = "fale_conosco_remove.php?id=$ID";
	$link_list = "fale_conosco_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new FaleConosco();

	if( $obj->buscarFaleConosco(1, $ID) ){
		$ValueFaleConoscoAssunto = FaleConoscoAssuntoManage::buscarFaleConoscoAssunto(1, $obj->getIdFaleConoscoAssunto());
		$frm_id_fale_conosco_assunto = $ValueFaleConoscoAssunto["assunto"];
		$frm_nome = $obj->getNome();
		$frm_email = $obj->getEmail();
		$frm_telefone = $obj->getTelefone();
		$frm_cidade = $obj->getCidade();
		$frm_estado = $obj->getEstado();
		$frm_mensagem = System::_TextByHtml($obj->getMensagem());
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>