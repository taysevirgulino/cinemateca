<?
	$ID = intval( $_REQUEST["id"] );

	if( Validacao::isVazio($ID) ){ System::Redirect("app_usuario_list.php"); }

	$obj = new AppUsuario();

	if( $obj->buscarAppUsuario(1, $ID) ){
		$ValueAppUsuarioGrupo = AppUsuarioGrupoManage::buscarAppUsuarioGrupo(1, $obj->getIdAppUsuarioGrupo());
		$frm_id_app_usuario_grupo = $ValueAppUsuarioGrupo["nome"];
		$frm_nome = $obj->getNome();
		$frm_email = $obj->getEmail();
		$frm_login = $obj->getLogin();
		$frm_senha = $obj->getSenha();
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect("app_usuario_list.php");
	}
?>