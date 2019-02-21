<?
	require_once("config.inc.php");

	Validar::Completo();
	
	/*
	 * POST
	*/
	$error = array();
	$success = array();
	
	$frm_id_lojista = intval(System::_POST("FrmIdLojista"));
	$frm_id_lojista_pessoa_perfil = intval(System::_POST("FrmIdLojistaPessoaPerfil"));
	$frm_nome = System::_POST("FrmNome");
	$frm_email = System::Strtolower(System::_POST("FrmEmail"));
	$frm_email2 = System::Strtolower(System::_POST("FrmEmail2"));
	$frm_telefone = System::_POST("FrmTelefone");
	$frm_telefone2 = System::_POST("FrmTelefone2");
	$frm_endereco = System::_POST("FrmEndereco");
	$frm_cidade = System::_POST("FrmCidade");
	$frm_estado = System::_POST("FrmEstado");
	$frm_cep = System::_POST("FrmCep");
	$frm_observacoes = System::_POST("FrmObservacoes");
	$frm_receber_email = intval(System::_POST("FrmReceberEmail"));
	$frm_status = 1;
	$frm_bt = System::_POST("btSubmit");
	
	$frm_usuario = intval(System::_POST("FrmUsuario"));
	$frm_login = System::_POST("FrmLogin");
	$frm_senha = System::_POST("FrmSenha");
	
	
	if( !Validacao::isVazio($frm_nome) ){
	    
	    if( Validacao::isVazio($frm_email) ){
			$error[] = "Preencha o E-mail";
		}
	    if( Validacao::isVazio($frm_telefone) ){
			$error[] = "Preencha o Telefone";
		}
		
		if( count($error) <= 0 ){
            
		    $obj = new LojistaPessoa();
			$obj->setIdLojista( $frm_id_lojista ); 
			$obj->setIdLojistaPessoaPerfil( $frm_id_lojista_pessoa_perfil ); 
			$obj->setIdUsuario( 0 ); 
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
		    
		    if( $obj->inserir() ){
		           
		        $rs = UsuarioManage2::LojistaPessoa($obj, $frm_login, $frm_senha, ($frm_usuario==1));
		        if( $rs ){
		            System::Redirect( Url::_Path()."lojista-pessoa-list?msg-success=".base64_encode("Contato cadastrado com sucesso.") );
		        }else{
		            System::Redirect( Url::_Path()."lojista-pessoa-list?msg-danger=".base64_encode("Contato foi cadastrado, mas não foi liberado acesso ao site devido a algum erro.") );
		        }
		       
		    }else{
		        $error[] = "Problema ao salvar, tente novamente daqui alguns minutos";
		    }
			
		}
	}
	/*
	 * END POST
	*/
	
	$template = new LayoutTemplate();
	$fileTemplate = "lojista_pessoa_add.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Novo Contato de Lojista";
		
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( "Lojistas", Url::_Path()."lojista-list" );
		$Navegacao->Adicionar( "Contatos", Url::_Path()."lojista-pessoa-list" );
		$Navegacao->Adicionar( $Titulo );
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("Titulo", $Titulo);
		
		$template->assign("itensLojista", LojistaManage2::Listagem());
		$template->assign("itensLojistaPessoaPerfil", LojistaPessoaPerfilManage::consultarAttribute(null, null, null, LojistaPessoaPerfilAttribute::Titulo()));
		
		$template->assign("error", $error);
		$template->assign("success", $success);
		
	}
	$template->display($fileTemplate);

?>