<?
	require_once("config.inc.php");

	Validar::Completo();

	$objEmpreendimento = EmpreendimentoManage2::Empreendimento_Ativo();
	
	/*
	 * POST
	*/
	$error = array();
	$success = array();
	
	$frm_id_empreendimento = $objEmpreendimento->getIdEmpreendimento();
	$frm_id_usuario = UsuarioLogin::IdUsuario();
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_arquivo_file = $_FILES["FrmArquivoFile"];
	$frm_datahora = date("Y-m-d H:i:s");
	$frm_status = 1;
	$frm_bt = System::_POST("btSubmit");
	
	if( !Validacao::isVazio($frm_titulo) ){
		
	   	 $frm_arquivo = "";
	    // if( ! Validacao::isVazio($frm_arquivo_file["name"]) ){
	    //     $upload = new Upload();
	    //     $prename = date("YmdHis")."_";
	    //     if($upload->SendFile($frm_arquivo_file, "files/documento/$prename", 3)){
	    //        $frm_arquivo = $prename.$upload->getName();
	    //     }
	    // }else{
	    //     $error[] = "Selecione um Arquivo";
	    // }
		
		if( count($error) <= 0 ){
            
		    $obj = new Documento();
			$obj->setIdEmpreendimento( $frm_id_empreendimento ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setTitulo( $frm_titulo ); 
			$obj->setArquivo( $frm_arquivo ); 
			$obj->setDatahora( $frm_datahora );
			$obj->setStatus( $frm_status ); 
		    
		    if( $obj->inserir() ){
		        
		        System::Redirect(
		          Url::_Path()."documento-list?msg-success=".base64_encode("Documento cadastrado com sucesso.")
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
	$fileTemplate = "documento_add.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Nova Disciplina";
		
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( "Disciplina", Url::_Path()."documento-list" );
		$Navegacao->Adicionar( $Titulo );
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("Titulo", $Titulo);
		
		$template->assign("error", $error);
		$template->assign("success", $success);
		
	}
	$template->display($fileTemplate);

?>