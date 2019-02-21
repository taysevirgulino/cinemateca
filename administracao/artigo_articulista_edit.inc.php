<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "artigo_articulista_add.php";
	$link_edit = "artigo_articulista_edit.php?id=$ID";
	$link_remove = "artigo_articulista_remove.php?id=$ID";
	$link_list = "artigo_articulista_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new ArtigoArticulista();
	if(!$obj->buscarArtigoArticulista(1, $ID)){ System::Redirect($link_list); }

	$frm_nome = System::_POST("FrmNome");
	$frm_perfil = System::_POST("FrmPerfil");
	$frm_email = System::_POST("FrmEmail");
	$frm_telefone = System::_POST("FrmTelefone");
	$frm_foto_file = $_FILES["FrmFotoFile"];
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		if( Validacao::isVazio($frm_perfil) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Perfil#";
		}
		$frm_foto = $obj->getFoto();
		if( ! Validacao::isVazio($frm_foto_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_foto_file, "../images/artigo_articulista/$prename", 2)){
				$frm_foto = $prename.$upload->getName();
				$i = new Imagem();
				$i->carregarImagem("../images/artigo_articulista/$frm_foto");
				$i->salvarImagemByPorcentagem(100, "../images/artigo_articulista/A$frm_foto");
			}else{
				$label_alerta_erro .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(ArtigoArticulistaManage::alterarArtigoArticulista($ID, null, null, $frm_nome, $frm_perfil, $frm_email, $frm_telefone, $frm_foto)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_nome = $obj->getNome();
		$frm_perfil = System::_TextByHtml($obj->getPerfil());
		$frm_email = $obj->getEmail();
		$frm_telefone = $obj->getTelefone();
		$frm_foto = $obj->getFoto();
	}
?>