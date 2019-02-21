<?
	$link_add = "fale_conosco_add.php";
	$link_edit = "fale_conosco_edit.php";
	$link_remove = "fale_conosco_remove.php";
	$link_list = "fale_conosco_list.php";

	$frm_id_fale_conosco_assunto = System::_POST("FrmIdFaleConoscoAssunto");
	$frm_nome = System::_POST("FrmNome");
	$frm_email = System::_POST("FrmEmail");
	$frm_telefone = System::_POST("FrmTelefone");
	$frm_cidade = System::_POST("FrmCidade");
	$frm_estado = System::_POST("FrmEstado");
	$frm_mensagem = System::_POST("FrmMensagem");
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
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
			if(FaleConoscoManage::inserirFaleConosco(-1, null, null, $frm_id_fale_conosco_assunto, $frm_nome, $frm_email, $frm_telefone, $frm_cidade, $frm_estado, $frm_mensagem, System::FormatarData($frm_datahora, "Y-m-d H:i:s"), $frm_status)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>