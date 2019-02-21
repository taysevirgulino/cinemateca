<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "agenda_add.php";
	$link_edit = "agenda_edit.php?id=$ID";
	$link_remove = "agenda_remove.php?id=$ID";
	$link_list = "agenda_list.php";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Agenda();

	if( $obj->buscarAgenda(1, $ID) ){
		$ValueAgendaCategoria = AgendaCategoriaManage::buscarAgendaCategoria(1, $obj->getIdAgendaCategoria());
		$frm_id_agenda_categoria = $ValueAgendaCategoria["nome"];
		$frm_titulo = $obj->getTitulo();
		$frm_descricao = System::_TextByHtml($obj->getDescricao());
		$frm_data = System::FormatarData($obj->getData(), "d/m/y");
		$frm_hora = $obj->getHora();
		$frm_local = $obj->getLocal();
		$frm_informacoes_contato = $obj->getInformacoesContato();
		$frm_imagem = $obj->getImagem();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>