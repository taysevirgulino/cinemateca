<?
	$ID = intval( $_REQUEST["id"] );

	if( Validacao::isVazio($ID) ){ System::Redirect("app_usuario_grupo_list.php"); }

	$obj = new AppUsuarioGrupo();

	if( $obj->buscarAppUsuarioGrupo(1, $ID) ){
		$frm_nome = $obj->getNome();
		$frm_sigla = $obj->getSigla();
		$frm_tipo = (($obj->getTipo() == 1) ? "Usuário de Sistema" : "Usuário da Administração" );
	}else{
		System::Redirect("app_usuario_grupo_list.php");
	}
?>