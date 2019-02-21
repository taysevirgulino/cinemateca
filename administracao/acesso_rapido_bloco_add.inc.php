<?
	$link_add = "acesso_rapido_bloco_add.php";
	$link_edit = "acesso_rapido_bloco_edit.php";
	$link_remove = "acesso_rapido_bloco_remove.php";
	$link_list = "acesso_rapido_bloco_list.php";

	$frm_nome = System::_POST("FrmNome");
	$frm_prioridade = AcessoRapidoBlocoManage::ultimaPrioridade();
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(AcessoRapidoBlocoManage::inserirAcessoRapidoBloco(-1, null, null, $frm_nome, $frm_prioridade)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>