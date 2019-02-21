<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "cronograma_tipo_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "cronograma_tipo_add.php?back=$link_back";
	$link_edit = "cronograma_tipo_edit.php?back=$link_back";
	$link_remove = "cronograma_tipo_remove.php?back=$link_back";

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_prioridade = CronogramaTipoManage::ultimaPrioridade();
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  T�tulo#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new CronogramaTipo();
			$obj->setTitulo( $frm_titulo ); 
			$obj->setPrioridade( $frm_prioridade ); 
			$obj->setStatus( $frm_status ); 

			if($obj->inserirCronogramaTipo()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro n�o Efetuado";
			}
		}
	}
?>