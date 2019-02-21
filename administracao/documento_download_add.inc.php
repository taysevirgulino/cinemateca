<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "documento_download_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "documento_download_add.php?back=$link_back";
	$link_edit = "documento_download_edit.php?back=$link_back";
	$link_remove = "documento_download_remove.php?back=$link_back";

	$frm_id_documento = System::_POST("FrmIdDocumento");
	$frm_id_usuario = System::_POST("FrmIdUsuario");
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
	$frm_ip = System::_POST("FrmIp");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjDocumento = DocumentoManage::consultarDocumento(1, "");
	$VObjUsuario = UsuarioManage::consultarUsuario(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_documento) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Documento#";
		}
		if( Validacao::isVazio($frm_id_usuario) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuário#";
		}
		if( Validacao::isVazio($frm_datahora) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Data/Hora#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new DocumentoDownload();
			$obj->setIdDocumento( $frm_id_documento ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setIp( $frm_ip ); 

			if($obj->inserirDocumentoDownload()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>