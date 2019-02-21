<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "link_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "link_add.php?back=$link_back";
	$link_edit = "link_edit.php?id=$ID&back=$link_back";
	$link_remove = "link_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Link();
	if(!$obj->buscarLink(1, $ID)){ System::Redirect($link_list); }

	$frm_nome = System::_POST("FrmNome");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_url = System::_POST("FrmUrl");
	$frm_target = System::_POST("FrmTarget");
	$frm_prioridade = $obj->getPrioridade();
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		if( Validacao::isVazio($frm_url) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Url (Endereзo)#";
		}
		if( Validacao::isVazio($frm_target) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Abrir#";
		}
		if( Validacao::isVazio($frm_prioridade) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Prioridade#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(LinkManage::alterarLink($ID, null, null, $frm_nome, $frm_descricao, $frm_url, $frm_target, $frm_prioridade, System::FormatarData($frm_datahora, "Y-m-d H:i:s"), $frm_status)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_nome = $obj->getNome();
		$frm_descricao = $obj->getDescricao();
		$frm_url = $obj->getUrl();
		$frm_target = $obj->getTarget();
		$frm_prioridade = $obj->getPrioridade();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_status = $obj->getStatus();
	}
?>