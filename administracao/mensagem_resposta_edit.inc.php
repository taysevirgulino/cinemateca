<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "mensagem_resposta_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "mensagem_resposta_add.php?back=$link_back";
	$link_edit = "mensagem_resposta_edit.php?id=$ID&back=$link_back";
	$link_remove = "mensagem_resposta_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new MensagemResposta();
	if(!$obj->buscarMensagemResposta(1, $ID)){ System::Redirect($link_list); }

	$frm_id_mensagem = System::_POST("FrmIdMensagem");
	$frm_id_usuario = System::_POST("FrmIdUsuario");
	$frm_texto = System::_POST("FrmTexto");
	$frm_arquivo_file = $_FILES["FrmArquivoFile"];
	$frm_arquivo_remove = System::_POST("FrmArquivoRemove");
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
	$frm_ip = System::_POST("FrmIp");
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
		if( Validacao::isVazio($frm_texto) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Texto#";
		}
		$frm_arquivo = ((!empty($frm_arquivo_remove)) ? "" : $obj->getArquivo() );
		if( ! Validacao::isVazio($frm_arquivo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_arquivo_file, "../files/mensagem_resposta/$prename", 1)){
				$frm_arquivo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setIdMensagem( $frm_id_mensagem ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setTexto( $frm_texto ); 
			$obj->setArquivo( $frm_arquivo ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setIp( $frm_ip ); 

			if($obj->alterarMensagemResposta()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_mensagem = $obj->getIdMensagem();
		$frm_id_usuario = $obj->getIdUsuario();
		$frm_texto = System::_TextByHtml($obj->getTexto());
		$frm_arquivo = $obj->getArquivo();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_ip = $obj->getIp();
	}
?>