<?
	$link_add = "enquete_add.php";
	$link_edit = "enquete_edit.php";
	$link_remove = "enquete_remove.php";
	$link_list = "enquete_list.php";

	$frm_pergunta = System::_POST("FrmPergunta");
	$frm_data_inicial = System::_POST("FrmDataInicial");
	$frm_data_final = System::_POST("FrmDataFinal");
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$qtd_alternativa = 10; 
	$cont = 0;
	$frm_resposta = array();
	for($i=0; $i < $qtd_alternativa; $i++){
		$aux = System::_POST("FrmResposta$i");
		if(!empty($aux)){
			$frm_resposta[$cont++] = $aux;
		}
	}

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_pergunta) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Pergunta#";
		}
		if( Validacao::isVazio($frm_data_inicial) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Data Inicial#";
		}
		if( Validacao::isVazio($frm_data_final) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Data Final#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			$obj = new Enquete();
			$obj->setEnquete(-1, null, null, $frm_pergunta, System::FormatarData($frm_data_inicial, "Y-m-d"), System::FormatarData($frm_data_final, "Y-m-d"), $frm_status);
			if($obj->inserirEnquete()){
				
				for($i=0; $i < count($frm_resposta); $i++){
					EnqueteAlternativaManage::inserirEnqueteAlternativa(-1, null, null, $obj->getIdEnquete(), $frm_resposta[$i], $i+1);
				}
				
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}else{
		$frm_data_inicial = date("d/m/Y");
		$frm_data_final = System::SomarData($frm_data_inicial, 30);
	}
?>