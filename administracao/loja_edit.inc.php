<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "loja_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "loja_add.php?back=$link_back";
	$link_edit = "loja_edit.php?id=$ID&back=$link_back";
	$link_remove = "loja_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Loja();
	if(!$obj->buscarLoja(1, $ID)){ System::Redirect($link_list); }

	$frm_id_empreendimento = System::_POST("FrmIdEmpreendimento");
	$frm_id_segmento = System::_POST("FrmIdSegmento");
	$frm_numero = System::_POST("FrmNumero");
	$frm_pavimento = System::_POST("FrmPavimento");
	$frm_area = System::_POST("FrmArea");
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjEmpreendimento = EmpreendimentoManage::consultarEmpreendimento(1, "");
	$VObjSegmento = SegmentoManage::consultarSegmento(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_empreendimento) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Empreendimento#";
		}
		if( Validacao::isVazio($frm_id_segmento) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Segmento#";
		}
		if( Validacao::isVazio($frm_numero) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nъmero#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setIdEmpreendimento( $frm_id_empreendimento ); 
			$obj->setIdSegmento( $frm_id_segmento ); 
			$obj->setNumero( $frm_numero ); 
			$obj->setPavimento( $frm_pavimento ); 
			$obj->setArea( System::ConverterDouble($frm_area) ); 
			$obj->setStatus( $frm_status ); 

			if($obj->alterarLoja()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_id_empreendimento = $obj->getIdEmpreendimento();
		$frm_id_segmento = $obj->getIdSegmento();
		$frm_numero = $obj->getNumero();
		$frm_pavimento = $obj->getPavimento();
		$frm_area = System::FormatarValor($obj->getArea());
		$frm_status = $obj->getStatus();
	}
?>