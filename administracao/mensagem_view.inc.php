<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "mensagem_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "mensagem_add.php?back=$link_back";
	$link_edit = "mensagem_edit.php?id=$ID&back=$link_back";
	$link_remove = "mensagem_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Mensagem();

	if( $obj->buscarMensagem(1, $ID) ){
		$ValueEmpreendimento = EmpreendimentoManage::buscarEmpreendimento(1, $obj->getIdEmpreendimento());
		$frm_id_empreendimento = $ValueEmpreendimento["titulo"];
		$ValueLojista = LojistaManage::buscarLojista(1, $obj->getIdLojista());
		$frm_id_lojista = $ValueLojista["nome"];
		$ValueUsuario = UsuarioManage::buscarUsuario(1, $obj->getIdUsuario());
		$frm_id_usuario_remetente = $ValueUsuario["nome"];
		$ValueUsuario = UsuarioManage::buscarUsuario(1, $obj->getIdUsuario());
		$frm_id_usuario_destinatario = $ValueUsuario["nome"];
		$frm_titulo = $obj->getTitulo();
		$frm_texto = System::_TextByHtml($obj->getTexto());
		$frm_arquivo = $obj->getArquivo();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_datahora_edicao = System::FormatarData($obj->getDatahoraEdicao(), "d/m/y [Hhi]");
		$frm_ip = $obj->getIp();
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>