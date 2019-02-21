<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "artigo_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "artigo_add.php?back=$link_back";
	$link_edit = "artigo_edit.php?id=$ID&back=$link_back";
	$link_remove = "artigo_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Artigo();
	if(!$obj->buscarArtigo(1, $ID)){ System::Redirect($link_list); }

	$frm_id_artigo_articulista = System::_POST("FrmIdArtigoArticulista");
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_resumo = System::_POST("FrmResumo");
	$frm_texto = System::_POST("FrmTexto");
	$frm_arquivo_anexo_file = $_FILES["FrmArquivoAnexoFile"];
	$frm_datahora = System::_POST("FrmDatahora");
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjArtigoArticulista = ArtigoArticulistaManage::consultarArtigoArticulista(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_artigo_articulista) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Articulista#";
		}
		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Tнtulo#";
		}
		if( Validacao::isVazio($frm_texto) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Texto#";
		}
		$frm_arquivo_anexo = $obj->getArquivoAnexo();
		if( ! Validacao::isVazio($frm_arquivo_anexo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_arquivo_anexo_file, "../files/artigo/$prename", 1)){
				$frm_arquivo_anexo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(ArtigoManage::alterarArtigo($ID, null, null, $frm_id_artigo_articulista, $frm_titulo, $frm_resumo, $frm_texto, $frm_arquivo_anexo, System::FormatarData($frm_datahora, "Y-m-d H:i:s"), $frm_status)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_id_artigo_articulista = $obj->getIdArtigoArticulista();
		$frm_titulo = $obj->getTitulo();
		$frm_resumo = System::_TextByHtml($obj->getResumo());
		$frm_texto = System::_TextByHtml($obj->getTexto());
		$frm_arquivo_anexo = $obj->getArquivoAnexo();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_status = $obj->getStatus();
	}
?>