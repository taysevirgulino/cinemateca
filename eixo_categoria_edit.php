<?
	require_once("config.inc.php");

	// Validar::Completo();

	$obj = new EixoCategoria();
	if( !$obj->buscarAttribute(EixoCategoriaAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Painel() );
	}
	
	/*
	 * POST
	*/
	$error = array();
	$success = array();
	
	$frm_nome= System::_POST("FrmNome");
	$frm_datahora = date("Y-m-d H:i:s");
	$frm_bt = System::_POST("btSubmit");
	
	if( !Validacao::isVazio($frm_nome) ){
		
		if( count($error) <= 0 ){
            
			$obj->setNome( $frm_nome ); 
			$obj->setDatahora( $frm_datahora );
		    
		    if( $obj->alterar() ){
		        
		        System::Redirect(
		          Url::_Path()."eixo-categoria-list?msg-success=".base64_encode("Categoria do Eixo atualizada com sucesso.")
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
	$fileTemplate = "eixo_categoria_edit.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Editar Categoria do Eixo";
		
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( "Categoria do Eixo", Url::_Path()."eixo-categoria-list" );
		$Navegacao->Adicionar( $Titulo );
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("Titulo", $Titulo);
		
		$template->assign("obj", $obj);
		
		$template->assign("error", $error);
		$template->assign("success", $success);
		
	}
	$template->display($fileTemplate);

?>