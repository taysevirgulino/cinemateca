<?
	$frm["descricao"] = $_POST["txtDescricao"];
	$frm["btsubmit"] = $_POST["btSubmit"];
	
	$ID = intval( $_REQUEST["id"] );
	
	if( Validacao::isVazio($ID) ){ System::Redirect("index.php"); }

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;
	
	if ( ! Validacao::isVazio($frm["btsubmit"] ) ){
		
		// Validando dados do formulсrio
		if( Validacao::isVazio($frm["descricao"]) ){
			$label_alerta_erro .="Preencha a Descriчуo#";
		}
		
		
		if( Validacao::isVazio($label_alerta_erro) ){
			
			$appcr = new AppComponenteRegra();
			
			if( $appcr->buscarAppComponenteRegra(1, $ID) ){
				
				$appcr->setAppComponenteRegra($appcr->getIdAppComponenteRegra(), md5($frm["descricao"]), $frm["descricao"]);
				
				if( $appcr->alterarAppComponenteRegra() ){
					$label_alerta_concluido .="Alteraчуo efetuada com sucesso!#Redirecionando...";
					$label_alerta_status = "disabled";
					System::Refresh(5, "app_componete_regra_listar.php");
				}else{
					$label_alerta_erro .="Alteraчуo nуo Efetuada";
				}
			}else{
				$label_alerta_erro .="Erro ao buscar Componente Pсgina#Entre em contato com o Administrador;";
			}
		}
	}else {
		$obj = new AppComponenteRegra();
		
		if( $obj->buscarAppComponenteRegra(1, $ID) ){
			$frm["descricao"] = $obj->getDescricao();
		}else {
			System::Redirect("index.php");
		}
	}
?>