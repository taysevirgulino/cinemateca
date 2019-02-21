<?
	$frm_id_app_usuario_grupo = $_POST["FrmIdAppUsuarioGrupo"];
	$frm_nome = $_POST["FrmNome"];
	$frm_email = $_POST["FrmEmail"];
	$frm_login = trim($_POST["FrmLogin"]);
	$frm_senha = $_POST["FrmSenha"];
	$frm_status = $_POST["FrmStatus"];
	$frm_bt = $_POST["btSubmit"];

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjAppUsuarioGrupo = AppUsuarioGrupoManage::consultarAppUsuarioGrupo(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_app_usuario_grupo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  App Usuário Grupo#";
		}
		if( Validacao::isVazio($frm_login) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Login#";
		}else{
			$usuario = AppUsuarioManage::buscarAppUsuarioAttribute(AppUsuarioAttribute::Login(), $frm_login, SearchComparer::Igual());
			if(!empty($usuario)){
				$label_alerta_erro .="Login já cadastrado. Informe outro login.#";
			}
		}
		if( Validacao::isVazio($frm_senha) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Senha#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(AppUsuarioManage::inserirAppUsuario(-1, null, $frm_id_app_usuario_grupo, $frm_nome, $frm_email, $frm_login, md5($frm_senha), $frm_status)){
				$label_alerta_concluido .="Cadastro efetuado com sucesso!#Redirecionando...";
				$label_alerta_status = "disabled";
				System::Redirect("app_usuario_list.php");
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>