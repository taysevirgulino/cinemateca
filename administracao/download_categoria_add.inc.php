<?
	$link_add = "download_categoria_add.php";
	$link_edit = "download_categoria_edit.php";
	$link_remove = "download_categoria_remove.php";
	$link_list = "download_categoria_list.php";

	$frm_nome = System::_POST("FrmNome");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_prioridade = DownloadCategoriaManage::ultimaPrioridade();
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(DownloadCategoriaManage::inserirDownloadCategoria(-1, null, null, $frm_nome, $frm_descricao, $frm_prioridade)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>