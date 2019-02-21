<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "pagina_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "pagina_add.php?back=$link_back";
	$link_edit = "pagina_edit.php?back=$link_back";
	$link_remove = "pagina_remove.php?back=$link_back";

	$frm_id_pagina_pai = intval(System::_POST("FrmIdPaginaPai"));
	$frm_slug = System::_POST("FrmSlug");
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_resumo = System::_POST("FrmResumo");
	$frm_texto = System::_POST("FrmTexto");
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	$frm_filhos_exibir = System::_POST("FrmFilhosExibir");
	$frm_filhos_titulo = System::_POST("FrmFilhosTitulo");
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
	$frm_prioridade = PaginaManage::ultimaPrioridade();
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$frm_id_pagina_pai = (($frm_id_pagina_pai <= 0) ? intval(System::_REQUEST("idp")) : $frm_id_pagina_pai );
	$frm_pagina = "";
	if($frm_id_pagina_pai > 0){ 
		$objPai = PaginaManage::buscarPagina(1, $frm_id_pagina_pai);
		$frm_pagina = $objPai["titulo"];
	}
	$frm_slug = System::Slug($frm_pagina." ".$frm_titulo);
	
	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_slug) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Slug#";
		}
		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Título#";
		}
		if( Validacao::isVazio($frm_texto) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Texto#";
		}
		$frm_imagem = "";
		if( ! Validacao::isVazio($frm_imagem_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_imagem_file, "../images/pagina/$prename", 2)){
				$frm_imagem = $prename.$upload->getName();
				$i = new Imagem();
				$i->carregarImagem("../images/pagina/$frm_imagem");
				/*if( ($i->getImagemWidth() != 228) ){
					$i->salvarImagemByPorcentagemWidth(228, "../images/pagina/$frm_imagem");	
				}*/
				if( ($i->getImagemWidth() != 140) || ($i->getImagemHeight() != 100) ){
					$i->salvarImagemByCorte(140, 100, "../images/pagina/A$frm_imagem");	
				}else{
					$i->salvarImagem(140, 100, "../images/pagina/A$frm_imagem");	
				}
				/*if( ($i->getImagemWidth() != 110) || ($i->getImagemHeight() != 110) ){
					$i->salvarImagemByCorte(110, 110, "../images/pagina/C$frm_imagem");	
				}else{
					$i->salvarImagem(110, 110, "../images/pagina/C$frm_imagem");	
				}*/		
			}else{
				$label_alerta_erro .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(PaginaManage::inserirPagina(-1, null, null, $frm_id_pagina_pai, $frm_slug, $frm_titulo, $frm_resumo, $frm_texto, $frm_imagem, $frm_filhos_exibir, $frm_filhos_titulo, System::FormatarData($frm_datahora, "Y-m-d H:i:s"), $frm_prioridade, $frm_status)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>