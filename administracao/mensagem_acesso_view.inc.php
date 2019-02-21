<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "mensagem_acesso_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "mensagem_acesso_add.php?back=$link_back";
	$link_edit = "mensagem_acesso_edit.php?id=$ID&back=$link_back";
	$link_remove = "mensagem_acesso_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new MensagemAcesso();

	if( $obj->buscarMensagemAcesso(1, $ID) ){
		$ValueMensagem = MensagemManage::buscarMensagem(1, $obj->getIdMensagem());
		$frm_id_mensagem = $ValueMensagem["titulo"];
		$ValueUsuario = UsuarioManage::buscarUsuario(1, $obj->getIdUsuario());
		$frm_id_usuario = $ValueUsuario["nome"];
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/y [Hhi]");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>