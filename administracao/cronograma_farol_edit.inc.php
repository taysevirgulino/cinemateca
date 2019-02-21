<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "cronograma_farol_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "cronograma_farol_add.php?back=$link_back";
	$link_edit = "cronograma_farol_edit.php?id=$ID&back=$link_back";
	$link_remove = "cronograma_farol_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new CronogramaFarol();
	if(!$obj->buscarCronogramaFarol(1, $ID)){ System::Redirect($link_list); }

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_cor = System::_POST("FrmCor");
	$frm_peso = System::_POST("FrmPeso");
	$frm_prioridade = $obj->getPrioridade();
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
			$obj->setCor( $frm_cor ); 
			$obj->setPeso( $frm_peso ); 
			$obj->setPrioridade( $frm_prioridade ); 

			if($obj->alterarCronogramaFarol()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_titulo = $obj->getTitulo();
		$frm_cor = $obj->getCor();
		$frm_peso = $obj->getPeso();
		$frm_prioridade = $obj->getPrioridade();
	}
?>