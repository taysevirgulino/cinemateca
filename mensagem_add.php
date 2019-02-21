<?
	require_once("config.inc.php");

	Validar::Completo();

	$objEmpreendimento = EmpreendimentoManage2::Empreendimento_Ativo();
	
	/*
	 * POST
	*/
	$error = array();
	$success = array();
	
	$frm_destinatario = $_POST["FrmDestinatario"];
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_texto = System::_POST("FrmTexto");
	$frm_arquivo_file = $_FILES["FrmArquivoFile"];
	$frm_bt = System::_POST("btSubmit");
	
	if( !Validacao::isVazio($frm_titulo) ){
	
	    if( Validacao::isVazio($frm_texto) ){
	        $error[] = "Preencha o Texto";
	    }
	    
	    $frm_arquivo = "";
	    if( ! Validacao::isVazio($frm_arquivo_file["name"]) ){
	        $upload = new Upload();
	        $prename = date("YmdHis")."_";
	        if($upload->SendFile($frm_arquivo_file, "files/mensagem/$prename", 3)){
	           $frm_arquivo = $prename.$upload->getName();
	        }
	    }
	    
		if( count($error) <= 0 ){
		    
		    if( MensagemManage2::Enviar($frm_destinatario, $frm_titulo, $frm_texto, $frm_arquivo) ){
		        
		        System::Redirect(
		          Url::_Path()."mensagem-list?msg-success=".base64_encode("Mensagem enviada com sucesso.")
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
	$fileTemplate = "mensagem_add.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Nova Mensagem";
		
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( "Mensagens", Url::_Path()."mensagem-list" );
		$Navegacao->Adicionar( $Titulo );
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("Titulo", $Titulo);
		
		$itensEmpreendimento = array();
		$itensSegmento = array();
		$itensLojista = array();
		$itensUsuario = array();
		
		$objUsuario = UsuarioLogin::getUsuario();
		if( $objUsuario->getIdUsuarioPerfil() == 1){
		    $itensUsuario = UsuarioManage2::consultarAttribute(UsuarioAttribute::Status(), UsuarioStatus::Ativo(), SearchComparer::Igual(), UsuarioAttribute::Nome());
		}else{
		    $itensEmpreendimento = EmpreendimentoManage::consultarAttribute(EmpreendimentoAttribute::IdEmpreendimento(), $objEmpreendimento->getIdEmpreendimento());
		    $itensLojista = LojistaManage2::Listagem();
		    $itensUsuario = UsuarioManage2::consultarAttribute(UsuarioAttribute::Status(), UsuarioStatus::Ativo(), SearchComparer::Igual(), UsuarioAttribute::Nome());
		    $itensSegmento = SegmentoManage::consultarAttribute(null, null, null, SegmentoAttribute::Titulo());
		}
		
		$template->assign("itensEmpreendimento", $itensEmpreendimento);
		$template->assign("itensLojista", $itensLojista);
		$template->assign("itensUsuario", $itensUsuario);
		$template->assign("itensSegmento", $itensSegmento);
		
		$template->assign("error", $error);
		$template->assign("success", $success);
		
	}
	$template->display($fileTemplate);

?>