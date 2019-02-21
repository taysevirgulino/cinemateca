<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "cronograma_etapa_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "cronograma_etapa_add.php?back=$link_back";
	$link_edit = "cronograma_etapa_edit.php?id=$ID&back=$link_back";
	$link_remove = "cronograma_etapa_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new CronogramaEtapa();
	if(!$obj->buscarCronogramaEtapa(1, $ID)){ System::Redirect($link_list); }

	$frm_id_cronograma_tipo = System::_POST("FrmIdCronogramaTipo");
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_porcentagem = System::_POST("FrmPorcentagem");
	$frm_prioridade = $obj->getPrioridade();
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjCronogramaTipo = CronogramaTipoManage::consultarCronogramaTipo(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_cronograma_tipo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Cronograma Tipo#";
		}
		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Tнtulo#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setIdCronogramaTipo( $frm_id_cronograma_tipo ); 
			$obj->setTitulo( $frm_titulo ); 
			$obj->setDescricao( $frm_descricao ); 
			$obj->setPorcentagem( $frm_porcentagem ); 
			$obj->setPrioridade( $frm_prioridade ); 
			$obj->setStatus( $frm_status ); 

			if($obj->alterarCronogramaEtapa()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_id_cronograma_tipo = $obj->getIdCronogramaTipo();
		$frm_titulo = $obj->getTitulo();
		$frm_descricao = $obj->getDescricao();
		$frm_porcentagem = $obj->getPorcentagem();
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = $obj->getStatus();
	}
?>