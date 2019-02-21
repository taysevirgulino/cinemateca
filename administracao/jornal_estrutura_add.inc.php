<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "jornal_estrutura_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "jornal_estrutura_add.php?back=$link_back";
	$link_edit = "jornal_estrutura_edit.php?back=$link_back";
	$link_remove = "jornal_estrutura_remove.php?back=$link_back";

	$frm_nome = System::_POST("FrmNome");
	$frm_prioridade = JornalEstruturaManage::ultimaPrioridade();
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new JornalEstrutura();
			$obj->setNome( $frm_nome ); 
			$obj->setPrioridade( $frm_prioridade ); 

			if($obj->inserirJornalEstrutura()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>