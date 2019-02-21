<?
	require_once("config.inc.php");

	Validar::Completo();
	
	$objLojista = new Lojista();
	if( !$objLojista->buscarAttribute(LojistaAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Lojista_Selecionar("arquivo-add") );
	}
	
	/*
	 * POST
	*/
	$error = array();
	$success = array();
	$inputAnexos = range(1, 3);
	
	$frm_id_lojista = $objLojista->getIdLojista();
	$frm_id_arquivo_disciplina = intval(System::_POST("FrmIdArquivoDisciplina"));
	$frm_id_arquivo_tipo = intval(System::_POST("FrmIdArquivoTipo"));
	$frm_id_usuario = UsuarioLogin::IdUsuario();
	$frm_id_usuario_responsavel = $objLojista->getIdUsuarioResponsavel();
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_texto = System::_POST("FrmTexto");
	$frm_datahora = date("Y-m-d H:i:s");
	$frm_datahora_edicao = $frm_datahora;
	$frm_status = ArquivoStatus::Aberto();
	$frm_bt = System::_POST("btSubmit");
	$frm_anexo = array();
	
	if( !Validacao::isVazio($frm_titulo) ){
	    
	    if( Validacao::isVazio($frm_id_arquivo_tipo) ){
			$error[] = "Selecione o Tipo";
		}		
	    if( Validacao::isVazio($frm_id_arquivo_disciplina) ){
			$error[] = "Selecione a Disciplina";
		}
		
		foreach ($inputAnexos as $i) {
		    $frm_arquivo_file = $_FILES["FrmArquivoFile_$i"];;
		    if( ! Validacao::isVazio($frm_arquivo_file["name"]) ){
		        $upload = new Upload();
		        $prename = date("YmdHis")."_";
		        if($upload->SendFile($frm_arquivo_file, "files/arquivo_anexo/$prename", 3)){
		            $frm_anexo[] = $prename.$upload->getName();
		        }
		    }
		}
		
		if( count($error) <= 0 ){
            
		    $obj = new Arquivo();
			$obj->setIdLojista( $frm_id_lojista ); 
			$obj->setIdArquivoDisciplina( $frm_id_arquivo_disciplina ); 
			$obj->setIdArquivoTipo( $frm_id_arquivo_tipo ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setIdUsuarioResponsavel( $frm_id_usuario_responsavel ); 
			$obj->setTitulo( $frm_titulo ); 
			$obj->setTexto( $frm_texto ); 
			$obj->setDatahora( $frm_datahora );
			$obj->setDatahoraEdicao( $frm_datahora_edicao );
			$obj->setStatus( $frm_status ); 
		    
		    if( $obj->inserir() ){
		        
		        $objH = new ArquivoHistorico();
		        $objH->setIdArquivo( $obj->getIdArquivo() );
		        $objH->setIdArquivoTipo( $frm_id_arquivo_tipo );
		        $objH->setIdUsuario( $frm_id_usuario );
		        $objH->setIdUsuarioResponsavel( $frm_id_usuario_responsavel );
		        $objH->setTexto( $frm_texto );
		        $objH->setDatahora( $frm_datahora );
		        $objH->setStatus( $frm_status );
		        $objH->inserir();
		        
		        foreach ($frm_anexo as $value) {
		            $objAnexo = new ArquivoAnexo();
		            $objAnexo->setIdArquivoAnexo( null ); 
        			$objAnexo->setIdentificador( null ); 
        			$objAnexo->setIdArquivo( $obj->getIdArquivo() ); 
        			$objAnexo->setIdArquivoHistorico( $objH->getIdArquivoHistorico() ); 
        			$objAnexo->setArquivo( $value ); 
        			$objAnexo->setDatahora( $frm_datahora );
        			$objAnexo->inserir();
		        }
		        
		        NotificacaoManage2::Registrar(NotificacaoTipo::Alerta(), $obj->getIdUsuarioResponsavel(), "Encaminharam um novo arquivo/protocolo para você #".$obj->getIdArquivo(), Url::Arquivo($obj->getIdentificador()), "Novo Arquivo/Protocolo");
		        
		        $objResponsavel = new Usuario(); $objResponsavel->buscarAttribute(UsuarioAttribute::IdUsuario(), $obj->getIdUsuarioResponsavel());
		        $mail = new Email(CurrentSite::Site());
		        $mail->Arquivo_Novo($objResponsavel, $obj);
		        
		        System::Redirect(
		          Url::_Path()."arquivo-list-".$objLojista->getIdentificador()."?msg-success=".base64_encode("Arquivo/Protocolo cadastrado com sucesso.")
		        );
		    }else{
		        $error[] = "Problema ao salvar, tente novamente daqui alguns minutos";
		    }
			
		}
	}
	/*
	 * END POST
	*/
	
	$template = new LayoutTemplate();
	$fileTemplate = "arquivo_add.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Novo Arquivo/Protocolo: ".$objLojista->getNome();
		
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( "Lojistas", Url::_Path()."lojista-list" );
		$Navegacao->Adicionar( "Arquivos", Url::_Path()."arquivo-list-".$objLojista->getIdentificador() );
		$Navegacao->Adicionar( $Titulo );
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("Titulo", $Titulo);
		
		$template->assign("itensLojista", LojistaManage2::Listagem());
		$template->assign("itensArquivoTipo", ArquivoTipoManage::consultarAttribute(ArquivoTipoAttribute::Status(), 1, SearchComparer::Igual(), ArquivoTipoAttribute::Titulo()));
		$template->assign("itensArquivoDisciplina", ArquivoDisciplinaManage::consultarAttribute(ArquivoDisciplinaAttribute::Status(), 1, SearchComparer::Igual(), ArquivoDisciplinaAttribute::Titulo()));
		$template->assign("inputAnexos", $inputAnexos);
		
		
		$template->assign("error", $error);
		$template->assign("success", $success);
		
	}
	$template->display($fileTemplate);

?>