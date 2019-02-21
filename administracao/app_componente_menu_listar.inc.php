<?
	$obj = new AppComponenteMenu();
	
	$vobj = $obj->consultarAppComponenteMenu(2, " ORDER BY tipo DESC, descricao, prioridade, id_app_componente_menu_pai");
?>