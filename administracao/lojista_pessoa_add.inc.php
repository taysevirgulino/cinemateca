<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "lojista_pessoa_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "lojista_pessoa_add.php?back=$link_back";
	$link_edit = "lojista_pessoa_edit.php?back=$link_back";
	$link_remove = "lojista_pessoa_remove.php?back=$link_back";

	$frm_id_lojista = System::_POST("FrmIdLojista");
	$frm_id_lojista_pessoa_perfil = System::_POST("FrmIdLojistaPessoaPerfil");
	$frm_id_usuario = System::_POST("FrmIdUsuario");
	$frm_nome = System::_POST("FrmNome");
	$frm_email = System::_POST("FrmEmail");
	$frm_email2 = System::_POST("FrmEmail2");
	$frm_telefone = System::_POST("FrmTelefone");
	$frm_telefone2 = System::_POST("FrmTelefone2");
	$frm_endereco = System::_POST("FrmEndereco");
	$frm_cidade = System::_POST("FrmCidade");
	$frm_estado = System::_POST("FrmEstado");
	$frm_cep = System::_POST("FrmCep");
	$frm_observacoes = System::_POST("FrmObservacoes");
	$frm_receber_email = System::_POST("FrmReceberEmail");
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjLojista = LojistaManage::consultarLojista(1, "");
	$VObjLojistaPessoaPerfil = LojistaPessoaPerfilManage::consultarLojistaPessoaPerfil(1, "");
	$VObjUsuario = UsuarioManage::consultarUsuario(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_lojista) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Lojista#";
		}
		if( Validacao::isVazio($frm_id_lojista_pessoa_perfil) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Lojista Pessoa Perfil#";
		}
		if( Validacao::isVazio($frm_id_usuario) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuário#";
		}
		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		if( Validacao::isVazio($frm_email) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  E-mail#";
		}
		if( Validacao::isVazio($frm_telefone) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Telefone#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new LojistaPessoa();
			$obj->setIdLojista( $frm_id_lojista ); 
			$obj->setIdLojistaPessoaPerfil( $frm_id_lojista_pessoa_perfil ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setNome( $frm_nome ); 
			$obj->setEmail( $frm_email ); 
			$obj->setEmail2( $frm_email2 ); 
			$obj->setTelefone( $frm_telefone ); 
			$obj->setTelefone2( $frm_telefone2 ); 
			$obj->setEndereco( $frm_endereco ); 
			$obj->setCidade( $frm_cidade ); 
			$obj->setEstado( $frm_estado ); 
			$obj->setCep( $frm_cep ); 
			$obj->setObservacoes( $frm_observacoes ); 
			$obj->setReceberEmail( $frm_receber_email ); 
			$obj->setStatus( $frm_status ); 

			if($obj->inserirLojistaPessoa()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>