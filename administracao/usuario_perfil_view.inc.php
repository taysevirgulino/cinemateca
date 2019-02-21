<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "usuario_perfil_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "usuario_perfil_add.php?back=$link_back";
	$link_edit = "usuario_perfil_edit.php?id=$ID&back=$link_back";
	$link_remove = "usuario_perfil_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new UsuarioPerfil();

	if( $obj->buscarUsuarioPerfil(1, $ID) ){
		$frm_titulo = $obj->getTitulo();
		$frm_nivel = $obj->getNivel();
	}else{
		System::Redirect($link_list);
	}
?>