<?
	$ID = intval( $_REQUEST["id"] );
	if( Validacao::isVazio($ID) ){ System::Redirect("app_componente_pagina_list.php"); }	
	$obj = new AppComponentePagina();
	if(!$obj->buscarAppComponentePagina(1, $ID)){ System::Redirect("app_componente_pagina_list.php"); }

	$frm_url = $_POST["FrmUrl"];
	$frm_descricao = $_POST["FrmDescricao"];
	$frm_bt = $_POST["btSubmit"];

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){


		if( Validacao::isVazio($label_alerta_erro) ){
			if(AppComponentePaginaManage::alterarAppComponentePagina($ID, null, $frm_url, $frm_descricao)){
				$label_alerta_concluido .="Alteraчуo efetuada com sucesso!#Redirecionando...";
				$label_alerta_status = "disabled";
				System::Redirect("app_componente_pagina_list.php");
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_url = $obj->getUrl();
		$frm_descricao = $obj->getDescricao();
	}
?>