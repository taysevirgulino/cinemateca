<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "acesso_rapido_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "acesso_rapido_add.php?back=$link_back";
	$link_edit = "acesso_rapido_edit.php?id=$ID&back=$link_back";
	$link_remove = "acesso_rapido_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new AcessoRapido();
	if(!$obj->buscarAcessoRapido(1, $ID)){ System::Redirect($link_list); }

	$frm_id_acesso_rapido_pai = intval(System::_POST("FrmIdAcessoRapidoPai"));
	$frm_id_acesso_rapido_bloco = intval(System::_POST("FrmIdAcessoRapidoBloco"));
	$frm_nome = System::_POST("FrmNome");
	$frm_url = System::_POST("FrmUrl");
	$frm_target = System::_POST("FrmTarget");
	$frm_prioridade = $obj->getPrioridade();
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjAcessoRapido = AcessoRapidoManage2::AcessoRapidosBySelect($ID);
	$VObjAcessoRapidoBloco = AcessoRapidoBlocoManage::consultarAcessoRapidoBlocoAttribute(null, null, null, AcessoRapidoBlocoAttribute::Prioridade(), SearchOrder::Crescente());

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

		if( Validacao::isVazio($label_alerta_erro) ){
			$pai = new AcessoRapido();
			if($pai->buscarAcessoRapido(1, $frm_id_acesso_rapido_pai)){
				$frm_id_acesso_rapido_bloco = $pai->getIdAcessoRapidoBloco();
			}
			
			if(AcessoRapidoManage::alterarAcessoRapido($ID, null, null, $frm_id_acesso_rapido_pai, $frm_id_acesso_rapido_bloco, $frm_nome, $frm_url, $frm_target, $frm_prioridade, $frm_status)){
				AcessoRapidoManage2::Reordenar();
				
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_id_acesso_rapido_pai = $obj->getIdAcessoRapidoPai();
		$frm_id_acesso_rapido_bloco = $obj->getIdAcessoRapidoBloco();
		$frm_nome = $obj->getNome();
		$frm_url = $obj->getUrl();
		$frm_target = $obj->getTarget();
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = $obj->getStatus();
	}
?>