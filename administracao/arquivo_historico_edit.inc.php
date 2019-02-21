<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "arquivo_historico_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "arquivo_historico_add.php?back=$link_back";
	$link_edit = "arquivo_historico_edit.php?id=$ID&back=$link_back";
	$link_remove = "arquivo_historico_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new ArquivoHistorico();
	if(!$obj->buscarArquivoHistorico(1, $ID)){ System::Redirect($link_list); }

	$frm_id_arquivo_file = $_FILES["FrmIdArquivoFile"];
	$frm_id_arquivo_remove = System::_POST("FrmIdArquivoRemove");
	$frm_id_arquivo_tipo_file = $_FILES["FrmIdArquivoTipoFile"];
	$frm_id_arquivo_tipo_remove = System::_POST("FrmIdArquivoTipoRemove");
	$frm_id_usuario = System::_POST("FrmIdUsuario");
	$frm_id_usuario_responsavel = System::_POST("FrmIdUsuarioResponsavel");
	$frm_texto = System::_POST("FrmTexto");
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjArquivo = ArquivoManage::consultarArquivo(1, "");
	$VObjArquivo = ArquivoManage::consultarArquivo(1, "");
	$VObjUsuario = UsuarioManage::consultarUsuario(1, "");
	$VObjUsuario = UsuarioManage::consultarUsuario(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_usuario) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuсrio#";
		}
		if( Validacao::isVazio($frm_id_usuario_responsavel) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuсrio#";
		}
		if( Validacao::isVazio($frm_texto) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Texto#";
		}
		if( Validacao::isVazio($frm_datahora) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Data/Hora#";
		}
		$frm_id_arquivo = ((!empty($frm_id_arquivo_remove)) ? "" : $obj->getIdArquivo() );
		if( ! Validacao::isVazio($frm_id_arquivo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_id_arquivo_file, "../files/arquivo_historico/$prename", 1)){
				$frm_id_arquivo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}
		$frm_id_arquivo_tipo = ((!empty($frm_id_arquivo_tipo_remove)) ? "" : $obj->getIdArquivoTipo() );
		if( ! Validacao::isVazio($frm_id_arquivo_tipo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_id_arquivo_tipo_file, "../files/arquivo_historico/$prename", 1)){
				$frm_id_arquivo_tipo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setIdArquivo( $frm_id_arquivo ); 
			$obj->setIdArquivoTipo( $frm_id_arquivo_tipo ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setIdUsuarioResponsavel( $frm_id_usuario_responsavel ); 
			$obj->setTexto( $frm_texto ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setStatus( $frm_status ); 

			if($obj->alterarArquivoHistorico()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_arquivo = $obj->getIdArquivo();
		$frm_id_arquivo_tipo = $obj->getIdArquivoTipo();
		$frm_id_usuario = $obj->getIdUsuario();
		$frm_id_usuario_responsavel = $obj->getIdUsuarioResponsavel();
		$frm_texto = System::_TextByHtml($obj->getTexto());
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_status = $obj->getStatus();
	}
?>