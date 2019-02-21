<?
	$ID = intval( $_REQUEST["id"] );
	if( Validacao::isVazio($ID) ){ System::Redirect("app_componente_permissao_list.php"); }	
	$obj = new AppComponentePermissao();
	if(!$obj->buscarAppComponentePermissao(1, $ID)){ System::Redirect("app_componente_permissao_list.php"); }

	$frm_id_app_componente = $_POST["FrmIdAppComponente"];
	$frm_permissao = $_POST["FrmPermissao"];
	$frm_bt = $_POST["btSubmit"];

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjAppComponente = AppComponenteManage::consultarAppComponente(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){


		if( Validacao::isVazio($label_alerta_erro) ){
			if(AppComponentePermissaoManage::alterarAppComponentePermissao($ID, null, $frm_id_app_componente, $frm_permissao)){
				$label_alerta_concluido .="Alteraчуo efetuada com sucesso!#Redirecionando...";
				$label_alerta_status = "disabled";
				System::Redirect("app_componente_permissao_list.php");
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_app_componente = $obj->getIdAppComponente();
		$frm_permissao = $obj->getPermissao();
	}
?>