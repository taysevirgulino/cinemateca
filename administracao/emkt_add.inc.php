<?
	$link_add = "emkt_add.php";
	$link_edit = "emkt_edit.php";
	$link_remove = "emkt_remove.php";
	$link_list = "emkt_list.php";

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_assunto = System::_POST("FrmAssunto");
	$frm_remetente_nome = System::_POST("FrmRemetenteNome");
	$frm_remetente_email = System::_POST("FrmRemetenteEmail");
	$frm_mensagem_html = System::_POST("FrmMensagemHtml");
	$frm_mensagem_texto = System::_POST("FrmMensagemTexto");
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Título#";
		}
		if( Validacao::isVazio($frm_assunto) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Assunto#";
		}
		if( Validacao::isVazio($frm_remetente_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Remetente Nome#";
		}
		if( Validacao::isVazio($frm_remetente_email) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Remetente E-mail#";
		}
		if( Validacao::isVazio($frm_mensagem_html) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Mensagem Html#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			$obj = new Emkt();
			$obj->setEmkt(-1, null, $frm_titulo, $frm_assunto, $frm_remetente_nome, $frm_remetente_email, $frm_mensagem_html, $frm_mensagem_texto, System::FormatarData($frm_datahora, "Y-m-d H:i:s"));
			if($obj->inserirEmkt()){
				System::Redirect("emkt_disparo.php?id=".$obj->getIdEmkt());
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}else{
		$Site = Current::Site();
		$frm_remetente_nome = $Site->getEmailNome();
		$frm_remetente_email = $Site->getEmail();
	}
?>