<?
	require_once("config.inc.php");

	Validar::Usuario();
	
	/*
	 * POST
	*/
	$error = array();
	$success = array();
	
	$frm_id_empreendimento = intval(System::_POST("FrmIdEmpreendimento"));
	$frm_bt = System::_POST("btSubmit");
	
	if( $frm_id_empreendimento > 0 ){
	    
	    $objEmpreendimento = new Empreendimento();
	    if( !$objEmpreendimento->buscarAttribute(EmpreendimentoAttribute::IdEmpreendimento(), $frm_id_empreendimento)){
	        $error[] = "Empreendimento não localizado";
	    }
		
		if( count($error) <= 0 ){
	
		    EmpreendimentoManage2::Empreendimento_Ativo($objEmpreendimento);
		    
		    $url = System::_GET("url");
		    if(!empty($url)){
		        $url = base64_decode($url);
		    }else{
		        $url = Url::Painel();
		    }
		    System::Redirect( $url );
			
		}
	}
	/*
	 * END POST
	*/
	
	$template = new LayoutTemplate();
	$fileTemplate = "entrar_empreendimento.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Entrar";
		
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( "Painel", Url::Painel() );
		$Navegacao->Adicionar( "Entrar" );
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("Titulo", $Titulo);
		$template->assign("empreendimentos", EmpreendimentoManage2::Empreendimentos_Usuario( UsuarioLogin::getUsuario() ));
		
		$template->assign("error", $error);
		$template->assign("success", $success);
		
	}
	$template->display($fileTemplate);

?>