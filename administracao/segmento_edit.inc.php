<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "segmento_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "segmento_add.php?back=$link_back";
	$link_edit = "segmento_edit.php?id=$ID&back=$link_back";
	$link_remove = "segmento_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Segmento();
	if(!$obj->buscarSegmento(1, $ID)){ System::Redirect($link_list); }

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_cor = System::_POST("FrmCor");
	$frm_prioridade = $obj->getPrioridade();
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  T�tulo#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setTitulo( $frm_titulo ); 
			$obj->setCor( $frm_cor ); 
			$obj->setPrioridade( $frm_prioridade ); 

			if($obj->alterarSegmento()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Altera��o n�o Efetuada";
			}
		}
	}else{
		$frm_titulo = $obj->getTitulo();
		$frm_cor = $obj->getCor();
		$frm_prioridade = $obj->getPrioridade();
	}
?>