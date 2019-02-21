<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "localidade_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "localidade_add.php?back=$link_back";
	$link_edit = "localidade_edit.php?id=$ID&back=$link_back";
	$link_remove = "localidade_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Localidade();
	if(!$obj->buscarLocalidade(1, $ID)){ System::Redirect($link_list); }

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
			if(LocalidadeManage::alterarLocalidade($ID, null, $frm_uf, $frm_cidade, $frm_capital)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_uf = $obj->getUf();
		$frm_cidade = $obj->getCidade();
		$frm_capital = $obj->getCapital();
	}
?>