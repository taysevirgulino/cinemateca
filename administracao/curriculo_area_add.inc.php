<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "curriculo_area_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "curriculo_area_add.php?back=$link_back";
	$link_edit = "curriculo_area_edit.php?back=$link_back";
	$link_remove = "curriculo_area_remove.php?back=$link_back";

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_prioridade = CurriculoAreaManage::ultimaPrioridade();
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

			$obj = new CurriculoArea();
			$obj->setTitulo( $frm_titulo ); 
			$obj->setPrioridade( $frm_prioridade ); 
			$obj->setStatus( $frm_status ); 

			if($obj->inserirCurriculoArea()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}else{
	    $frm_status = 1;
	}
?>