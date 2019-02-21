<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "download_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "download_add.php?back=$link_back";
	$link_edit = "download_edit.php?id=$ID&back=$link_back";
	$link_remove = "download_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Download();
	if(!$obj->buscarDownload(1, $ID)){ System::Redirect($link_list); }

	$frm_id_download_categoria = System::_POST("FrmIdDownloadCategoria");
	$frm_nome = System::_POST("FrmNome");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_arquivo_file = $_FILES["FrmArquivoFile"];
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	$frm_click = $obj->getClick();
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
	$frm_prioridade = $obj->getPrioridade();
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjDownloadCategoria = DownloadCategoriaManage::consultarDownloadCategoriaAttribute("", "", "", DownloadCategoriaAttribute::Prioridade());

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_download_categoria) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Download Categoria#";
		}
		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}

		$frm_arquivo = $obj->getArquivo();
		if( ! Validacao::isVazio($frm_arquivo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_arquivo_file, "../files/download/$prename", 3)){
				$frm_arquivo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}
		
		$frm_imagem = $obj->getImagem();
		if( ! Validacao::isVazio($frm_imagem_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_imagem_file, "../images/download/$prename", 2)){
				$frm_imagem = $prename.$upload->getName();
				$i = new Imagem();
				$i->carregarImagem("../images/download/$frm_imagem");
				
				$i->salvarImagemByPorcentagem(100, "../images/download/A$frm_imagem");
				$i->salvarImagemByCorte(80, 80, "../images/download/B$frm_imagem");
				if( ($i->getImagemWidth() > 800) ){
					$i->salvarImagemByPorcentagemWidth(800, "../images/download/$frm_imagem");
				}
			}else{
				$label_alerta_erro .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(DownloadManage::alterarDownload($ID, null, null, $frm_id_download_categoria, $frm_nome, $frm_descricao, $frm_arquivo, $frm_imagem, $frm_click, System::FormatarData($frm_datahora, "Y-m-d H:i:s"), $frm_prioridade, $frm_status)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_download_categoria = $obj->getIdDownloadCategoria();
		$frm_nome = $obj->getNome();
		$frm_descricao = $obj->getDescricao();
		$frm_arquivo = $obj->getArquivo();
		$frm_imagem = $obj->getImagem();
		$frm_click = $obj->getClick();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = $obj->getStatus();
	}
?>