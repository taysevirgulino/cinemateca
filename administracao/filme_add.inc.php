<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "filme_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "filme_add.php?back=$link_back";
	$link_edit = "filme_edit.php?back=$link_back";
	$link_remove = "filme_remove.php?back=$link_back";

	$frm_id_eixo = System::_POST("FrmIdEixo");
	$frm_id_disciplina = System::_POST("FrmIdDisciplina");
	$frm_nome = System::_POST("FrmNome");
	$frm_url = System::_POST("FrmUrl");
	$frm_url_youtube = System::_POST("FrmUrlYoutube");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjEixo = EixoManage::consultarEixo(1, "");
	$VObjDisciplina = DisciplinaManage::consultarDisciplina(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_eixo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Eixo#";
		}
		if( Validacao::isVazio($frm_id_disciplina) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Disciplina#";
		}
		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		if( Validacao::isVazio($frm_url) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Url (Endereço)#";
		}
		if( Validacao::isVazio($frm_url_youtube) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Url (Endereço) Youtube#";
		}
		if( Validacao::isVazio($frm_descricao) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Descrição#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new Filme();
			$obj->setIdEixo( $frm_id_eixo ); 
			$obj->setIdDisciplina( $frm_id_disciplina ); 
			$obj->setNome( $frm_nome ); 
			$obj->setUrl( $frm_url ); 
			$obj->setUrlYoutube( $frm_url_youtube ); 
			$obj->setDescricao( $frm_descricao ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setStatus( $frm_status ); 

			if($obj->inserirFilme()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>