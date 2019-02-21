<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$IDA = intval(System::_REQUEST("ida"));
	$objAlbum = new GaleriaAlbum();
	if(!$objAlbum->buscarGaleriaAlbum(1, $IDA)){ System::Redirect("galeria_album_list.php"); }
		
	$ID_ATUAL = System::_REQUEST("idatual");
	$ID_ALTERAR = System::_REQUEST("idalterar");
	$link_add = "galeria_foto_add.php?ida=$IDA";
	$link_edit = "galeria_foto_edit.php?ida=$IDA";
	$link_remove = "galeria_foto_remove.php?ida=$IDA";
	$link_list = "galeria_foto_list.php?ida=$IDA";

	if( Validacao::isVazio($ID_ATUAL) ){ System::Redirect($link_list); }
	if( Validacao::isVazio($ID_ALTERAR) ){ System::Redirect($link_list); }

	if($ID_ATUAL == $ID_ALTERAR){ System::Redirect($link_list);}

	$obj_atual = new GaleriaFoto();
	if(!$obj_atual->buscarGaleriaFoto(1, $ID_ATUAL)){ System::Redirect($link_list); }

	$obj_alterar = new GaleriaFoto();
	if(!$obj_alterar->buscarGaleriaFoto(1, $ID_ALTERAR)){ System::Redirect($link_list); }

	$aux = $obj_atual->getPrioridade();
	$obj_atual->setPrioridade( $obj_alterar->getPrioridade() );
	$obj_alterar->setPrioridade( $aux );

	$obj_atual->alterarAtributoPrioridade();
	$obj_alterar->alterarAtributoPrioridade();

	System::Redirect($link_list);
?>