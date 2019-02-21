<?
	$ID = intval( $_REQUEST["id"] );

	if( Validacao::isVazio($ID) ){ System::Redirect("app_componente_permissao_list.php"); }

	$obj = new AppComponentePermissao();

	if( $obj->buscarAppComponentePermissao(1, $ID) ){
		$ValueAppComponente = AppComponenteManage::buscarAppComponente(1, $obj->getIdAppComponente());
		$frm_id_app_componente = $ValueAppComponente["3"];
		$frm_permissao = $obj->getPermissao();
	}else{
		System::Redirect("app_componente_permissao_list.php");
	}
?>