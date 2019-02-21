<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "associado_plano_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "associado_plano_add.php?back=$link_back";
	$link_edit = "associado_plano_edit.php?id=$ID&back=$link_back";
	$link_remove = "associado_plano_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new AssociadoPlano();
	if(!$obj->buscarAssociadoPlano(1, $ID)){ System::Redirect($link_list); }

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_valor = System::_POST("FrmValor");
	$frm_prorata = System::_POST("FrmProrata");
	$frm_recorrencia = System::_POST("FrmRecorrencia");
	$frm_prioridade = $obj->getPrioridade();
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Tнtulo#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setTitulo( $frm_titulo ); 
			$obj->setDescricao( $frm_descricao ); 
			$obj->setValor( $frm_valor ); 
			$obj->setProrata( $frm_prorata ); 
			$obj->setRecorrencia( $frm_recorrencia ); 
			$obj->setPrioridade( $frm_prioridade ); 
			$obj->setStatus( $frm_status ); 

			if($obj->alterarAssociadoPlano()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_titulo = $obj->getTitulo();
		$frm_descricao = System::_TextByHtml($obj->getDescricao());
		$frm_valor = $obj->getValor();
		$frm_prorata = $obj->getProrata();
		$frm_recorrencia = $obj->getRecorrencia();
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = $obj->getStatus();
	}
?>