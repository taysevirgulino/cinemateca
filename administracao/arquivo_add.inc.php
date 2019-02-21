<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "arquivo_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "arquivo_add.php?back=$link_back";
	$link_edit = "arquivo_edit.php?back=$link_back";
	$link_remove = "arquivo_remove.php?back=$link_back";

	$frm_id_lojista = System::_POST("FrmIdLojista");
	$frm_id_lojista_pessoa = System::_POST("FrmIdLojistaPessoa");
	$frm_id_arquivo_disciplina_file = $_FILES["FrmIdArquivoDisciplinaFile"];
	$frm_id_arquivo_tipo_file = $_FILES["FrmIdArquivoTipoFile"];
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_texto = System::_POST("FrmTexto");
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
	$frm_datahora_edicao = System::_POST("FrmDatahoraEdicao");
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjLojista = LojistaManage::consultarLojista(1, "");
	$VObjLojistaPessoa = LojistaPessoaManage::consultarLojistaPessoa(1, "");
	$VObjArquivoDisciplina = ArquivoDisciplinaManage::consultarArquivoDisciplina(1, "");
	$VObjArquivo = ArquivoManage::consultarArquivo(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_lojista) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Lojista#";
		}
		if( Validacao::isVazio($frm_id_lojista_pessoa) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Lojista Pessoa#";
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
		$frm_id_arquivo_disciplina = "";
		if( ! Validacao::isVazio($frm_id_arquivo_disciplina_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_id_arquivo_disciplina_file, "../files/arquivo/$prename", 1)){
				$frm_id_arquivo_disciplina = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}else{
			$label_alerta_erro .="Preencha/Selecione o(a)  Id Arquivo Disciplina#";
		}
		$frm_id_arquivo_tipo = "";
		if( ! Validacao::isVazio($frm_id_arquivo_tipo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_id_arquivo_tipo_file, "../files/arquivo/$prename", 1)){
				$frm_id_arquivo_tipo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}else{
			$label_alerta_erro .="Preencha/Selecione o(a)  Id Arquivo Tipo#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new Arquivo();
			$obj->setIdLojista( $frm_id_lojista ); 
			$obj->setIdLojistaPessoa( $frm_id_lojista_pessoa ); 
			$obj->setIdArquivoDisciplina( $frm_id_arquivo_disciplina ); 
			$obj->setIdArquivoTipo( $frm_id_arquivo_tipo ); 
			$obj->setTitulo( $frm_titulo ); 
			$obj->setTexto( $frm_texto ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setDatahoraEdicao( System::FormatarData($frm_datahora_edicao, "Y-m-d H:i:s") );
			$obj->setStatus( $frm_status ); 

			if($obj->inserirArquivo()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro nгo Efetuado";
			}
		}
	}
?>