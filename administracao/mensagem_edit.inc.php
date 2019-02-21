<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "mensagem_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "mensagem_add.php?back=$link_back";
	$link_edit = "mensagem_edit.php?id=$ID&back=$link_back";
	$link_remove = "mensagem_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Mensagem();
	if(!$obj->buscarMensagem(1, $ID)){ System::Redirect($link_list); }

	$frm_id_empreendimento = System::_POST("FrmIdEmpreendimento");
	$frm_id_lojista = System::_POST("FrmIdLojista");
	$frm_id_usuario_remetente = System::_POST("FrmIdUsuarioRemetente");
	$frm_id_usuario_destinatario = System::_POST("FrmIdUsuarioDestinatario");
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_texto = System::_POST("FrmTexto");
	$frm_arquivo_file = $_FILES["FrmArquivoFile"];
	$frm_arquivo_remove = System::_POST("FrmArquivoRemove");
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
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
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuбrio#";
		}
		if( Validacao::isVazio($frm_id_usuario_destinatario) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuбrio#";
		}
		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Tнtulo#";
		}
		if( Validacao::isVazio($frm_texto) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Texto#";
		}
		$frm_arquivo = ((!empty($frm_arquivo_remove)) ? "" : $obj->getArquivo() );
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

			if($obj->alterarMensagem()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_id_empreendimento = $obj->getIdEmpreendimento();
		$frm_id_lojista = $obj->getIdLojista();
		$frm_id_usuario_remetente = $obj->getIdUsuarioRemetente();
		$frm_id_usuario_destinatario = $obj->getIdUsuarioDestinatario();
		$frm_titulo = $obj->getTitulo();
		$frm_texto = System::_TextByHtml($obj->getTexto());
		$frm_arquivo = $obj->getArquivo();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_datahora_edicao = System::FormatarData($obj->getDatahoraEdicao(), "d/m/Y H:i:s");
		$frm_ip = $obj->getIp();
		$frm_status = $obj->getStatus();
	}
?>