<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "lojista_pessoa_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "lojista_pessoa_add.php?back=$link_back";
	$link_edit = "lojista_pessoa_edit.php?id=$ID&back=$link_back";
	$link_remove = "lojista_pessoa_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new LojistaPessoa();
	if(!$obj->buscarLojistaPessoa(1, $ID)){ System::Redirect($link_list); }

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
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuсrio#";
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

			if($obj->alterarLojistaPessoa()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_lojista = $obj->getIdLojista();
		$frm_id_lojista_pessoa_perfil = $obj->getIdLojistaPessoaPerfil();
		$frm_id_usuario = $obj->getIdUsuario();
		$frm_nome = $obj->getNome();
		$frm_email = $obj->getEmail();
		$frm_email2 = $obj->getEmail2();
		$frm_telefone = $obj->getTelefone();
		$frm_telefone2 = $obj->getTelefone2();
		$frm_endereco = $obj->getEndereco();
		$frm_cidade = $obj->getCidade();
		$frm_estado = $obj->getEstado();
		$frm_cep = $obj->getCep();
		$frm_observacoes = System::_TextByHtml($obj->getObservacoes());
		$frm_receber_email = $obj->getReceberEmail();
		$frm_status = $obj->getStatus();
	}
?>