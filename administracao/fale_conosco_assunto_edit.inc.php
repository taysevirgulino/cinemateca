<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "fale_conosco_assunto_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "fale_conosco_assunto_add.php?back=$link_back";
	$link_edit = "fale_conosco_assunto_edit.php?id=$ID&back=$link_back";
	$link_remove = "fale_conosco_assunto_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new FaleConoscoAssunto();
	if(!$obj->buscarFaleConoscoAssunto(1, $ID)){ System::Redirect($link_list); }

	$frm_assunto = System::_POST("FrmAssunto");
	$frm_emails = System::_POST("FrmEmails");
	$frm_prioridade = $obj->getPrioridade();
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_assunto) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Assunto#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(FaleConoscoAssuntoManage::alterarFaleConoscoAssunto($ID, null, null, $frm_assunto, $frm_emails, $frm_prioridade)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_assunto = $obj->getAssunto();
		$frm_emails = $obj->getEmails();
		$frm_prioridade = $obj->getPrioridade();
	}
?>