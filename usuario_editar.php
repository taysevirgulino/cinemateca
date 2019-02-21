<?
	require_once("config.inc.php");

	Validar::Completo();
	
	/*
	 * POST
	*/
	$error = array();
	$success = array();
	
	$frm_nome = System::Strtoupper(System::_POST("FrmNome"));
	$frm_email = System::Strtolower(System::_POST("FrmEmail"));
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	$frm_senha_atual = System::_POST("FrmSenhaAtual");
	$frm_senha = System::_POST("FrmSenha");
	$frm_bt = System::_POST("btSubmit");
	
	if( !Validacao::isVazio($frm_nome) ){
	    
	    if( Validacao::isVazio($frm_email) ){
			$error[] = "Preencha o E-mail";
		}
		
		$obj = new Usuario();
		if( !$obj->buscarAttribute(UsuarioAttribute::IdUsuario(), UsuarioLogin::IdUsuario())){
		    $error[] = "Usuário não localizado";
		}
		
		$frm_imagem = $obj->getImagem();
		if( ! Validacao::isVazio($frm_imagem_file["name"]) ){
		    $upload = new Upload();
		    $prename = date("YmdHis")."_";
		    if($upload->SendFile($frm_imagem_file, "images/usuario/$prename", 2)){
		        $frm_imagem = $prename.$upload->getName();
		        $img = new Imagem();
		        $img->carregarImagem("images/usuario/$frm_imagem");
		        $img->salvarImagemByCorte(400, 400, "images/usuario/A$frm_imagem");
		        if( $img->getImagemWidth() > 940){
		            $img->salvarImagemByPorcentagemWidth(940);
		        }
		    }else{
		        $error[] = "Problema ao enviar imagem (verifique formato ou tamanho)";
		    }
		}
		
		if( count($error) <= 0 ){
            
		    $obj->setNome( $frm_nome );
		    $obj->setEmail( $frm_email );
		    $obj->setImagem( $frm_imagem );
		    $obj->setDatahoraEdicao( date("Y-m-d H:i:s") );
		    
		    if( $obj->alterar() ){
		        
		        UsuarioLogin::Sair();
		        UsuarioLogin::setIdeUsuario($obj->getIdentificador());
		        
		        $success[] = "Seu cadastro foi atualizado com sucesso.";
		    }else{
		        $error[] = "Problema ao salvar cadastro, tente novamente daqui alguns minutos";
		    }
			
		}
	}
	
	if( !Validacao::isVazio($frm_senha) ){
	     
	    if( Validacao::isVazio($frm_senha_atual) ){
	        $error[] = "Preencha a senha atual";
	    }
	    
	    $obj = new Usuario();
	    if( !$obj->buscarAttribute(UsuarioAttribute::IdUsuario(), UsuarioLogin::IdUsuario())){
	        $error[] = "Usuário não localizado";
	    }
	
		if( !UsuarioCrypt::Compare($frm_senha_atual, $obj->getSenha()) ){
	        $error[] = "Senha atual inválida";
	    }
		
	    if( count($error) <= 0 ){
	
	        $obj->setSenha( UsuarioCrypt::Encrypt($frm_senha) ); 
	        $obj->setDatahoraEdicao( date("Y-m-d H:i:s") );
	
	        if( $obj->alterar() ){
	            $success[] = "Sua senha foi atualizada com sucesso.";
	        }else{
	            $error[] = "Problema ao salvar senha, tente novamente daqui alguns minutos";
	        }
	        	
	    }
	}
	/*
	 * END POST
	*/
	
	$template = new LayoutTemplate();
	$fileTemplate = "usuario_editar.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Meu cadastro";
		
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( $Titulo );
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("Titulo", $Titulo);
		
		$template->assign("error", $error);
		$template->assign("success", $success);
		
	}
	$template->display($fileTemplate);

?>