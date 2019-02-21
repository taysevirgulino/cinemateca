<?
	$link_add = "jornal_edicao_add.php";
	$link_edit = "jornal_edicao_edit.php";
	$link_remove = "jornal_edicao_remove.php";
	$link_list = "jornal_edicao_list.php";

	$frm_numero = System::_POST("FrmNumero");
	$frm_ano = System::_POST("FrmAno");
	$frm_data_inicial = System::_POST("FrmDataInicial");
	$frm_data_final = System::_POST("FrmDataFinal");
	$frm_status = 0;
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_numero) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Número#";
		}
		if( Validacao::isVazio($frm_ano) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Ano#";
		}
		if( Validacao::isVazio($frm_data_inicial) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Data Inicial#";
		}
		if( Validacao::isVazio($frm_data_final) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Data Final#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			$obj = new JornalEdicao();
			$obj->setJornalEdicao(-1, null, $frm_numero, $frm_ano, System::FormatarData($frm_data_inicial, "Y-m-d"), System::FormatarData($frm_data_final, "Y-m-d"), $frm_status);
			if($obj->inserirJornalEdicao()){
				System::Redirect("jornal_edicao_edit.php?id=".$obj->getIdJornalEdicao());
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>