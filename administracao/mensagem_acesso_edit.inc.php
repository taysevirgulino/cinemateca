<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "mensagem_acesso_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "mensagem_acesso_add.php?back=$link_back";
	$link_edit = "mensagem_acesso_edit.php?id=$ID&back=$link_back";
	$link_remove = "mensagem_acesso_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new MensagemAcesso();
	if(!$obj->buscarMensagemAcesso(1, $ID)){ System::Redirect($link_list); }

	$frm_id_mensagem = System::_POST("FrmIdMensagem");
	$frm_id_usuario = System::_POST("FrmIdUsuario");
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
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
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuсrio#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setIdMensagem( $frm_id_mensagem ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setStatus( $frm_status ); 

			if($obj->alterarMensagemAcesso()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_mensagem = $obj->getIdMensagem();
		$frm_id_usuario = $obj->getIdUsuario();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_status = $obj->getStatus();
	}
?>