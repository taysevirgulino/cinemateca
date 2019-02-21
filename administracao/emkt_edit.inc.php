<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "emkt_add.php";
	$link_edit = "emkt_edit.php?id=$ID";
	$link_remove = "emkt_remove.php?id=$ID";
	$link_list = "emkt_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Emkt();
	if(!$obj->buscarEmkt(1, $ID)){ System::Redirect($link_list); }

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_assunto = System::_POST("FrmAssunto");
	$frm_remetente_nome = System::_POST("FrmRemetenteNome");
	$frm_remetente_email = System::_POST("FrmRemetenteEmail");
	$frm_mensagem_html = System::_POST("FrmMensagemHtml");
	$frm_mensagem_texto = System::_POST("FrmMensagemTexto");
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Tнtulo#";
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
			if(EmktManage::alterarEmkt($ID, null, $frm_titulo, $frm_assunto, $frm_remetente_nome, $frm_remetente_email, $frm_mensagem_html, $frm_mensagem_texto, System::FormatarData($frm_datahora, "Y-m-d H:i:s"))){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_titulo = $obj->getTitulo();
		$frm_assunto = $obj->getAssunto();
		$frm_remetente_nome = $obj->getRemetenteNome();
		$frm_remetente_email = $obj->getRemetenteEmail();
		$frm_mensagem_html = System::_TextByHtml($obj->getMensagemHtml());
		$frm_mensagem_texto = $obj->getMensagemTexto();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
	}
?>