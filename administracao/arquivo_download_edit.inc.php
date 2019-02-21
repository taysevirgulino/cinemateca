<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "arquivo_download_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "arquivo_download_add.php?back=$link_back";
	$link_edit = "arquivo_download_edit.php?id=$ID&back=$link_back";
	$link_remove = "arquivo_download_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new ArquivoDownload();
	if(!$obj->buscarArquivoDownload(1, $ID)){ System::Redirect($link_list); }

	$frm_id_arquivo_anexo_file = $_FILES["FrmIdArquivoAnexoFile"];
	$frm_id_arquivo_anexo_remove = System::_POST("FrmIdArquivoAnexoRemove");
	$frm_id_usuario = System::_POST("FrmIdUsuario");
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
	$frm_ip = System::_POST("FrmIp");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjArquivoAnexo = ArquivoAnexoManage::consultarArquivoAnexo(1, "");
	$VObjUsuario = UsuarioManage::consultarUsuario(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_usuario) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuсrio#";
		}
		if( Validacao::isVazio($frm_datahora) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Data/Hora#";
		}
		if( Validacao::isVazio($frm_ip) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Ip#";
		}
		$frm_id_arquivo_anexo = ((!empty($frm_id_arquivo_anexo_remove)) ? "" : $obj->getIdArquivoAnexo() );
		if( ! Validacao::isVazio($frm_id_arquivo_anexo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_id_arquivo_anexo_file, "../files/arquivo_download/$prename", 1)){
				$frm_id_arquivo_anexo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setIdArquivoAnexo( $frm_id_arquivo_anexo ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setIp( $frm_ip ); 

			if($obj->alterarArquivoDownload()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_arquivo_anexo = $obj->getIdArquivoAnexo();
		$frm_id_usuario = $obj->getIdUsuario();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_ip = $obj->getIp();
	}
?>