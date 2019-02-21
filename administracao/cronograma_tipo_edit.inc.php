<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "cronograma_tipo_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "cronograma_tipo_add.php?back=$link_back";
	$link_edit = "cronograma_tipo_edit.php?id=$ID&back=$link_back";
	$link_remove = "cronograma_tipo_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new CronogramaTipo();
	if(!$obj->buscarCronogramaTipo(1, $ID)){ System::Redirect($link_list); }

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_prioridade = $obj->getPrioridade();
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Tнtulo#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setTitulo( $frm_titulo ); 
			$obj->setPrioridade( $frm_prioridade ); 
			$obj->setStatus( $frm_status ); 

			if($obj->alterarCronogramaTipo()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_titulo = $obj->getTitulo();
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = $obj->getStatus();
	}
?>