<?
	require_once("config.inc.php");

	$obj = new Eixo();
	if( !$obj->buscarAttribute(EixoAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Painel() );
	}
	
	/*
	 * POST
	*/
	$error = array();
	$success = array();
	
	$frm_id_eixo_categoria = System::_POST("FrmIdEixoCategoria");
	$frm_nome = System::_POST("FrmNome");
	$frm_id_disciplina = System::_POST("FrmIdDisciplina");
	$frm_datahora = date("Y-m-d H:i:s");
	$frm_bt = System::_POST("btSubmit");
	
	if( !Validacao::isVazio($frm_nome) ){
		
		if( count($error) <= 0 ){
            
			$obj->setIdEixoCategoria( $frm_id_eixo_categoria );
			$obj->setNome( $frm_nome ); 
			$obj->setIdDisciplina( $frm_id_disciplina );
			$obj->setDatahora( $frm_datahora );
		    
		    if( $obj->alterar() ){
		        
		        System::Redirect(
		          Url::_Path()."eixo-list?msg-success=".base64_encode("Eixo atualizado com sucesso.")
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
	$fileTemplate = "eixo_edit.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Editar Eixo";
		
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( "Eixo", Url::_Path()."eixo-list" );
		$Navegacao->Adicionar( $Titulo );
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("Titulo", $Titulo);

		$template->assign("itensEixoCategoria", EixoCategoriaManage::consultarAttribute(EixoCategoriaAttribute::Status(), 1, SearchComparer::Igual(), EixoCategoriaAttribute::Nome()));
		$template->assign("itensDisciplina", DisciplinaManage::consultarAttribute(DisciplinaAttribute::Status(), 1, SearchComparer::Igual(), DisciplinaAttribute::Nome()));
		
		$template->assign("obj", $obj);
		
		$template->assign("error", $error);
		$template->assign("success", $success);
		
	}
	$template->display($fileTemplate);

?>