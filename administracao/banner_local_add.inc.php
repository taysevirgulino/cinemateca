<?
	$link_add = "banner_local_add.php";
	$link_edit = "banner_local_edit.php";
	$link_remove = "banner_local_remove.php";
	$link_list = "banner_local_list.php";

	$frm_nome = System::_POST("FrmNome");
	$frm_codigo = System::_POST("FrmCodigo");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		if( Validacao::isVazio($frm_codigo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Código#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(BannerLocalManage::inserirBannerLocal(-1, null, $frm_nome, $frm_codigo)){
				//System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>