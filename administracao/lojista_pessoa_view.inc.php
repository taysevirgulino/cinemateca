<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "lojista_pessoa_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "lojista_pessoa_add.php?back=$link_back";
	$link_edit = "lojista_pessoa_edit.php?id=$ID&back=$link_back";
	$link_remove = "lojista_pessoa_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new LojistaPessoa();

	if( $obj->buscarLojistaPessoa(1, $ID) ){
		$ValueLojista = LojistaManage::buscarLojista(1, $obj->getIdLojista());
		$frm_id_lojista = $ValueLojista["nome"];
		$ValueLojistaPessoaPerfil = LojistaPessoaPerfilManage::buscarLojistaPessoaPerfil(1, $obj->getIdLojistaPessoaPerfil());
		$frm_id_lojista_pessoa_perfil = $ValueLojistaPessoaPerfil["titulo"];
		$ValueUsuario = UsuarioManage::buscarUsuario(1, $obj->getIdUsuario());
		$frm_id_usuario = $ValueUsuario["nome"];
		$frm_nome = $obj->getNome();
		$frm_email = $obj->getEmail();
		$frm_email2 = $obj->getEmail2();
		$frm_telefone = $obj->getTelefone();
		$frm_telefone2 = $obj->getTelefone2();
		$frm_endereco = $obj->getEndereco();
		$frm_cidade = $obj->getCidade();
		$frm_estado = $obj->getEstado();
		$frm_cep = $obj->getCep();
		$frm_observacoes = System::_TextByHtml($obj->getObservacoes());
		$frm_receber_email = $obj->getReceberEmail();
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>