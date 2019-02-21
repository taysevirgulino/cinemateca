<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "banner_local_add.php";
	$link_edit = "banner_local_edit.php?id=$ID";
	$link_remove = "banner_local_remove.php?id=$ID";
	$link_list = "banner_local_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new BannerLocal();
	if(!$obj->buscarBannerLocal(1, $ID)){ System::Redirect($link_list); }

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
			$label_alerta_erro .="Preencha/Selecione o(a)  Cуdigo#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(BannerLocalManage::alterarBannerLocal($ID, null, $frm_nome, $frm_codigo)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_nome = $obj->getNome();
		$frm_codigo = $obj->getCodigo();
	}
?>