<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "segmento_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "segmento_add.php?back=$link_back";
	$link_edit = "segmento_edit.php?back=$link_back";
	$link_remove = "segmento_remove.php?back=$link_back";

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_cor = System::_POST("FrmCor");
	$frm_prioridade = SegmentoManage::ultimaPrioridade();
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Título#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new Segmento();
			$obj->setTitulo( $frm_titulo ); 
			$obj->setCor( $frm_cor ); 
			$obj->setPrioridade( $frm_prioridade ); 

			if($obj->inserirSegmento()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>