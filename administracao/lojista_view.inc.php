<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "lojista_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "lojista_add.php?back=$link_back";
	$link_edit = "lojista_edit.php?id=$ID&back=$link_back";
	$link_remove = "lojista_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Lojista();

	if( $obj->buscarLojista(1, $ID) ){
		$ValueLoja = LojaManage::buscarLoja(1, $obj->getIdLoja());
		$frm_id_loja = $ValueLoja["numero"];
		$ValueUsuario = UsuarioManage::buscarUsuario(1, $obj->getIdUsuario());
		$frm_id_usuario_responsavel = $ValueUsuario["nome"];
		$frm_nome = $obj->getNome();
		$frm_email = $obj->getEmail();
		$frm_responsavel = $obj->getResponsavel();
		$frm_fraquia = $obj->getFraquia();
		$frm_imagem = $obj->getImagem();
		$frm_observacoes = System::_TextByHtml($obj->getObservacoes());
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>