<?
	require_once("config.inc.php");

	Validar::Completo();

	$obj = new Documento();
	if( !$obj->buscarAttribute(DocumentoAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Painel() );
	}
	
	$objEmpreendimento = EmpreendimentoManage2::Empreendimento_Ativo();
	
	/*
	 * POST
	*/
	$error = array();
	$success = array();
	
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_arquivo_file = $_FILES["FrmArquivoFile"];
	$frm_datahora = date("Y-m-d H:i:s");
	$frm_bt = System::_POST("btSubmit");
	
	if( !Validacao::isVazio($frm_titulo) ){
		
	   $frm_arquivo = $obj->getArquivo();
	    // if( ! Validacao::isVazio($frm_arquivo_file["name"]) ){
	    //     $upload = new Upload();
	    //     $prename = date("YmdHis")."_";
	    //     if($upload->SendFile($frm_arquivo_file, "files/documento/$prename", 3)){
	    //        $frm_arquivo = $prename.$upload->getName();
	    //     }
	    // }
		
		if( count($error) <= 0 ){
            
			$obj->setTitulo( $frm_titulo ); 
			$obj->setArquivo( $frm_arquivo ); 
			$obj->setDatahora( $frm_datahora );
		    
		    if( $obj->alterar() ){
		        
		        System::Redirect(
		          Url::_Path()."documento-list?msg-success=".base64_encode("Documento atualizado com sucesso.")
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
	$fileTemplate = "documento_edit.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Editar Semestre";
		
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( "Semestres", Url::_Path()."documento-list" );
		$Navegacao->Adicionar( $Titulo );
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("Titulo", $Titulo);
		
		$template->assign("obj", $obj);
		
		$template->assign("error", $error);
		$template->assign("success", $success);
		
	}
	$template->display($fileTemplate);

?>