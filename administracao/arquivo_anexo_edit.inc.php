<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "arquivo_anexo_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "arquivo_anexo_add.php?back=$link_back";
	$link_edit = "arquivo_anexo_edit.php?id=$ID&back=$link_back";
	$link_remove = "arquivo_anexo_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new ArquivoAnexo();
	if(!$obj->buscarArquivoAnexo(1, $ID)){ System::Redirect($link_list); }

	$frm_id_arquivo_file = $_FILES["FrmIdArquivoFile"];
	$frm_id_arquivo_remove = System::_POST("FrmIdArquivoRemove");
	$frm_id_arquivo_historico_file = $_FILES["FrmIdArquivoHistoricoFile"];
	$frm_id_arquivo_historico_remove = System::_POST("FrmIdArquivoHistoricoRemove");
	$frm_arquivo_file = $_FILES["FrmArquivoFile"];
	$frm_arquivo_remove = System::_POST("FrmArquivoRemove");
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
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
		$frm_id_arquivo = ((!empty($frm_id_arquivo_remove)) ? "" : $obj->getIdArquivo() );
		if( ! Validacao::isVazio($frm_id_arquivo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_id_arquivo_file, "../files/arquivo_anexo/$prename", 1)){
				$frm_id_arquivo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}
		$frm_id_arquivo_historico = ((!empty($frm_id_arquivo_historico_remove)) ? "" : $obj->getIdArquivoHistorico() );
		if( ! Validacao::isVazio($frm_id_arquivo_historico_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_id_arquivo_historico_file, "../files/arquivo_anexo/$prename", 1)){
				$frm_id_arquivo_historico = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}
		$frm_arquivo = ((!empty($frm_arquivo_remove)) ? "" : $obj->getArquivo() );
		if( ! Validacao::isVazio($frm_arquivo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_arquivo_file, "../files/arquivo_anexo/$prename", 1)){
				$frm_arquivo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setIdArquivo( $frm_id_arquivo ); 
			$obj->setIdArquivoHistorico( $frm_id_arquivo_historico ); 
			$obj->setArquivo( $frm_arquivo ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );

			if($obj->alterarArquivoAnexo()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_arquivo = $obj->getIdArquivo();
		$frm_id_arquivo_historico = $obj->getIdArquivoHistorico();
		$frm_arquivo = $obj->getArquivo();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
	}
?>