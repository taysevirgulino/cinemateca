<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID_ATUAL = System::_GET("idatual");
	$ID_ALTERAR = System::_GET("idalterar");
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "arquivo_tipo_list.php" : base64_decode(System::_GET("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "arquivo_tipo_add.php?back=$link_back";
	$link_edit = "arquivo_tipo_edit.php?back=$link_back";
	$link_remove = "arquivo_tipo_remove.php?back=$link_back";

	if( Validacao::isVazio($ID_ATUAL) ){ System::Redirect($link_list); }
	if( Validacao::isVazio($ID_ALTERAR) ){ System::Redirect($link_list); }

	if($ID_ATUAL == $ID_ALTERAR){ System::Redirect($link_list);}

	$obj_atual = new ArquivoTipo();
	if(!$obj_atual->buscarAttribute(ArquivoTipoAttribute::IdArquivoTipo(), $ID_ATUAL)){ System::Redirect($link_list); }

	$obj_alterar = new ArquivoTipo();
	if(!$obj_alterar->buscarAttribute(ArquivoTipoAttribute::IdArquivoTipo(), $ID_ALTERAR)){ System::Redirect($link_list); }

	$aux = $obj_atual->getPrioridade();
	$obj_atual->setPrioridade( $obj_alterar->getPrioridade() );
	$obj_alterar->setPrioridade( $aux );

	$obj_atual->alterarAtributo(ArquivoTipoAttribute::Prioridade());
	$obj_alterar->alterarAtributo(ArquivoTipoAttribute::Prioridade());

	System::Redirect($link_list);
?>