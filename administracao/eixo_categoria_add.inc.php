<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "eixo_categoria_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "eixo_categoria_add.php?back=$link_back";
	$link_edit = "eixo_categoria_edit.php?back=$link_back";
	$link_remove = "eixo_categoria_remove.php?back=$link_back";

	$frm_nome = System::_POST("FrmNome");
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		if( Validacao::isVazio($frm_status) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Status#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new EixoCategoria();
			$obj->setNome( $frm_nome ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setStatus( $frm_status ); 

			if($obj->inserirEixoCategoria()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>