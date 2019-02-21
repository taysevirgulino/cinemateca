<?
	require_once("config.inc.php");

	Validar::Completo();

	$obj = new Mensagem();
	if( !$obj->buscarAttribute(MensagemAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Painel() );
	}
	
	$objEmpreendimento = EmpreendimentoManage2::Empreendimento_Ativo();
	
	/*
	 * POST
	*/
	$error = array();
	$success = array();
	
	$frm_texto = System::_POST("FrmTexto");
	$frm_arquivo_file = $_FILES["FrmArquivoFile"];
	$frm_bt = System::_POST("btSubmit");
	
	if( !Validacao::isVazio($frm_texto) ){
	
	    $frm_arquivo = "";
	    if( ! Validacao::isVazio($frm_arquivo_file["name"]) ){
	        $upload = new Upload();
	        $prename = date("YmdHis")."_";
	        if($upload->SendFile($frm_arquivo_file, "files/mensagem/$prename", 3)){
	           $frm_arquivo = $prename.$upload->getName();
	        }
	    }
	    
		if( count($error) <= 0 ){
		    
		    if( MensagemManage2::Responder($obj, $frm_texto, $frm_arquivo) ){
		        
		        System::Redirect(
		          Url::_Path()."mensagem-view-".$obj->getIdentificador()."?msg-success=".base64_encode("Mensagem respondida com sucesso.")
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
	$fileTemplate = "mensagem_reply.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Responder Mensagem: ".$obj->getTitulo();
		
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( "Mensagens", Url::_Path()."mensagem-list" );
		$Navegacao->Adicionar( "Responder" );
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("Titulo", $Titulo);
		
		$template->assign("error", $error);
		$template->assign("success", $success);
		
	}
	$template->display($fileTemplate);

?>