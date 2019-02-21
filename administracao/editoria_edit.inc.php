<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "editoria_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "editoria_add.php?back=$link_back";
	$link_edit = "editoria_edit.php?id=$ID&back=$link_back";
	$link_remove = "editoria_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Editoria();
	if(!$obj->buscarEditoria(1, $ID)){ System::Redirect($link_list); }

	$frm_id_editoria_pai = System::_POST("FrmIdEditoriaPai");
	$frm_nome = System::_POST("FrmNome");
	$frm_legenda = System::_POST("FrmLegenda");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	$frm_imagem_remove = System::_POST("FrmImagemRemove");
	$frm_imagem_pagina_file = $_FILES["FrmImagemPaginaFile"];
	$frm_imagem_pagina_remove = System::_POST("FrmImagemPaginaRemove");
	$frm_blog = System::_POST("FrmBlog");
	$frm_prioridade = $obj->getPrioridade();
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjEditoria = EditoriaManage2::EditoriasBySelect($ID);

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		$frm_imagem = ((!empty($frm_imagem_remove)) ? "" : $obj->getImagem() );
		if( ! Validacao::isVazio($frm_imagem_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_imagem_file, "../images/editoria/$prename", 2)){
				$frm_imagem = $prename.$upload->getName();
				$img = new Imagem();
				$img->carregarImagem("../images/editoria/$frm_imagem");
				if($img->getImagemWidth() != 64){
					$img->salvarImagemByPorcentagemWidth(64, "../images/editoria/$frm_imagem");
				}
			}else{
				$label_alerta_erro .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.#";
			}
		}
		$frm_imagem_pagina = ((!empty($frm_imagem_pagina_remove)) ? "" : $obj->getImagemPagina() );
		if( ! Validacao::isVazio($frm_imagem_pagina_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_imagem_pagina_file, "../images/editoria/$prename", 2)){
				$frm_imagem_pagina = $prename.$upload->getName();
				$img = new Imagem();
				$img->carregarImagem("../images/editoria/$frm_imagem_pagina");
				if($img->getImagemWidth() > 940){
					$img->salvarImagemByCorte(940, 262, "../images/editoria/$frm_imagem_pagina");
				}
			}else{
				$label_alerta_erro .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(EditoriaManage::alterarEditoria($ID, null, null, $frm_id_editoria_pai, $frm_nome, $frm_legenda, $frm_descricao, $frm_imagem, $frm_imagem_pagina, $frm_blog, $frm_prioridade, $frm_status)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_editoria_pai = $obj->getIdEditoriaPai();
		$frm_nome = $obj->getNome();
		$frm_legenda = $obj->getLegenda();
		$frm_descricao = $obj->getDescricao();
		$frm_imagem = $obj->getImagem();
		$frm_imagem_pagina = $obj->getImagemPagina();
		$frm_blog = $obj->getBlog();
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = $obj->getStatus();
	}
?>