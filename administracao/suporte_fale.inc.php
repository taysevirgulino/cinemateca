<?
	$link_add = "suporte_fale.php";
	$link_edit = "suporte_fale.php";
	$link_remove = "suporte_fale.php";
	$link_list = "suporte_fale.php";

	$frm_assunto = System::_POST("FrmAssunto");
	$frm_mensagem = System::_POST("FrmMensagem");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_assunto) ){
			$label_alerta_erro .="Preencha/Selecione o(a) Assunto#";
		}
		if( Validacao::isVazio($frm_mensagem) ){
			$label_alerta_erro .="Preencha/Selecione o(a) Mensagem#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			$Site = Current::Site();
			$Email = new Email( $Site );
			if($Email->FaleSuporte($Site->getEmailNome(), $Site->getEmail(), $Site->getUrl(), $frm_assunto, $frm_mensagem)){
				$label_alerta_concluido .="Suporte enviado com sucesso!#Aguarde contato";
				$label_alerta_status = "disabled";
			}else{
				$label_alerta_erro .= "Suporte não enviado, tente novamente daqui alguns minutos";
			}
		}
	}
?>