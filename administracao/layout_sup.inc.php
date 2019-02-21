<?

	$ShowTop = (($_REQUEST["menu"] == "disabled") ? false : true );
	
	if($ShowTop){
		$Menu = new Menu();
		if( $USER_STATUS ){
			$Menu->gerarMenu("menu", $USER_GRUPO);	
		}else{
			$Menu->gerarMenu("menu", $USER_GRUPO_VISITANTE);
		}
		$label_display_config = $Menu->displayConfig();
		$label_menu_display = $Menu->displayMenu(); 
		
		$Site = Current::Site();
		if(!empty($Site)){
			$SITE_INFO = "| Site: <a href='".$Site->getUrl()."' target='_blank' title='Clique para acessar o Site' style='font-weight:bold'><u>".$Site->getTitulo()."</u> ".$Site->getUrl()."</a>";
		}
		if($USER_STATUS){
			$AppUsuario = AppLogonManage::GetAppUsuario();
			//$countMensagens = MensagemManage::CountByStatus($AppUsuario->getIdentificador(), MensagemStatus::Novo());
			//$CAIXA_POSTAL = "<a ".(($countMensagens>0) ? ' style="color:#F00; font-weight:bold"' : "" )." href='mensagem_list.php' title='Ir para Caixa de Entrada'>Caixa de entrada ($countMensagens)</a>&nbsp;&nbsp;|&nbsp;&nbsp;";
		}
	}
	
?>