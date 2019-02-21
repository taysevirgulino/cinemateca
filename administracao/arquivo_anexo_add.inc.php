<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "arquivo_anexo_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "arquivo_anexo_add.php?back=$link_back";
	$link_edit = "arquivo_anexo_edit.php?back=$link_back";
	$link_remove = "arquivo_anexo_remove.php?back=$link_back";

	$frm_id_arquivo_file = $_FILES["FrmIdArquivoFile"];
	$frm_id_arquivo_historico_file = $_FILES["FrmIdArquivoHistoricoFile"];
	$frm_arquivo_file = $_FILES["FrmArquivoFile"];
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjArquivo = ArquivoManage::consultarArquivo(1, "");
	$VObjArquivoHistorico = ArquivoHistoricoManage::consultarArquivoHistorico(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_datahora) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Data/Hora#";
		}
		$frm_id_arquivo = "";
		if( ! Validacao::isVazio($frm_id_arquivo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_id_arquivo_file, "../files/arquivo_anexo/$prename", 1)){
				$frm_id_arquivo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}else{
			$label_alerta_erro .="Preencha/Selecione o(a)  Id Arquivo#";
		}
		$frm_id_arquivo_historico = "";
		if( ! Validacao::isVazio($frm_id_arquivo_historico_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_id_arquivo_historico_file, "../files/arquivo_anexo/$prename", 1)){
				$frm_id_arquivo_historico = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}else{
			$label_alerta_erro .="Preencha/Selecione o(a)  Id Arquivo Histórico#";
		}
		$frm_arquivo = "";
		if( ! Validacao::isVazio($frm_arquivo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_arquivo_file, "../files/arquivo_anexo/$prename", 1)){
				$frm_arquivo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}else{
			$label_alerta_erro .="Preencha/Selecione o(a)  Arquivo#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new ArquivoAnexo();
			$obj->setIdArquivo( $frm_id_arquivo ); 
			$obj->setIdArquivoHistorico( $frm_id_arquivo_historico ); 
			$obj->setArquivo( $frm_arquivo ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );

			if($obj->inserirArquivoAnexo()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>