<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "arquivo_tipo_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "arquivo_tipo_add.php?back=$link_back";
	$link_edit = "arquivo_tipo_edit.php?back=$link_back";
	$link_remove = "arquivo_tipo_remove.php?back=$link_back";

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_prioridade = ArquivoTipoManage::ultimaPrioridade();
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Título#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new ArquivoTipo();
			$obj->setTitulo( $frm_titulo ); 
			$obj->setPrioridade( $frm_prioridade ); 
			$obj->setStatus( $frm_status ); 

			if($obj->inserirArquivoTipo()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>