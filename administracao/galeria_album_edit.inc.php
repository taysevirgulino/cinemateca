<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "galeria_album_add.php";
	$link_edit = "galeria_album_edit.php?id=$ID";
	$link_remove = "galeria_album_remove.php?id=$ID";
	$link_list = "galeria_album_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new GaleriaAlbum();
	if(!$obj->buscarGaleriaAlbum(1, $ID)){ System::Redirect($link_list); }

	$frm_id_galeria_categoria = System::_POST("FrmIdGaleriaCategoria");
	$frm_nome = System::_POST("FrmNome");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjGaleriaCategoria = GaleriaCategoriaManage2::CategoriasBySelect(0);

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_galeria_categoria) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Galeria Categoria#";
		}
		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(GaleriaAlbumManage::alterarGaleriaAlbum($ID, null, null, $frm_id_galeria_categoria, $frm_nome, $frm_descricao, System::FormatarData($frm_datahora, "Y-m-d H:i:s"), $frm_status)){
				System::Redirect("galeria_foto_list.php?ida=".$obj->getIdGaleriaAlbum());
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_galeria_categoria = $obj->getIdGaleriaCategoria();
		$frm_nome = $obj->getNome();
		$frm_descricao = System::_TextByHtml($obj->getDescricao());
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_status = $obj->getStatus();
	}
?>