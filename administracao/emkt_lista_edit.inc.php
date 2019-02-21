<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "emkt_lista_add.php";
	$link_edit = "emkt_lista_edit.php?id=$ID";
	$link_remove = "emkt_lista_remove.php?id=$ID";
	$link_list = "emkt_lista_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new EmktLista();
	if(!$obj->buscarEmktLista(1, $ID)){ System::Redirect($link_list); }

	$frm_nome = System::_POST("FrmNome");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(EmktListaManage::alterarEmktLista($ID, null, $frm_nome)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_nome = $obj->getNome();
	}
?>