<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "localidade_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "localidade_add.php?back=$link_back";
	$link_edit = "localidade_edit.php?back=$link_back";
	$link_remove = "localidade_remove.php?back=$link_back";

	$frm_uf = System::_POST("FrmUf");
	$frm_cidade = System::_POST("FrmCidade");
	$frm_capital = System::_POST("FrmCapital");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_uf) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Uf#";
		}
		if( Validacao::isVazio($frm_cidade) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Cidade#";
		}
		if( Validacao::isVazio($frm_capital) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Capital#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			$obj = new Localidade();
			$obj->setLocalidade(-1, null, $frm_uf, $frm_cidade, $frm_capital);
			if($obj->inserirLocalidade()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>