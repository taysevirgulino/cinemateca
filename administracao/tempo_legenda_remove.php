<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "tempo_legenda_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "tempo_legenda_add.php?back=$link_back";
	$link_edit = "tempo_legenda_edit.php?id=$ID&back=$link_back";
	$link_remove = "tempo_legenda_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new TempoLegenda();

	if( $obj->buscarTempoLegenda(1, $ID) ){
		$obj->excluirTempoLegenda();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro n�o encontrado!", $link_list);
	}
?>