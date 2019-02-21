<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "fale_conosco_assunto_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "fale_conosco_assunto_add.php?back=$link_back";
	$link_edit = "fale_conosco_assunto_edit.php?back=$link_back";
	$link_remove = "fale_conosco_assunto_remove.php?back=$link_back";

	$frm_assunto = System::_POST("FrmAssunto");
	$frm_emails = System::_POST("FrmEmails");
	$frm_prioridade = FaleConoscoAssuntoManage::ultimaPrioridade();
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_assunto) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Assunto#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			$obj = new FaleConoscoAssunto();
			$obj->setFaleConoscoAssunto(-1, null, null, $frm_assunto, $frm_emails, $frm_prioridade);
			if($obj->inserirFaleConoscoAssunto()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>