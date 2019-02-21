<?
	$ID = intval( $_REQUEST["id"] );

	if( Validacao::isVazio($ID) ){ System::Redirect("app_componente_regra_list.php"); }

	$obj = new AppComponenteRegra();

	if( $obj->buscarAppComponenteRegra(1, $ID) ){
		$frm_descricao = $obj->getDescricao();
	}else{
		System::Redirect("app_componente_regra_list.php");
	}
?>