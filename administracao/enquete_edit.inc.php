<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "enquete_add.php";
	$link_edit = "enquete_edit.php?id=$ID";
	$link_remove = "enquete_remove.php?id=$ID";
	$link_list = "enquete_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Enquete();
	if(!$obj->buscarEnquete(1, $ID)){ System::Redirect($link_list); }

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
		$aux1 = System::_POST("FrmIdAlternativa$i");
		//if(!empty($aux)){
			$frm_resposta[$cont][0] = $aux;
			$frm_resposta[$cont++][1] = $aux1;
		//}
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
			if(EnqueteManage::alterarEnquete($ID, null, null, $frm_pergunta, System::FormatarData($frm_data_inicial, "Y-m-d"), System::FormatarData($frm_data_final, "Y-m-d"), $frm_status)){
				
				for($i=0; $i < count($frm_resposta); $i++){
					if(empty($frm_resposta[$i][1])){
						if(!empty($frm_resposta[$i][0])){
							EnqueteAlternativaManage::inserirEnqueteAlternativa(-1, null, null, $ID, $frm_resposta[$i][0], $i+1);
						}
					}else{
						if(empty($frm_resposta[$i][0])){
							EnqueteAlternativaManage::excluirEnqueteAlternativa($frm_resposta[$i][1]);
						}else{
							EnqueteAlternativaManage::alterarAtributoResposta($frm_resposta[$i][1], $frm_resposta[$i][0]);	
						}
					}
				}
				
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteração não Efetuada";
			}
		}
	}else{
		$frm_pergunta = $obj->getPergunta();
		$frm_data_inicial = System::FormatarData($obj->getDataInicial(), "d/m/Y");
		$frm_data_final = System::FormatarData($obj->getDataFinal(), "d/m/Y");
		$frm_status = $obj->getStatus();
		
		$Alternativas = EnqueteAlternativaManage::consultarEnqueteAlternativaAttribute(EnqueteAlternativaAttribute::IdEnquete(), $ID, SearchComparer::Igual(), EnqueteAlternativaAttribute::Prioridade(), SearchOrder::Crescente());
		$frm_resposta = array();
		for ($i=0; $i < count($Alternativas); $i++){
			$frm_resposta[$i][0] = $Alternativas[$i]["resposta"];
			$frm_resposta[$i][1] = $Alternativas[$i]["id_enquete_alternativa"];
		}
	}
?>