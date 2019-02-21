<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "documento_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "documento_add.php?back=$link_back";
	$link_edit = "documento_edit.php?id=$ID&back=$link_back";
	$link_remove = "documento_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Documento();

	if( $obj->buscarDocumento(1, $ID) ){
		$ValueEmpreendimento = EmpreendimentoManage::buscarEmpreendimento(1, $obj->getIdEmpreendimento());
		$frm_id_empreendimento = $ValueEmpreendimento["titulo"];
		$ValueUsuario = UsuarioManage::buscarUsuario(1, $obj->getIdUsuario());
		$frm_id_usuario = $ValueUsuario["nome"];
		$frm_titulo = $obj->getTitulo();
		$frm_arquivo = $obj->getArquivo();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>