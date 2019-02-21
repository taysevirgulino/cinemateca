<?
	// SEM SELECAO DE SITE
	/*$Site = new Site();
	if($Site->buscarSite(5, Current::IdeOrigem())){
		Current::setSite($Site);
		System::Redirect("index.php");
	}else{
		System::Redirect("logout.php");
	}*/
	// FIM

	$frm_id_site = intval($_POST["FrmIdSite"]);
	$frm_bt = $_POST["btSubmit"];
	
	$url = trim($_REQUEST["url"]);
	if(empty($url)){ $url = "index.php"; }
	$url = "index.php";
	
	$VObjSite = SiteManage::SitesByAppUsuarioGrupo($USER_GRUPO);
	
	Current::setIdeOrigem($VObjSite[0]["identificador"]);
	$Site = new Site();
	$Site->buscarSite(1, $VObjSite[0]["id_site"]);
	Current::setSite($Site);
	if(count($VObjSite) == 1){
		System::Redirect($url);
	}
	
	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;
	
	if ( ! Validacao::isVazio( $frm_bt ) ){
		
		// Validando dados do formulário
		if( Validacao::isVazio($frm_id_site) ){
			$label_alerta_erro .="Selecione um Site#";
		}		
		
		if( Validacao::isVazio($label_alerta_erro) ){
			
			$site = new Site();
			if($site->buscarSite(1, $frm_id_site)){
				Current::setIdeOrigem($site->getIdentificador());
				Current::setSite($site);
				System::Redirect($url);
			}
		}
	}else{
		$frm_id_site = Current::Site()->getIdSite();
	}
?>