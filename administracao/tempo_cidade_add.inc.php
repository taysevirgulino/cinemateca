<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "tempo_cidade_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "tempo_cidade_add.php?back=$link_back";
	$link_edit = "tempo_cidade_edit.php?back=$link_back";
	$link_remove = "tempo_cidade_remove.php?back=$link_back";

	$frm_nome = System::_POST("FrmNome");
	$frm_uf = System::_POST("FrmUf");
	$frm_codigo = System::_POST("FrmCodigo");
	$frm_prioridade = TempoCidadeManage::ultimaPrioridade();
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		if( Validacao::isVazio($frm_uf) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Uf#";
		}
		if( Validacao::isVazio($frm_codigo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Código#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			$obj = new TempoCidade();
			$obj->setTempoCidade(-1, null, $frm_nome, $frm_uf, $frm_codigo, $frm_prioridade, $frm_status);
			if($obj->inserirTempoCidade()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>