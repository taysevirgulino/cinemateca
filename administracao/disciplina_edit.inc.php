<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "disciplina_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "disciplina_add.php?back=$link_back";
	$link_edit = "disciplina_edit.php?id=$ID&back=$link_back";
	$link_remove = "disciplina_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Disciplina();
	if(!$obj->buscarDisciplina(1, $ID)){ System::Redirect($link_list); }

	$frm_nome = System::_POST("FrmNome");
	$frm_semestre = System::_POST("FrmSemestre");
	$frm_conteudo = System::_POST("FrmConteudo");
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
		if( Validacao::isVazio($frm_semestre) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Semestre#";
		}
		if( Validacao::isVazio($frm_conteudo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Conteњdo#";
		}
		if( Validacao::isVazio($frm_status) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Status#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setNome( $frm_nome ); 
			$obj->setSemestre( $frm_semestre ); 
			$obj->setConteudo( $frm_conteudo ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setStatus( $frm_status ); 

			if($obj->alterarDisciplina()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_nome = $obj->getNome();
		$frm_semestre = $obj->getSemestre();
		$frm_conteudo = $obj->getConteudo();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_status = $obj->getStatus();
	}
?>