<?
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
			if(AppUsuarioGrupoManage::inserirAppUsuarioGrupo(-1, null, $frm_nome, $frm_sigla, $frm_tipo)){
				$label_alerta_concluido .="Cadastro efetuado com sucesso!#Redirecionando...";
				$label_alerta_status = "disabled";
				System::Redirect("app_usuario_grupo_list.php");
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>