<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "cronograma_farol_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "cronograma_farol_add.php?back=$link_back";
	$link_edit = "cronograma_farol_edit.php?back=$link_back";
	$link_remove = "cronograma_farol_remove.php?back=$link_back";

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_cor = System::_POST("FrmCor");
	$frm_peso = System::_POST("FrmPeso");
	$frm_prioridade = CronogramaFarolManage::ultimaPrioridade();
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  T�tulo#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new CronogramaFarol();
			$obj->setTitulo( $frm_titulo ); 
			$obj->setCor( $frm_cor ); 
			$obj->setPeso( $frm_peso ); 
			$obj->setPrioridade( $frm_prioridade ); 

			if($obj->inserirCronogramaFarol()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro n�o Efetuado";
			}
		}
	}
?>