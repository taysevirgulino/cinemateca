<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "associado_plano_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "associado_plano_add.php?back=$link_back";
	$link_edit = "associado_plano_edit.php?back=$link_back";
	$link_remove = "associado_plano_remove.php?back=$link_back";

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_valor = System::_POST("FrmValor");
	$frm_prorata = System::_POST("FrmProrata");
	$frm_recorrencia = System::_POST("FrmRecorrencia");
	$frm_prioridade = AssociadoPlanoManage::ultimaPrioridade();
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

			$obj = new AssociadoPlano();
			$obj->setTitulo( $frm_titulo ); 
			$obj->setDescricao( $frm_descricao ); 
			$obj->setValor( $frm_valor ); 
			$obj->setProrata( $frm_prorata ); 
			$obj->setRecorrencia( $frm_recorrencia ); 
			$obj->setPrioridade( $frm_prioridade ); 
			$obj->setStatus( $frm_status ); 

			if($obj->inserirAssociadoPlano()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>