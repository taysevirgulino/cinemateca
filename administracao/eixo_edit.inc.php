<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "eixo_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "eixo_add.php?back=$link_back";
	$link_edit = "eixo_edit.php?id=$ID&back=$link_back";
	$link_remove = "eixo_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Eixo();
	if(!$obj->buscarEixo(1, $ID)){ System::Redirect($link_list); }

	$frm_categoria = System::_POST("FrmCategoria");
	$frm_nome = System::_POST("FrmNome");
	$frm_id_disciplina = System::_POST("FrmIdDisciplina");
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjDisciplina = DisciplinaManage::consultarDisciplina(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_categoria) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Categoria#";
		}
		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		if( Validacao::isVazio($frm_id_disciplina) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Disciplina#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setCategoria( $frm_categoria ); 
			$obj->setNome( $frm_nome ); 
			$obj->setIdDisciplina( $frm_id_disciplina ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setStatus( $frm_status ); 

			if($obj->alterarEixo()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_categoria = $obj->getCategoria();
		$frm_nome = $obj->getNome();
		$frm_id_disciplina = $obj->getIdDisciplina();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_status = $obj->getStatus();
	}
?>