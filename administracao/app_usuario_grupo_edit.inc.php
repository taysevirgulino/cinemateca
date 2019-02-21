<?
	$ID = intval( $_REQUEST["id"] );
	if( Validacao::isVazio($ID) ){ System::Redirect("app_usuario_grupo_list.php"); }	
	$obj = new AppUsuarioGrupo();
	if(!$obj->buscarAppUsuarioGrupo(1, $ID)){ System::Redirect("app_usuario_grupo_list.php"); }

	$frm_nome = $_POST["FrmNome"];
	$frm_sigla = $_POST["FrmSigla"];
	$frm_tipo = $_POST["FrmTipo"];
	$frm_bt = $_POST["btSubmit"];

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(AppUsuarioGrupoManage::alterarAppUsuarioGrupo($ID, null, $frm_nome, $frm_sigla, $frm_tipo)){
				$label_alerta_concluido .="Alteraчуo efetuada com sucesso!#Redirecionando...";
				$label_alerta_status = "disabled";
				System::Redirect("app_usuario_grupo_list.php");
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_nome = $obj->getNome();
		$frm_sigla = $obj->getSigla();
		$frm_tipo = $obj->getTipo();
	}
?>