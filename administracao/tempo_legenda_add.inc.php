<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "tempo_legenda_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "tempo_legenda_add.php?back=$link_back";
	$link_edit = "tempo_legenda_edit.php?back=$link_back";
	$link_remove = "tempo_legenda_remove.php?back=$link_back";

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_codigo = System::_POST("FrmCodigo");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Título#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			$obj = new TempoLegenda();
			$obj->setTempoLegenda(-1, null, $frm_titulo, $frm_codigo);
			if($obj->inserirTempoLegenda()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>