<?
	$frm["senhaatual"] = $_POST["txtSenhaAtual"];
	$frm["senhanova"] = $_POST["txtSenhaNova"];
	$frm["senhaconf"] = $_POST["txtSenhaNovaConf"];
	$frm["btsubmit"] = $_POST["btSubmit"];
	
	if ( ! $USER_STATUS) {
		System::Redirect("index.php");
	}
	
	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;
	
	if ( ! Validacao::isVazio($frm["btsubmit"] ) ){
		
		// Validando dados do formulário
		if( Validacao::isVazio($frm["senhaatual"]) ){
			$label_alerta_erro .="Preencha a Senha Atual#";
		}else
		if( Validacao::isVazio($frm["senhanova"]) ){
			$label_alerta_erro .="Preencha a Senha Nova#";
		}else
		if( Validacao::isVazio($frm["senhaconf"]) ){
			$label_alerta_erro .="Preencha a Confirmação de Senha Nova#";
		}else
		if( $frm["senhanova"] != $frm["senhaconf"]){
			$label_alerta_erro .="Confirmação Incorreta#";
		}
		
		
		if( Validacao::isVazio($label_alerta_erro) ){
			$usuario = new AppUsuario();
			$usuario->setLogin( $USER_LOGIN );
			$usuario->setSenha( md5( $frm["senhaatual"] ) );
			$usuario->setStatus( 1 );
			
			if( $usuario->buscarAppUsuario(4, "") ){
				$usuario->setSenha( md5( $frm["senhanova"] ) );
				
				if ( $usuario->alterarAppUsuario() ) {
					$label_alerta_concluido .="Senha alterada com sucesso!#Redirecionando...";
					$label_alerta_status = "disabled";
					System::Refresh(3, "logout.php");
				}else{
					$label_alerta_erro .="Erro ao alterar senha#Entre em contato com o Administrador...";
				}
			}else{
				$label_alerta_erro .="Senha Atual Incorreta";
			}
		}
	}
?>