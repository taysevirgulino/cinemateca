<?
	$frm_id_app_componente = $_POST["FrmIdAppComponente"];
	$frm_permissao = $_POST["FrmPermissao"];
	$frm_bt = $_POST["btSubmit"];

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjAppComponente = AppComponenteManage::consultarAppComponente(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){


		if( Validacao::isVazio($label_alerta_erro) ){
			if(AppComponentePermissaoManage::inserirAppComponentePermissao(-1, null, $frm_id_app_componente, $frm_permissao)){
				$label_alerta_concluido .="Cadastro efetuado com sucesso!#Redirecionando...";
				$label_alerta_status = "disabled";
				System::Redirect("app_componente_permissao_list.php");
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>