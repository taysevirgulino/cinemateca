<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "pagina_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "pagina_add.php?back=$link_back";
	$link_edit = "pagina_edit.php?id=$ID&back=$link_back";
	$link_remove = "pagina_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Pagina();
	if(!$obj->buscarPagina(1, $ID)){ System::Redirect($link_list); }

	$frm_id_pagina_pai = $obj->getIdPaginaPai();
	$frm_slug = System::_POST("FrmSlug");
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_resumo = System::_POST("FrmResumo");
	$frm_texto = System::_POST("FrmTexto");
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	$frm_filhos_exibir = System::_POST("FrmFilhosExibir");
	$frm_filhos_titulo = System::_POST("FrmFilhosTitulo");
	$frm_datahora = System::_POST("FrmDatahora");
	$frm_prioridade = $obj->getPrioridade();
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$frm_pagina = "";
	if($frm_id_pagina_pai > 0){ 
		$objPai = PaginaManage::buscarPagina(1, $frm_id_pagina_pai);
		$frm_pagina = $objPai["titulo"];
	}
	$frm_slug = System::Slug($frm_pagina." ".$frm_titulo);

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjPagina = PaginaManage::consultarPagina(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_slug) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Slug#";
		}
		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Tнtulo#";
		}
		if( Validacao::isVazio($frm_texto) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Texto#";
		}
		$frm_imagem = $obj->getImagem();
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
				/*if( ($i->getImagemWidth() != 68) || ($i->getImagemHeight() != 68) ){
					$i->salvarImagemByCorte(68, 68, "../images/pagina/B$frm_imagem");	
				}else{
					$i->salvarImagem(68, 68, "../images/pagina/B$frm_imagem");	
				}
				if( ($i->getImagemWidth() != 110) || ($i->getImagemHeight() != 110) ){
					$i->salvarImagemByCorte(110, 110, "../images/pagina/C$frm_imagem");	
				}else{
					$i->salvarImagem(110, 110, "../images/pagina/C$frm_imagem");	
				}*/
			}else{
				$label_alerta_erro .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(PaginaManage::alterarPagina($ID, null, null, $frm_id_pagina_pai, $frm_slug, $frm_titulo, $frm_resumo, $frm_texto, $frm_imagem, $frm_filhos_exibir, $frm_filhos_titulo, System::FormatarData($frm_datahora, "Y-m-d H:i:s"), $frm_prioridade, $frm_status)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_id_pagina_pai = $obj->getIdPaginaPai();
		$frm_slug = $obj->getSlug();
		$frm_titulo = $obj->getTitulo();
		$frm_resumo = $obj->getResumo();
		$frm_texto = System::_TextByHtml($obj->getTexto());
		$frm_imagem = $obj->getImagem();
		$frm_filhos_exibir = $obj->getFilhosExibir();
		$frm_filhos_titulo = $obj->getFilhosTitulo();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = $obj->getStatus();
	}
?>