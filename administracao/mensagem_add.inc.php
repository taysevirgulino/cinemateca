<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "mensagem_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "mensagem_add.php?back=$link_back";
	$link_edit = "mensagem_edit.php?back=$link_back";
	$link_remove = "mensagem_remove.php?back=$link_back";

	$frm_id_empreendimento = System::_POST("FrmIdEmpreendimento");
	$frm_id_lojista = System::_POST("FrmIdLojista");
	$frm_id_usuario_remetente = System::_POST("FrmIdUsuarioRemetente");
	$frm_id_usuario_destinatario = System::_POST("FrmIdUsuarioDestinatario");
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_texto = System::_POST("FrmTexto");
	$frm_arquivo_file = $_FILES["FrmArquivoFile"];
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
	$frm_datahora_edicao = System::_POST("FrmDatahoraEdicao");
	$frm_ip = System::_POST("FrmIp");
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjEmpreendimento = EmpreendimentoManage::consultarEmpreendimento(1, "");
	$VObjLojista = LojistaManage::consultarLojista(1, "");
	$VObjUsuario = UsuarioManage::consultarUsuario(1, "");
	$VObjUsuario = UsuarioManage::consultarUsuario(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_empreendimento) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Empreendimento#";
		}
		if( Validacao::isVazio($frm_id_lojista) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Lojista#";
		}
		if( Validacao::isVazio($frm_id_usuario_remetente) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuário#";
		}
		if( Validacao::isVazio($frm_id_usuario_destinatario) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuário#";
		}
		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Título#";
		}
		if( Validacao::isVazio($frm_texto) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Texto#";
		}
		$frm_arquivo = "";
		if( ! Validacao::isVazio($frm_arquivo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_arquivo_file, "../files/mensagem/$prename", 1)){
				$frm_arquivo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new Mensagem();
			$obj->setIdEmpreendimento( $frm_id_empreendimento ); 
			$obj->setIdLojista( $frm_id_lojista ); 
			$obj->setIdUsuarioRemetente( $frm_id_usuario_remetente ); 
			$obj->setIdUsuarioDestinatario( $frm_id_usuario_destinatario ); 
			$obj->setTitulo( $frm_titulo ); 
			$obj->setTexto( $frm_texto ); 
			$obj->setArquivo( $frm_arquivo ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setDatahoraEdicao( System::FormatarData($frm_datahora_edicao, "Y-m-d H:i:s") );
			$obj->setIp( $frm_ip ); 
			$obj->setStatus( $frm_status ); 

			if($obj->inserirMensagem()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>