<?
	$link_add = "noticia_comentario_add.php";
	$link_edit = "noticia_comentario_edit.php";
	$link_remove = "noticia_comentario_remove.php";
	$link_list = "noticia_comentario_list.php";

	$frm_id_noticia = System::_POST("FrmIdNoticia");
	$frm_nome = System::_POST("FrmNome");
	$frm_email = System::_POST("FrmEmail");
	$frm_texto = System::_POST("FrmTexto");
	$frm_ip = System::_POST("FrmIp");
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjNoticia = NoticiaManage::consultarNoticia(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_noticia) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Notícia#";
		}
		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		if( Validacao::isVazio($frm_email) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  E-mail#";
		}
		if( Validacao::isVazio($frm_texto) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Texto#";
		}
		if( Validacao::isVazio($frm_ip) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Ip#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(NoticiaComentarioManage::inserirNoticiaComentario(-1, null, null, $frm_id_noticia, $frm_nome, $frm_email, $frm_texto, $frm_ip, System::FormatarData($frm_datahora, "Y-m-d H:i:s"), $frm_status)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>