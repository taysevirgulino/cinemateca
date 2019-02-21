<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "video_categoria_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "video_categoria_add.php?back=$link_back";
	$link_edit = "video_categoria_edit.php?back=$link_back";
	$link_remove = "video_categoria_remove.php?back=$link_back";

	$frm_nome = System::_POST("FrmNome");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_prioridade = VideoCategoriaManage::ultimaPrioridade();
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(VideoCategoriaManage::inserirVideoCategoria(-1, null, null, $frm_nome, $frm_descricao, $frm_prioridade)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro n�o Efetuado";
			}
		}
	}
?>