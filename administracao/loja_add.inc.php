<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "loja_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "loja_add.php?back=$link_back";
	$link_edit = "loja_edit.php?back=$link_back";
	$link_remove = "loja_remove.php?back=$link_back";

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
			$label_alerta_erro .="Preencha/Selecione o(a)  Número#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new Loja();
			$obj->setIdEmpreendimento( $frm_id_empreendimento ); 
			$obj->setIdSegmento( $frm_id_segmento ); 
			$obj->setNumero( $frm_numero ); 
			$obj->setPavimento( $frm_pavimento ); 
			$obj->setArea( System::ConverterDouble($frm_area) ); 
			$obj->setStatus( $frm_status ); 

			if($obj->inserirLoja()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>