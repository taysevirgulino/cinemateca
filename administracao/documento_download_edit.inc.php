<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "documento_download_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "documento_download_add.php?back=$link_back";
	$link_edit = "documento_download_edit.php?id=$ID&back=$link_back";
	$link_remove = "documento_download_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new DocumentoDownload();
	if(!$obj->buscarDocumentoDownload(1, $ID)){ System::Redirect($link_list); }

	$frm_id_documento = System::_POST("FrmIdDocumento");
	$frm_id_usuario = System::_POST("FrmIdUsuario");
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
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
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuсrio#";
		}
		if( Validacao::isVazio($frm_datahora) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Data/Hora#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setIdDocumento( $frm_id_documento ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setIp( $frm_ip ); 

			if($obj->alterarDocumentoDownload()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_documento = $obj->getIdDocumento();
		$frm_id_usuario = $obj->getIdUsuario();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_ip = $obj->getIp();
	}
?>