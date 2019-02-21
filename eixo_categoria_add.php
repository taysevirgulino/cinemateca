<?
	require_once("config.inc.php");

	/*
	 * POST
	*/
	$error = array();
	$success = array();
	
	$frm_id_eixo_categoria = System::_POST("FrmIdEixoCategoria");
	$frm_nome = System::_POST("FrmNome");
	$frm_datahora = date("Y-m-d H:i:s");
	$frm_status = 1;
	$frm_bt = System::_POST("btSubmit");
	
	if( !Validacao::isVazio($frm_nome) ){
		
		if( count($error) <= 0 ){
            
		    $obj = new EixoCategoria();
			$obj->setIdEixoCategoria( $frm_id_eixo_categoria ); 
			$obj->setNome( $frm_nome ); 
			$obj->setDatahora( $frm_datahora );
			$obj->setStatus( $frm_status ); 
		    
		    if( $obj->inserir() ){
		        
		        System::Redirect(
		          Url::_Path()."eixo-categoria-list?msg-success=".base64_encode("Categoria do Eixo cadastrada com sucesso.")
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
	$fileTemplate = "eixo_categoria_add.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Nova Categoria do Eixo";
		
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
		
		$template->assign("error", $error);
		$template->assign("success", $success);
		
	}
	$template->display($fileTemplate);

?>