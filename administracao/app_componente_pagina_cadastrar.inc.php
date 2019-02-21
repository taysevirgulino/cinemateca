<?
	$frm["url"] = $_POST["txtUrl"];
	$frm["descricao"] = $_POST["txtDescricao"];
	$frm["btsubmit"] = $_POST["btSubmit"];
	
	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;
	
	if ( ! Validacao::isVazio($frm["btsubmit"] ) ){
		
		// Validando dados do formulсrio
		if( Validacao::isVazio($frm["url"]) ){
			$label_alerta_erro .="Preencha a URL#";
		}

		if( Validacao::isVazio($frm["descricao"]) ){
			$label_alerta_erro .="Preencha a Descriчуo#";
		}
		
		
		if( Validacao::isVazio($label_alerta_erro) ){
			
			$appc = new AppComponente();
			$appcp = new AppComponentePagina();
			
			$appc->setAppComponente(-1, date("Y-m-d H:i:s"));
			$appc->inserirAppComponente();
			
			if( $appc->buscarAppComponente(2, "") ){
				
				$appcp->setAppComponentePagina($appc->getIdAppComponente(), md5($frm["url"]), $frm["url"], $frm["descricao"]);
				
				if( $appcp->inserirAppComponentePagina() ){
					
					$appp = new AppComponentePermissao();
					$appp->setAppComponentePermissao(-1, 2, $appc->getIdAppComponente(), 1);
					$appp->inserirAppComponentePermissao();

					$label_alerta_concluido .="Cadastro efetuado com sucesso!#Redirecionando...";
					$label_alerta_status = "disabled";
					System::Refresh(5, "index.php");
				}else{
					$label_alerta_erro .="Cadastro nуo Efetuado";
				}
			}else{
				$label_alerta_erro .="Erro ao Criar Componente#Entre em contato com o Administrador;";
			}
		}
	}
?>