<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "video_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "video_add.php?back=$link_back";
	$link_edit = "video_edit.php?id=$ID&back=$link_back";
	$link_remove = "video_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Video();
	if(!$obj->buscarVideo(1, $ID)){ System::Redirect($link_list); }

	$frm_id_video_categoria = System::_POST("FrmIdVideoCategoria");
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_arquivo = $obj->getArquivo(); // System::_POST("FrmArquivo");
	$frm_embed = System::_POST("FrmEmbed");
	$frm_width = $obj->getWidth(); // System::_POST("FrmWidth");
	$frm_height = $obj->getHeight(); // System::_POST("FrmHeight");
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	$frm_datahora = $_POST["FrmDatahora"];
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjVideoCategoria = VideoCategoriaManage::consultarVideoCategoriaAttribute("", "", "", VideoCategoriaAttribute::Prioridade());
	//$VObjFile = VideoManagePartial::ListarArquivos();
	
	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_video_categoria) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Categoria#";
		}
		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Tнtulo#";
		}
		
		$frm_imagem = $obj->getImagem();
		if( ! Validacao::isVazio($frm_imagem_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_imagem_file, "../images/video/$prename", 2)){
				$frm_imagem = $prename.$upload->getName();
				$i = new Imagem();
				$i->carregarImagem("../images/video/$frm_imagem");
				
				if( (!empty($frm_width)) && (!empty($frm_height)) ){
					$i->salvarImagem($frm_width, $frm_height, "../images/video/A$frm_imagem");	
				}else{
					$i->salvarImagem(320, 240, "../images/video/A$frm_imagem");
				}
				$i->salvarImagemByCorte(100, 80, "../images/video/B$frm_imagem");
				if($i->getImagemWidth() > 640){
					$i->salvarImagemByPorcentagemWidth(640, "../images/video/$frm_imagem");
				}
				
			}else{
				$label_alerta_erro .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			
			$frm_width = intval($frm_width);
			$frm_height = intval($frm_height);
			
			if(VideoManage::alterarVideo($ID, null, null, $frm_id_video_categoria, $frm_titulo, $frm_descricao, $frm_arquivo, $frm_embed, $frm_width, $frm_height, $frm_imagem, System::FormatarData($frm_datahora, "Y-m-d H:i:s"), $frm_status)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_id_video_categoria = $obj->getIdVideoCategoria();
		$frm_titulo = $obj->getTitulo();
		$frm_descricao = System::_TextByHtml($obj->getDescricao());
		$frm_arquivo = $obj->getArquivo();
		$frm_embed = System::_TextByHtml($obj->getEmbed());
		$frm_width = $obj->getWidth();
		$frm_height = $obj->getHeight();
		$frm_imagem = $obj->getImagem();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_status = $obj->getStatus();
	}
?>