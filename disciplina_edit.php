<?
	require_once("config.inc.php");

	// Validar::Completo();

	$obj = new Disciplina();
	if( !$obj->buscarAttribute(DisciplinaAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Painel() );
	}
	
	/*
	 * POST
	*/
	$error = array();
	$success = array();
	
	$frm_semestre = System::_POST("FrmSemestre");
	$frm_nome= System::_POST("FrmNome");
	$frm_conteudo = System::_POST("FrmConteudo");
	$frm_datahora = date("Y-m-d H:i:s");
	$frm_bt = System::_POST("btSubmit");
	
	if( !Validacao::isVazio($frm_nome) ){
		
		if( count($error) <= 0 ){
            
            $obj->setSemestre( $frm_semestre ); 
			$obj->setNome( $frm_nome ); 
			$obj->setConteudo( $frm_conteudo ); 
			$obj->setDatahora( $frm_datahora );
		    
		    if( $obj->alterar() ){
		        
		        System::Redirect(
		          Url::_Path()."disciplina-list?msg-success=".base64_encode("Disciplina atualizada com sucesso.")
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
	$fileTemplate = "disciplina_edit.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Editar Disciplina";
		
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( "Disciplina", Url::_Path()."disciplina-list" );
		$Navegacao->Adicionar( $Titulo );
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("Titulo", $Titulo);
		
		$template->assign("obj", $obj);
		
		$template->assign("error", $error);
		$template->assign("success", $success);
		
	}
	$template->display($fileTemplate);

?>