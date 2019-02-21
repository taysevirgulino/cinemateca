<?
	$frm["descricao"] = $_POST["txtDescricao"];
	$frm["btsubmit"] = $_POST["btSubmit"];
	
	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;
	
	if ( ! Validacao::isVazio($frm["btsubmit"] ) ){
		
		// Validando dados do formulсrio
		if( Validacao::isVazio($frm["descricao"]) ){
			$label_alerta_erro .="Preencha a Descriчуo#";
		}
		
		if( Validacao::isVazio($label_alerta_erro) ){
			
			$appc = new AppComponente();
			$appcr = new AppComponenteRegra();
			
			$appc->setAppComponente(-1, date("Y-m-d H:i:s"));
			$appc->inserirAppComponente();
			
			if( $appc->buscarAppComponente(2, "") ){
				
				$appcr->setAppComponenteRegra($appc->getIdAppComponente(), md5($frm["descricao"]), $frm["descricao"]);
				
				if( $appcr->inserirAppComponenteRegra() ){
					
					$appp = new AppComponentePermissao();
					$appp->setAppComponentePermissao(-1, 2, $appc->getIdAppComponente(), 1);
					$appp->inserirAppComponentePermissao();					
					
					$label_alerta_concluido .="Cadastro efetuado com sucesso!#Redirecionando...";
					$label_alerta_status = "disabled";
					System::Refresh(5, "app_componente_regra_listar.php");
				}else{
					$label_alerta_erro .="Cadastro nуo Efetuado";
				}
			}else{
				$label_alerta_erro .="Erro ao Criar Componente#Entre em contato com o Administrador;";
			}
		}
	}
?>