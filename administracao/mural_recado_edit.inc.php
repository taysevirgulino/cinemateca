<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "mural_recado_add.php";
	$link_edit = "mural_recado_edit.php?id=$ID";
	$link_remove = "mural_recado_remove.php?id=$ID";
	$link_list = "mural_recado_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new MuralRecado();
	if(!$obj->buscarMuralRecado(1, $ID)){ System::Redirect($link_list); }

	$frm_nome = System::_POST("FrmNome");
	$frm_email = System::_POST("FrmEmail");
	$frm_texto = System::_POST("FrmTexto");
	$frm_ip = $obj->getIp();
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
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
			if(MuralRecadoManage::alterarMuralRecado($ID, null, $frm_nome, $frm_email, $frm_texto, $frm_ip, System::FormatarData($frm_datahora, "Y-m-d H:i:s"), $frm_status)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_nome = $obj->getNome();
		$frm_email = $obj->getEmail();
		$frm_texto = $obj->getTexto();
		$frm_ip = $obj->getIp();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_status = $obj->getStatus();
	}
?>