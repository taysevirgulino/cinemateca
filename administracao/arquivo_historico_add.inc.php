<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "arquivo_historico_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "arquivo_historico_add.php?back=$link_back";
	$link_edit = "arquivo_historico_edit.php?back=$link_back";
	$link_remove = "arquivo_historico_remove.php?back=$link_back";

	$frm_id_arquivo_file = $_FILES["FrmIdArquivoFile"];
	$frm_id_arquivo_tipo_file = $_FILES["FrmIdArquivoTipoFile"];
	$frm_id_usuario = System::_POST("FrmIdUsuario");
	$frm_id_usuario_responsavel = System::_POST("FrmIdUsuarioResponsavel");
	$frm_texto = System::_POST("FrmTexto");
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
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
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuário#";
		}
		if( Validacao::isVazio($frm_id_usuario_responsavel) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuário#";
		}
		if( Validacao::isVazio($frm_texto) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Texto#";
		}
		if( Validacao::isVazio($frm_datahora) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Data/Hora#";
		}
		$frm_id_arquivo = "";
		if( ! Validacao::isVazio($frm_id_arquivo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_id_arquivo_file, "../files/arquivo_historico/$prename", 1)){
				$frm_id_arquivo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}else{
			$label_alerta_erro .="Preencha/Selecione o(a)  Id Arquivo#";
		}
		$frm_id_arquivo_tipo = "";
		if( ! Validacao::isVazio($frm_id_arquivo_tipo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_id_arquivo_tipo_file, "../files/arquivo_historico/$prename", 1)){
				$frm_id_arquivo_tipo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}else{
			$label_alerta_erro .="Preencha/Selecione o(a)  Id Arquivo Tipo#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new ArquivoHistorico();
			$obj->setIdArquivo( $frm_id_arquivo ); 
			$obj->setIdArquivoTipo( $frm_id_arquivo_tipo ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setIdUsuarioResponsavel( $frm_id_usuario_responsavel ); 
			$obj->setTexto( $frm_texto ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setStatus( $frm_status ); 

			if($obj->inserirArquivoHistorico()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>