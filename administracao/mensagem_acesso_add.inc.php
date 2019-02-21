<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "mensagem_acesso_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "mensagem_acesso_add.php?back=$link_back";
	$link_edit = "mensagem_acesso_edit.php?back=$link_back";
	$link_remove = "mensagem_acesso_remove.php?back=$link_back";

	$frm_id_mensagem = System::_POST("FrmIdMensagem");
	$frm_id_usuario = System::_POST("FrmIdUsuario");
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjMensagem = MensagemManage::consultarMensagem(1, "");
	$VObjUsuario = UsuarioManage::consultarUsuario(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_mensagem) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Mensagem#";
		}
		if( Validacao::isVazio($frm_id_usuario) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuário#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new MensagemAcesso();
			$obj->setIdMensagem( $frm_id_mensagem ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setStatus( $frm_status ); 

			if($obj->inserirMensagemAcesso()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>