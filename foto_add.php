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
	$frm_id_usuario = UsuarioLogin::IdUsuario();
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	$frm_datahora = date("Y-m-d H:i:s");
	$frm_status = 1;
	$frm_bt = System::_POST("btSubmit");
	
	if( !Validacao::isVazio($frm_titulo) ){
	    
	    $frm_imagem = "";
		if( ! Validacao::isVazio($frm_imagem_file["name"]) ){
		    $upload = new Upload();
		    $prename = date("YmdHis")."_";
		    if($upload->SendFile($frm_imagem_file, "images/foto/$prename", 2)){
		        $frm_imagem = $prename.$upload->getName();
		        $img = new Imagem();
		        $img->carregarImagem("images/foto/$frm_imagem");
		        $img->salvarImagemByCorte(240, 160, "images/foto/A$frm_imagem");
		        if( $img->getImagemWidth() > 940){
		            $img->salvarImagemByPorcentagemWidth(940);
		        }
		    }else{
		        $error[] = "Problema ao enviar imagem (verifique formato ou tamanho)";
		    }
		}else{
		    $error[] = "Selecione uma imagem";
		}
		
		if( count($error) <= 0 ){
            
		    $obj = new Foto();
			$obj->setIdLojista( $frm_id_lojista ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setTitulo( $frm_titulo ); 
			$obj->setImagem( $frm_imagem ); 
			$obj->setDatahora( $frm_datahora );
			$obj->setStatus( $frm_status ); 
		    
		    if( $obj->inserir() ){
                System::Redirect(
                    Url::_Path()."foto-list-".$objLojista->getIdentificador()."?msg-success=".base64_encode("Fotografia cadastrada com sucesso.")
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
	$fileTemplate = "foto_add.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Nova Fotografia: ".$objLojista->getNome();
		
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( "Lojistas", Url::_Path()."lojista-list" );
		$Navegacao->Adicionar( "Fotos", Url::_Path()."foto-list-".$objLojista->getIdentificador() );
		$Navegacao->Adicionar( $Titulo );
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("Titulo", $Titulo);
		$template->assign("objLojista", $objLojista);
		
		
		$template->assign("error", $error);
		$template->assign("success", $success);
		
	}
	$template->display($fileTemplate);

?>