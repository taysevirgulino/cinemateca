<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID_ATUAL = System::_GET("idatual");
	$ID_ALTERAR = System::_GET("idalterar");
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "associado_perfil_list.php" : base64_decode(System::_GET("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "associado_perfil_add.php?back=$link_back";
	$link_edit = "associado_perfil_edit.php?back=$link_back";
	$link_remove = "associado_perfil_remove.php?back=$link_back";

	if( Validacao::isVazio($ID_ATUAL) ){ System::Redirect($link_list); }
	if( Validacao::isVazio($ID_ALTERAR) ){ System::Redirect($link_list); }

	if($ID_ATUAL == $ID_ALTERAR){ System::Redirect($link_list);}

	$obj_atual = new AssociadoPerfil();
	if(!$obj_atual->buscarAttribute(AssociadoPerfilAttribute::IdAssociadoPerfil(), $ID_ATUAL)){ System::Redirect($link_list); }

	$obj_alterar = new AssociadoPerfil();
	if(!$obj_alterar->buscarAttribute(AssociadoPerfilAttribute::IdAssociadoPerfil(), $ID_ALTERAR)){ System::Redirect($link_list); }

	$aux = $obj_atual->getPrioridade();
	$obj_atual->setPrioridade( $obj_alterar->getPrioridade() );
	$obj_alterar->setPrioridade( $aux );

	$obj_atual->alterarAtributo(AssociadoPerfilAttribute::Prioridade());
	$obj_alterar->alterarAtributo(AssociadoPerfilAttribute::Prioridade());

	System::Redirect($link_list);
?>