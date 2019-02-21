<?
	$frm["url"] = $_POST["txtUrl"];
	$frm["descricao"] = $_POST["txtDescricao"];
	$frm["btsubmit"] = $_POST["btSubmit"];
	
	$ID = intval( $_REQUEST["id"] );
	
	if( Validacao::isVazio($ID) ){ System::Redirect("index.php"); }

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
			
			$appcp = new AppComponentePagina();
			
			if( $appcp->buscarAppComponentePagina(1, $ID) ){
				
				$appcp->setAppComponentePagina($appcp->getIdAppComponentePagina(), md5($frm["url"]), $frm["url"], $frm["descricao"]);
				
				if( $appcp->alterarAppComponentePagina() ){
					$label_alerta_concluido .="Alteraчуo efetuada com sucesso!#Redirecionando...";
					$label_alerta_status = "disabled";
					System::Refresh(5, "index.php");
				}else{
					$label_alerta_erro .="Alteraчуo nуo Efetuada";
				}
			}else{
				$label_alerta_erro .="Erro ao buscar Componente Pсgina#Entre em contato com o Administrador;";
			}
		}
	}else {
		$obj = new AppComponentePagina();
		
		if( $obj->buscarAppComponentePagina(1, $ID) ){
			$frm["url"] = $obj->getUrl();
			$frm["descricao"] = $obj->getDescricao();
		}else {
			System::Redirect("index.php");
		}
	}
?>