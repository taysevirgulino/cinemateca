<?
	$link_add = "galeria_album_add.php";
	$link_edit = "galeria_album_edit.php";
	$link_remove = "galeria_album_remove.php";
	$link_list = "galeria_album_list.php";

	$frm_id_galeria_categoria = System::_POST("FrmIdGaleriaCategoria");
	$frm_nome = System::_POST("FrmNome");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
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
			$obj = new GaleriaAlbum();
			$obj->setGaleriaAlbum(-1, null, null, $frm_id_galeria_categoria, $frm_nome, $frm_descricao, System::FormatarData($frm_datahora, "Y-m-d H:i:s"), $frm_status);

			if($obj->inserirGaleriaAlbum()){
				System::Redirect("galeria_foto_list.php?ida=".$obj->getIdGaleriaAlbum());
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>