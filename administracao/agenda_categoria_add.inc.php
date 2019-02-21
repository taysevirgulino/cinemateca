<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "agenda_categoria_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "agenda_categoria_add.php?back=$link_back";
	$link_edit = "agenda_categoria_edit.php?back=$link_back";
	$link_remove = "agenda_categoria_remove.php?back=$link_back";

	$frm_nome = System::_POST("FrmNome");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_prioridade = AgendaCategoriaManage::ultimaPrioridade();
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(AgendaCategoriaManage::inserirAgendaCategoria(-1, null, null, $frm_nome, $frm_descricao, $frm_prioridade)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>