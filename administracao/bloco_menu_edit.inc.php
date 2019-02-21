<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "bloco_menu_add.php";
	$link_edit = "bloco_menu_edit.php?id=$ID";
	$link_remove = "bloco_menu_remove.php?id=$ID";
	$link_list = "bloco_menu_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new BlocoMenu();
	if(!$obj->buscarBlocoMenu(1, $ID)){ System::Redirect($link_list); }

	$frm_id_bloco_menu_pai = System::_POST("FrmIdBlocoMenuPai");
	$frm_nome = System::_POST("FrmNome");
	$frm_url = System::_POST("FrmUrl");
	$frm_target = System::_POST("FrmTarget");
	$frm_prioridade = $obj->getPrioridade();
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjBlocoMenu = BlocoMenuManage::consultarBlocoMenu(4, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(BlocoMenuManage::alterarBlocoMenu($ID, null, null, $frm_id_bloco_menu_pai, $frm_nome, $frm_url, $frm_target, $frm_prioridade, $frm_status)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_bloco_menu_pai = $obj->getIdBlocoMenuPai();
		$frm_nome = $obj->getNome();
		$frm_url = $obj->getUrl();
		$frm_target = $obj->getTarget();
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = $obj->getStatus();
	}
?>