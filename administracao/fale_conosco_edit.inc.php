<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "fale_conosco_add.php";
	$link_edit = "fale_conosco_edit.php?id=$ID";
	$link_remove = "fale_conosco_remove.php?id=$ID";
	$link_list = "fale_conosco_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new FaleConosco();
	if(!$obj->buscarFaleConosco(1, $ID)){ System::Redirect($link_list); }

	$frm_id_fale_conosco_assunto = System::_POST("FrmIdFaleConoscoAssunto");
	$frm_nome = System::_POST("FrmNome");
	$frm_email = System::_POST("FrmEmail");
	$frm_telefone = System::_POST("FrmTelefone");
	$frm_cidade = System::_POST("FrmCidade");
	$frm_estado = System::_POST("FrmEstado");
	$frm_mensagem = System::_POST("FrmMensagem");
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjFaleConoscoAssunto = FaleConoscoAssuntoManage::consultarFaleConoscoAssunto(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_fale_conosco_assunto) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Fale Conosco Assunto#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(FaleConoscoManage::alterarFaleConosco($ID, null, null, $frm_id_fale_conosco_assunto, $frm_nome, $frm_email, $frm_telefone, $frm_cidade, $frm_estado, $frm_mensagem, System::FormatarData($frm_datahora, "Y-m-d H:i:s"), $frm_status)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_fale_conosco_assunto = $obj->getIdFaleConoscoAssunto();
		$frm_nome = $obj->getNome();
		$frm_email = $obj->getEmail();
		$frm_telefone = $obj->getTelefone();
		$frm_cidade = $obj->getCidade();
		$frm_estado = $obj->getEstado();
		$frm_mensagem = System::_TextByHtml($obj->getMensagem());
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_status = $obj->getStatus();
	}
?>