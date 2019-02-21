<?
	$frm["menupai"] = $_POST["sltMenuPai"];
	$frm["url"] = $_POST["txtUrl"];
	$frm["descricao"] = $_POST["txtDescricao"];
	$frm["imagem"] = $_POST["txtImagem"];
	$frm["prioridade"] = intval( $_POST["txtPrioridade"] );
	$frm["tipo"] = intval( $_POST["sltTipo"] );
	$frm["status"] = intval( $_POST["sltStatus"] );
	$frm["btsubmit"] = $_POST["btSubmit"];
	
	$ID_MENU = intval( $_REQUEST["id"] );
	
	if( Validacao::isVazio($ID_MENU) ){ System::Redirect("index.php"); }
	
	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;
	
	// Carregando Menus Pais -----------------------------------------------------|
	$acm = new AppComponenteMenu();
	$acms = $acm->consultarAppComponenteMenu(1, "");
	// ---------------------------------------------------------------------------|

	// Carregando Imagens --------------------------------------------------------|
	$i=0;
	$vimagens = array();
	if ($handle = opendir('menu/icones')) {
	    while (false !== ($file = readdir($handle))) {
	        if ($file != "." && $file != "..") {
	            $vimagens[$i++] = $file;
	        }
	    }
	    closedir($handle);
	}
	// ---------------------------------------------------------------------------|
	
	if ( ! Validacao::isVazio($frm["btsubmit"] ) ){
		
		// Validando dados do formulсrio
		if( Validacao::isVazio($frm["descricao"]) ){
			$label_alerta_erro .="Preencha a Descriчуo#";
		}
		
		if( Validacao::isVazio($frm["prioridade"]) ){
			$label_alerta_erro .="Preencha a Prioridade#";
		}
		
		if( Validacao::isVazio($label_alerta_erro) ){
			
			$appcm = new AppComponenteMenu();
			
			if( Validacao::isVazio($frm["imagem"]) ){
				$frm["imagem"] = "null.gif";
			}

			if( $appcm->buscarAppComponenteMenu(1, $ID_MENU) ){
				
				$appcm->setAppComponenteMenu($appcm->getIdAppComponenteMenu(), $frm["menupai"], $frm["url"], $frm["descricao"], $frm["imagem"], $frm["prioridade"], $frm["tipo"], $frm["status"]);
				
				if( $appcm->alterarAppComponenteMenu() ){
					$label_alerta_concluido .="Alteraчуo efetuada com sucesso!#Redirecionando...";
					$label_alerta_status = "disabled";
					System::Redirect("app_componente_menu_listar.php");
					//System::Refresh(5, "app_componente_menu_listar.php");
				}else{
					$label_alerta_erro .="Alteraчуo nуo Efetuada";
				}
			}else{
				$label_alerta_erro .="Erro ao buscar Componente Menu#Entre em contato com o Administrador;";
			}
		}
	}else {
		$appcm = new AppComponenteMenu();
		
		if( $appcm->buscarAppComponenteMenu(1, $ID_MENU) ){
			$frm["menupai"] = $appcm->getIdAppComponenteMenuPai();
			$frm["url"] = $appcm->getUrl();
			$frm["descricao"] = $appcm->getDescricao();
			$frm["imagem"] = $appcm->getImagem();
			$frm["prioridade"] = $appcm->getPrioridade();
			$frm["tipo"] = $appcm->getTipo();
			$frm["status"] = $appcm->getStatus();
		}else {
			System::Redirect("index.php");
		}
	}
?>