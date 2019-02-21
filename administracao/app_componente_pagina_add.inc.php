<?
	$frm_url = $_POST["FrmUrl"];
	$frm_descricao = $_POST["FrmDescricao"];
	$frm_bt = $_POST["btSubmit"];

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){


		if( Validacao::isVazio($label_alerta_erro) ){
			if(AppComponentePaginaManage::inserirAppComponentePagina(-1, null, $frm_url, $frm_descricao)){
				$label_alerta_concluido .="Cadastro efetuado com sucesso!#Redirecionando...";
				$label_alerta_status = "disabled";
				System::Redirect("app_componente_pagina_list.php");
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>