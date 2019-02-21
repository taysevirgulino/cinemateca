<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "usuario_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "usuario_add.php?back=$link_back";
	$link_edit = "usuario_edit.php?id=$ID&back=$link_back";
	$link_remove = "usuario_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Usuario();

	if( $obj->buscarUsuario(1, $ID) ){
		$ValueUsuarioPerfil = UsuarioPerfilManage::buscarUsuarioPerfil(1, $obj->getIdUsuarioPerfil());
		$frm_id_usuario_perfil = $ValueUsuarioPerfil["titulo"];
		$frm_nome = $obj->getNome();
		$frm_email = $obj->getEmail();
		$frm_imagem = $obj->getImagem();
		$frm_login = $obj->getLogin();
		$frm_senha = ""; //$obj->getSenha();
		$frm_datahora_cadastro = System::FormatarData($obj->getDatahoraCadastro(), "d/m/y [Hhi]");
		$frm_datahora_edicao = System::FormatarData($obj->getDatahoraEdicao(), "d/m/y [Hhi]");
		$frm_datahora_login = System::FormatarData($obj->getDatahoraLogin(), "d/m/y [Hhi]");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>