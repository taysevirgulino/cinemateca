<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "mensagem_resposta_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "mensagem_resposta_add.php?back=$link_back";
	$link_edit = "mensagem_resposta_edit.php?id=$ID&back=$link_back";
	$link_remove = "mensagem_resposta_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new MensagemResposta();

	if( $obj->buscarMensagemResposta(1, $ID) ){
		$ValueMensagem = MensagemManage::buscarMensagem(1, $obj->getIdMensagem());
		$frm_id_mensagem = $ValueMensagem["titulo"];
		$ValueUsuario = UsuarioManage::buscarUsuario(1, $obj->getIdUsuario());
		$frm_id_usuario = $ValueUsuario["nome"];
		$frm_texto = System::_TextByHtml($obj->getTexto());
		$frm_arquivo = $obj->getArquivo();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_ip = $obj->getIp();
	}else{
		System::Redirect($link_list);
	}
?>