<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "tempo_legenda_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "tempo_legenda_add.php?back=$link_back";
	$link_edit = "tempo_legenda_edit.php?id=$ID&back=$link_back";
	$link_remove = "tempo_legenda_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new TempoLegenda();
	if(!$obj->buscarTempoLegenda(1, $ID)){ System::Redirect($link_list); }

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_codigo = System::_POST("FrmCodigo");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Tнtulo#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(TempoLegendaManage::alterarTempoLegenda($ID, null, $frm_titulo, $frm_codigo)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_titulo = $obj->getTitulo();
		$frm_codigo = $obj->getCodigo();
	}
?>