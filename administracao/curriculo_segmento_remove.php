<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "curriculo_segmento_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "curriculo_segmento_add.php?back=$link_back";
	$link_edit = "curriculo_segmento_edit.php?id=$ID&back=$link_back";
	$link_remove = "curriculo_segmento_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new CurriculoSegmento();

	if( $obj->buscarCurriculoSegmento(1, $ID) ){
		$obj->excluirCurriculoSegmento();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>