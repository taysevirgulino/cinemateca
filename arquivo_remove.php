<?
	require_once("config.inc.php");
	$identificador = System::_GET("identificador");

	$ID =  System::_REQUEST("id");
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "arquivo-list-$identificador" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "arquivo_add.php?back=$link_back";
	$link_edit = "arquivo_edit.php?id=$ID&back=$link_back";
	$link_remove = "arquivo_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Arquivo();

	if( $obj->buscarArquivo(1, $ID) ){
		$obj->excluirArquivo();
		System::AlertRedirect("Registro excluido com sucesso!", $link_list);
	}else{
		System::AlertRedirect("Registro n�o encontrado!", $link_list);
	}
?>