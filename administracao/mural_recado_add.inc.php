<?
	$link_add = "mural_recado_add.php";
	$link_edit = "mural_recado_edit.php";
	$link_remove = "mural_recado_remove.php";
	$link_list = "mural_recado_list.php";

	$frm_nome = System::_POST("FrmNome");
	$frm_email = System::_POST("FrmEmail");
	$frm_texto = System::_POST("FrmTexto");
	$frm_ip = $_SERVER['REMOTE_ADDR'];
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		if( Validacao::isVazio($frm_email) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  E-mail#";
		}
		if( Validacao::isVazio($frm_texto) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Texto#";
		}
		if( Validacao::isVazio($frm_ip) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Ip#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(MuralRecadoManage::inserirMuralRecado(-1, null, $frm_nome, $frm_email, $frm_texto, $frm_ip, System::FormatarData($frm_datahora, "Y-m-d H:i:s"), $frm_status)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>