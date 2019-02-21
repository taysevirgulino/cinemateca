<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "galeria_categoria_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "galeria_categoria_add.php?back=$link_back";
	$link_edit = "galeria_categoria_edit.php?back=$link_back";
	$link_remove = "galeria_categoria_remove.php?back=$link_back";

	$frm_id_galeria_categoria_pai = System::_POST("FrmIdGaleriaCategoriaPai");
	$frm_nome = System::_POST("FrmNome");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_imagem = System::_POST("FrmImagem");
	$frm_prioridade = GaleriaCategoriaManage::ultimaPrioridade();
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjGaleriaCategoria = GaleriaCategoriaManage2::CategoriasBySelect(0);
	$frm_imagem_crop = GaleriaCategoriaForm::Imagem_Crop_Config();

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		
		$frm_imagem = GaleriaCategoriaForm::Input_Value($_POST);

		if( Validacao::isVazio($label_alerta_erro) ){
			$obj = new GaleriaCategoria();
			$obj->setGaleriaCategoria(-1, null, null, $frm_id_galeria_categoria_pai, $frm_nome, $frm_descricao, $frm_imagem, $frm_prioridade, $frm_status);
			if($obj->inserirGaleriaCategoria()){
				GaleriaCategoriaManage2::Reordenar();
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>