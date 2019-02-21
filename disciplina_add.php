<?
	require_once("config.inc.php");

	/*
	 * POST
	*/
	$error = array();
	$success = array();
	
	$frm_id_disciplina = System::_POST("FrmIdDisciplina");
	$frm_semestre = System::_POST("FrmSemestre");
	$frm_nome = System::_POST("FrmNome");
	$frm_conteudo = System::_POST("FrmConteudo");
	$frm_datahora = date("Y-m-d H:i:s");
	$frm_status = 1;
	$frm_bt = System::_POST("btSubmit");
	
	if( !Validacao::isVazio($frm_nome) ){
		
		if( count($error) <= 0 ){
            
		    $obj = new Disciplina();
			$obj->setIdDisciplina( $frm_id_disciplina ); 
			$obj->setSemestre( $frm_semestre ); 
			$obj->setNome( $frm_nome ); 
			$obj->setConteudo( $frm_conteudo ); 
			$obj->setDatahora( $frm_datahora );
			$obj->setStatus( $frm_status ); 
		    
		    if( $obj->inserir() ){
		        
		        System::Redirect(
		          Url::_Path()."disciplina-list?msg-success=".base64_encode("Disciplina cadastrada com sucesso.")
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
	$fileTemplate = "disciplina_add.tpl.php";
	
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
		$Navegacao->Adicionar( "Disciplina", Url::_Path()."disciplina-list" );
		$Navegacao->Adicionar( $Titulo );
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("Titulo", $Titulo);
		
		$template->assign("error", $error);
		$template->assign("success", $success);
		
	}
	$template->display($fileTemplate);

?>