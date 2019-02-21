<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "arquivo_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "arquivo_add.php?back=$link_back";
	$link_edit = "arquivo_edit.php?id=$ID&back=$link_back";
	$link_remove = "arquivo_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Arquivo();
	if(!$obj->buscarArquivo(1, $ID)){ System::Redirect($link_list); }

	$frm_id_lojista = System::_POST("FrmIdLojista");
	$frm_id_arquivo_disciplina_file = $_FILES["FrmIdArquivoDisciplinaFile"];
	$frm_id_arquivo_disciplina_remove = System::_POST("FrmIdArquivoDisciplinaRemove");
	$frm_id_arquivo_tipo_file = $_FILES["FrmIdArquivoTipoFile"];
	$frm_id_arquivo_tipo_remove = System::_POST("FrmIdArquivoTipoRemove");
	$frm_id_usuario = System::_POST("FrmIdUsuario");
	$frm_id_usuario_responsavel = System::_POST("FrmIdUsuarioResponsavel");
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_texto = System::_POST("FrmTexto");
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
	$frm_datahora_edicao = System::_POST("FrmDatahoraEdicao");
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjLojista = LojistaManage::consultarLojista(1, "");
	$VObjArquivoDisciplina = ArquivoDisciplinaManage::consultarArquivoDisciplina(1, "");
	$VObjArquivo = ArquivoManage::consultarArquivo(1, "");
	$VObjUsuario = UsuarioManage::consultarUsuario(1, "");
	$VObjUsuario = UsuarioManage::consultarUsuario(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_lojista) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Lojista#";
		}
		if( Validacao::isVazio($frm_id_usuario) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuбrio#";
		}
		if( Validacao::isVazio($frm_id_usuario_responsavel) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuбrio#";
		}
		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Tнtulo#";
		}
		if( Validacao::isVazio($frm_datahora) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Data/Hora#";
		}
		if( Validacao::isVazio($frm_datahora_edicao) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Data/Hora Ediзгo#";
		}
		$frm_id_arquivo_disciplina = ((!empty($frm_id_arquivo_disciplina_remove)) ? "" : $obj->getIdArquivoDisciplina() );
		if( ! Validacao::isVazio($frm_id_arquivo_disciplina_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_id_arquivo_disciplina_file, "../files/arquivo/$prename", 1)){
				$frm_id_arquivo_disciplina = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}
		$frm_id_arquivo_tipo = ((!empty($frm_id_arquivo_tipo_remove)) ? "" : $obj->getIdArquivoTipo() );
		if( ! Validacao::isVazio($frm_id_arquivo_tipo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_id_arquivo_tipo_file, "../files/arquivo/$prename", 1)){
				$frm_id_arquivo_tipo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setIdLojista( $frm_id_lojista ); 
			$obj->setIdArquivoDisciplina( $frm_id_arquivo_disciplina ); 
			$obj->setIdArquivoTipo( $frm_id_arquivo_tipo ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setIdUsuarioResponsavel( $frm_id_usuario_responsavel ); 
			$obj->setTitulo( $frm_titulo ); 
			$obj->setTexto( $frm_texto ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setDatahoraEdicao( System::FormatarData($frm_datahora_edicao, "Y-m-d H:i:s") );
			$obj->setStatus( $frm_status ); 

			if($obj->alterarArquivo()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_id_lojista = $obj->getIdLojista();
		$frm_id_arquivo_disciplina = $obj->getIdArquivoDisciplina();
		$frm_id_arquivo_tipo = $obj->getIdArquivoTipo();
		$frm_id_usuario = $obj->getIdUsuario();
		$frm_id_usuario_responsavel = $obj->getIdUsuarioResponsavel();
		$frm_titulo = $obj->getTitulo();
		$frm_texto = System::_TextByHtml($obj->getTexto());
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_datahora_edicao = System::FormatarData($obj->getDatahoraEdicao(), "d/m/Y H:i:s");
		$frm_status = $obj->getStatus();
	}
?>