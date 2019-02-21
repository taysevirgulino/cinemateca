<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "galeria_categoria_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "galeria_categoria_add.php?back=$link_back";
	$link_edit = "galeria_categoria_edit.php?id=$ID&back=$link_back";
	$link_remove = "galeria_categoria_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new GaleriaCategoria();
	if(!$obj->buscarGaleriaCategoria(1, $ID)){ System::Redirect($link_list); }

	$frm_id_galeria_categoria_pai = System::_POST("FrmIdGaleriaCategoriaPai");
	$frm_nome = System::_POST("FrmNome");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_imagem = System::_POST("FrmImagem");
	$frm_imagem_remove = System::_POST("FrmImagemRemove");
	$frm_prioridade = $obj->getPrioridade();
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjGaleriaCategoria = GaleriaCategoriaManage2::CategoriasBySelect($ID);
	$frm_imagem_crop = GaleriaCategoriaForm::Imagem_Crop_Config();
	
	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		
		$frm_imagem = ((!empty($frm_imagem_remove)) ? "" : GaleriaCategoriaForm::Input_Value($_POST, $obj->getImagem()) );

		if( Validacao::isVazio($label_alerta_erro) ){
			if(GaleriaCategoriaManage::alterarGaleriaCategoria($ID, null, null, $frm_id_galeria_categoria_pai, $frm_nome, $frm_descricao, $frm_imagem, $frm_prioridade, $frm_status)){
				GaleriaCategoriaManage2::Reordenar();
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_galeria_categoria_pai = $obj->getIdGaleriaCategoriaPai();
		$frm_nome = $obj->getNome();
		$frm_descricao = System::_TextByHtml($obj->getDescricao());
		$frm_imagem = $obj->getImagem();
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = $obj->getStatus();
	}
?>