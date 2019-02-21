<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "noticia_comentario_add.php";
	$link_edit = "noticia_comentario_edit.php?id=$ID";
	$link_remove = "noticia_comentario_remove.php?id=$ID";
	$link_list = "noticia_comentario_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new NoticiaComentario();
	if(!$obj->buscarNoticiaComentario(1, $ID)){ System::Redirect($link_list); }
	
	$objNoticia = new Noticia();
	$objNoticia->buscarNoticia(1, $obj->getIdNoticia());
	$frm_noticia = $objNoticia->getTitulo();

	$frm_id_noticia = $obj->getIdNoticia();
	$frm_nome = System::_POST("FrmNome");
	$frm_email = System::_POST("FrmEmail");
	$frm_url = System::_POST("FrmUrl");
	$frm_texto = System::_POST("FrmTexto");
	$frm_ip = $obj->getIp();
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_noticia) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Notнcia#";
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
			if(NoticiaComentarioManage::alterarNoticiaComentario($ID, null, null, $frm_id_noticia, $frm_nome, $frm_email, $frm_url, $frm_texto, $frm_ip, System::FormatarData($frm_datahora, "Y-m-d H:i:s"), $frm_status)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_id_noticia = $obj->getIdNoticia();
		$frm_nome = $obj->getNome();
		$frm_email = $obj->getEmail();
		$frm_url = $obj->getUrl();
		$frm_texto = $obj->getTexto();
		$frm_ip = $obj->getIp();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_status = $obj->getStatus();
	}
?>