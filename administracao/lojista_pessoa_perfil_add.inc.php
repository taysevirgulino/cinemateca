<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "lojista_pessoa_perfil_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "lojista_pessoa_perfil_add.php?back=$link_back";
	$link_edit = "lojista_pessoa_perfil_edit.php?back=$link_back";
	$link_remove = "lojista_pessoa_perfil_remove.php?back=$link_back";

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_prioridade = LojistaPessoaPerfilManage::ultimaPrioridade();
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Título#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new LojistaPessoaPerfil();
			$obj->setTitulo( $frm_titulo ); 
			$obj->setPrioridade( $frm_prioridade ); 

			if($obj->inserirLojistaPessoaPerfil()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>