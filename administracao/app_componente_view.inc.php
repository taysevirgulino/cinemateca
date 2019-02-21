<?
	$ID = intval( $_REQUEST["id"] );

	if( Validacao::isVazio($ID) ){ System::Redirect("app_componente_list.php"); }

	$obj = new AppComponente();

	if( $obj->buscarAppComponente(1, $ID) ){
	}else{
		System::Redirect("app_componente_list.php");
	}
?>