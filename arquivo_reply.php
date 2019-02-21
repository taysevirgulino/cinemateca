<?
	require_once("config.inc.php");

	Validar::Completo();
	
    $obj = new Arquivo();
	if( !$obj->buscarAttribute(ArquivoAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Painel() );
	}
	$objLojista = new Lojista();
	if( !$objLojista->buscarAttribute(LojistaAttribute::IdLojista(), $obj->getIdLojista()) ){
	    System::Redirect( Url::Lojista_Selecionar("arquivo-list") );
	}
	
	/*
	 * POST
	*/
	$error = array();
	$success = array();
	$inputAnexos = range(1, 3);
	
	$frm_id_arquivo_tipo = intval(System::_POST("FrmIdArquivoTipo"));
	$frm_id_usuario = UsuarioLogin::IdUsuario();
	$frm_id_usuario_responsavel =  intval(System::_POST("FrmIdUsuarioResponsavel"));
	$frm_id_usuario_responsavel = (($frm_id_usuario_responsavel>0) ? $frm_id_usuario_responsavel : $objLojista->getIdUsuarioResponsavel() );
	$frm_texto = System::_POST("FrmTexto");
	$frm_datahora = date("Y-m-d H:i:s");
	$frm_status = intval(System::_POST("FrmStatus"));
	$frm_status = (($frm_status==0) ? ArquivoStatus::Aberto() : $frm_status );
	$frm_bt = System::_POST("btSubmit");
	$frm_anexo = array();
	
	if( !Validacao::isVazio($frm_texto) ){
	    
	    /*if( Validacao::isVazio($frm_id_arquivo_tipo) ){
			$error[] = "Selecione o Tipo";
		}*/
		
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
            
		    $objH = new ArquivoHistorico();
			$objH->setIdArquivo( $obj->getIdArquivo() ); 
			$objH->setIdArquivoTipo( $frm_id_arquivo_tipo ); 
			$objH->setIdUsuario( $frm_id_usuario ); 
			$objH->setIdUsuarioResponsavel( $frm_id_usuario_responsavel ); 
			$objH->setTexto( $frm_texto ); 
			$objH->setDatahora( $frm_datahora );
			$objH->setStatus( $frm_status ); 
		    
		    if( $objH->inserir() ){
		        
		        $obj->setIdUsuarioResponsavel( $frm_id_usuario_responsavel );
		        $obj->setDatahoraEdicao( $frm_datahora_edicao );
		        $obj->setStatus( $frm_status );
		        $obj->alterar();
		        
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
		        
		        NotificacaoManage2::Registrar(NotificacaoTipo::Alerta(), $objH->getIdUsuarioResponsavel(), "Responderam/encaminharam um novo arquivo/protocolo para você #".$obj->getIdArquivo(), Url::Arquivo($obj->getIdentificador()), "Resposta Arquivo/Protocolo");
		        
		        ArquivoManage2::Interacao_Email($obj);
		        
		        System::Redirect(
		          Url::_Path()."arquivo-view-".$obj->getIdentificador()."?msg-success=".base64_encode("Resposta cadastrada com sucesso.")
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
	$fileTemplate = "arquivo_reply.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Responder Arquivo/Protocolo: #".$obj->getIdArquivo().": ".$obj->getTitulo();
		
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( "Lojistas", Url::_Path()."lojista-list" );
		$Navegacao->Adicionar( "Arquivos", Url::_Path()."arquivo-list-".$objLojista->getIdentificador() );
		$Navegacao->Adicionar( "Arquivo #".$obj->getIdArquivo(), Url::_Path()."arquivo-view-".$obj->getIdentificador() );
		$Navegacao->Adicionar( "Responder" );
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("Titulo", $Titulo);
		
		$template->assign("itensLojista", LojistaManage2::Listagem());
		$template->assign("itensArquivoTipo", ArquivoTipoManage::consultarAttribute(ArquivoTipoAttribute::Status(), 1, SearchComparer::Igual(), ArquivoTipoAttribute::Titulo()));
		$template->assign("itensUsuario", UsuarioManage::consultarAttribute(UsuarioAttribute::Status(), UsuarioStatus::Ativo(), SearchComparer::Igual(), UsuarioAttribute::Nome()));
		$template->assign("inputAnexos", $inputAnexos);
		$template->assign("itensStatus", ArquivoStatus::_Values2());
		
		
		$template->assign("error", $error);
		$template->assign("success", $success);
		
	}
	$template->display($fileTemplate);

?>