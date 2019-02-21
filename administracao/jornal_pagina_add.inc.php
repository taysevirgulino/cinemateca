<?
	$link_add = "jornal_pagina_add.php";
	$link_edit = "jornal_pagina_edit.php";
	$link_remove = "jornal_pagina_remove.php";
	$link_list = "jornal_pagina_list.php";

	$frm_id_jornal_edicao = System::_POST("FrmIdJornalEdicao");
	$frm_id_jornal_estrutura = System::_POST("FrmIdJornalEstrutura");
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjJornalEdicao = JornalEdicaoManage::consultarJornalEdicao(1, "");
	$VObjJornalEstrutura = JornalEstruturaManage::consultarJornalEstrutura(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_jornal_edicao) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Revista Ediчуo#";
		}
		if( Validacao::isVazio($frm_id_jornal_estrutura) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Revista Estrutura#";
		}
		$frm_imagem = "";
		if( ! Validacao::isVazio($frm_imagem_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_imagem_file, "../images/jornal_pagina/$prename", 2)){
				$frm_imagem = $prename.$upload->getName();
				/*$i = new Imagem();
				$i->carregarImagem("../images/jornal_pagina/$frm_imagem");
				$frm_imagem = "alt_$frm_imagem";
				$i->salvarImagem(100, 100, "../images/jornal_pagina/$frm_imagem");*/
			}else{
				$label_alerta_erro .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.#";
			}
		}else{
			$label_alerta_erro .="Preencha/Selecione o(a)  Imagem#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(JornalPaginaManage::inserirJornalPagina(-1, null, $frm_id_jornal_edicao, $frm_id_jornal_estrutura, $frm_imagem)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro nуo Efetuado";
			}
		}
	}
?>