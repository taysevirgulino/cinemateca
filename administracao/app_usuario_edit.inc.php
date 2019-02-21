<?
	$ID = intval( $_REQUEST["id"] );
	if( Validacao::isVazio($ID) ){ System::Redirect("app_usuario_list.php"); }	
	$obj = new AppUsuario();
	if(!$obj->buscarAppUsuario(1, $ID)){ System::Redirect("app_usuario_list.php"); }

	$frm_id_app_usuario_grupo = $_POST["FrmIdAppUsuarioGrupo"];
	$frm_nome = $_POST["FrmNome"];
	$frm_email = $_POST["FrmEmail"];
	$frm_login = $_POST["FrmLogin"];
	$frm_senha = $_POST["FrmSenha"];
	$frm_status = $_POST["FrmStatus"];
	$frm_bt = $_POST["btSubmit"];

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjAppUsuarioGrupo = AppUsuarioGrupoManage::consultarAppUsuarioGrupo(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_app_usuario_grupo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  App Usuсrio Grupo#";
		}
		if( Validacao::isVazio($frm_login) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Login#";
		}else{
			if($frm_login != $obj->getLogin()){
				$usuario = AppUsuarioManage::buscarAppUsuarioAttribute(AppUsuarioAttribute::Login(), $frm_login, SearchComparer::Igual());
				if(!empty($usuario)){
					$label_alerta_erro .="Login jс cadastrado. Informe outro login.#";
				}
			}
		}

		$frm_senha_new = $obj->getSenha();
		if( ! Validacao::isVazio($frm_senha) ){
			$frm_senha_new = md5($frm_senha);
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(AppUsuarioManage::alterarAppUsuario($ID, null, $frm_id_app_usuario_grupo, $frm_nome, $frm_email, $frm_login, $frm_senha_new, $frm_status)){
				$label_alerta_concluido .="Alteraчуo efetuada com sucesso!#Redirecionando...";
				$label_alerta_status = "disabled";
				System::Redirect("app_usuario_list.php");
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_app_usuario_grupo = $obj->getIdAppUsuarioGrupo();
		$frm_nome = $obj->getNome();
		$frm_email = $obj->getEmail();
		$frm_login = $obj->getLogin();
		//$frm_senha = $obj->getSenha();
		$frm_status = $obj->getStatus();
	}
?>