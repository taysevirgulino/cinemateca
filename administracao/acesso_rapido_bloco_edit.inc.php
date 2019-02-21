<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "acesso_rapido_bloco_add.php";
	$link_edit = "acesso_rapido_bloco_edit.php?id=$ID";
	$link_remove = "acesso_rapido_bloco_remove.php?id=$ID";
	$link_list = "acesso_rapido_bloco_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new AcessoRapidoBloco();
	if(!$obj->buscarAcessoRapidoBloco(1, $ID)){ System::Redirect($link_list); }

	$frm_nome = System::_POST("FrmNome");
	$frm_prioridade = $obj->getPrioridade();
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(AcessoRapidoBlocoManage::alterarAcessoRapidoBloco($ID, null, null, $frm_nome, $frm_prioridade)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_nome = $obj->getNome();
		$frm_prioridade = $obj->getPrioridade();
	}
?>