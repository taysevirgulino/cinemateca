<?
	$ID = intval( $_REQUEST["id"] );
	if( Validacao::isVazio($ID) ){ System::Redirect("app_componente_regra_list.php"); }	
	$obj = new AppComponenteRegra();
	if(!$obj->buscarAppComponenteRegra(1, $ID)){ System::Redirect("app_componente_regra_list.php"); }

	$frm_descricao = $_POST["FrmDescricao"];
	$frm_bt = $_POST["btSubmit"];

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){


		if( Validacao::isVazio($label_alerta_erro) ){
			if(AppComponenteRegraManage::alterarAppComponenteRegra($ID, null, $frm_descricao)){
				$label_alerta_concluido .="Alteraчуo efetuada com sucesso!#Redirecionando...";
				$label_alerta_status = "disabled";
				System::Redirect("app_componente_regra_list.php");
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_descricao = $obj->getDescricao();
	}
?>