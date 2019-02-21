<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "arquivo_download_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "arquivo_download_add.php?back=$link_back";
	$link_edit = "arquivo_download_edit.php?back=$link_back";
	$link_remove = "arquivo_download_remove.php?back=$link_back";

	$frm_id_arquivo_anexo_file = $_FILES["FrmIdArquivoAnexoFile"];
	$frm_id_usuario = System::_POST("FrmIdUsuario");
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
	$frm_ip = System::_POST("FrmIp");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjArquivoAnexo = ArquivoAnexoManage::consultarArquivoAnexo(1, "");
	$VObjUsuario = UsuarioManage::consultarUsuario(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_usuario) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuário#";
		}
		if( Validacao::isVazio($frm_datahora) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Data/Hora#";
		}
		if( Validacao::isVazio($frm_ip) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Ip#";
		}
		$frm_id_arquivo_anexo = "";
		if( ! Validacao::isVazio($frm_id_arquivo_anexo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_id_arquivo_anexo_file, "../files/arquivo_download/$prename", 1)){
				$frm_id_arquivo_anexo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}else{
			$label_alerta_erro .="Preencha/Selecione o(a)  Id Arquivo Anexo#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new ArquivoDownload();
			$obj->setIdArquivoAnexo( $frm_id_arquivo_anexo ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setIp( $frm_ip ); 

			if($obj->inserirArquivoDownload()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>