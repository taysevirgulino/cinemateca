<?
	$frm["menupai"] = intval( $_POST["sltMenuPai"] );
	$frm["url"] = $_POST["txtUrl"];
	$frm["descricao"] = $_POST["txtDescricao"];
	$frm["imagem"] = $_POST["txtImagem"];
	$frm["prioridade"] = intval( $_POST["txtPrioridade"] );
	$frm["tipo"] = intval( $_POST["sltTipo"] );
	$frm["status"] = intval( $_POST["sltStatus"] );
	$frm["btsubmit"] = $_POST["btSubmit"];
	
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
			
			$appc = new AppComponente();
			$appcm = new AppComponenteMenu();
			
			$appc->setAppComponente(-1, date("Y-m-d H:i:s"));
			$appc->inserirAppComponente();
			
			if( Validacao::isVazio($frm["imagem"]) ){
				$frm["imagem"] = "null.gif";
			}

			if( $appc->buscarAppComponente(2, "") ){
				$appcm->setAppComponenteMenu($appc->getIdAppComponente(), $frm["menupai"], $frm["url"], $frm["descricao"], $frm["imagem"], $frm["prioridade"], $frm["tipo"], $frm["status"]);
				$appcm->inserirAppComponenteMenu();
				
				if( $appcm->buscarAppComponenteMenu(2, "") ){
					
					$appp = new AppComponentePermissao();
					$appp->setAppComponentePermissao(-1, 2, $appc->getIdAppComponente(), 1);
					$appp->inserirAppComponentePermissao();
					
					$label_alerta_concluido .="Cadastro efetuado com sucesso!#Redirecionando...";
					$label_alerta_status = "disabled";
					//System::Refresh(5, "app_componente_menu_listar.php");
					System::Redirect("app_componente_menu_listar.php");
				}else{
					$label_alerta_erro .="Cadastro nуo Efetuado";
				}
			}else{
				$label_alerta_erro .="Erro ao Criar Componente#Entre em contato com o Administrador;";
			}
		}
	}
?>