<?
	$ID = intval( $_REQUEST["id"] );

	if( Validacao::isVazio($ID) ){ System::Redirect("app_componente_menu_list.php"); }

	$obj = new AppComponenteMenu();

	if( $obj->buscarAppComponenteMenu(1, $ID) ){
		$frm_url = $obj->getUrl();
		$frm_descricao = $obj->getDescricao();
		$frm_imagem = $obj->getImagem();
		$frm_prioridade = $obj->getPrioridade();
		$frm_tipo = $obj->getTipo();
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect("app_componente_menu_list.php");
	}
?>