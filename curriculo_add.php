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
	$frm_id_curriculo_area = intval(System::_POST("FrmIdCurriculoArea"));
	$frm_id_curriculo_segmento = intval(System::_POST("FrmIdCurriculoSegmento"));
	$frm_nome = System::Strtoupper(System::_POST("FrmNome"));
	$frm_sobrenome = System::Strtoupper(System::_POST("FrmSobrenome"));
	$frm_sexo = System::_POST("FrmSexo");
	$frm_data_nascimento = System::_POST("FrmDataNascimento");
	$frm_cpf = Mascara::CPF(System::_POST("FrmCpf"));
	$frm_estado_civil = System::_POST("FrmEstadoCivil");
	$frm_telefone = System::_POST("FrmTelefone");
	$frm_telefone2 = System::_POST("FrmTelefone2");
	$frm_email = System::Strtolower(System::_POST("FrmEmail"));
	$frm_endereco = System::_POST("FrmEndereco");
	$frm_cidade = System::Strtoupper(System::_POST("FrmCidade"));
	$frm_estado = System::_POST("FrmEstado");
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	$frm_arquivo_file = $_FILES["FrmArquivoFile"];
	$frm_datahora = date("Y-m-d H:i:s");
	$frm_status = 1;
	$frm_bt = System::_POST("btSubmit");
	
	if( !Validacao::isVazio($frm_nome) ){
	   
	    if( Validacao::isVazio($frm_sobrenome) ){
	        $error[] = "Preencha o Sobrenome";
	    }
	    if( Validacao::isVazio($frm_sexo) ){
	        $error[] = "Preencha o Sexo";
	    }
	    
	    $frm_arquivo = "";
	    if( ! Validacao::isVazio($frm_arquivo_file["name"]) ){
	        $upload = new Upload();
	        $prename = date("YmdHis")."_";
	        if($upload->SendFile($frm_arquivo_file, "files/curriculo/$prename", 3)){
	           $frm_arquivo = $prename.$upload->getName();
	        }
	    }
	    
	    $frm_imagem = "";
	    if( ! Validacao::isVazio($frm_imagem_file["name"]) ){
	        $upload = new Upload();
	        $prename = date("YmdHis")."_";
	        if($upload->SendFile($frm_imagem_file, "images/curriculo/$prename", 2)){
	            $frm_imagem = $prename.$upload->getName();
	            $img = new Imagem();
	            $img->carregarImagem("images/curriculo/$frm_imagem");
		        $img->salvarImagemByCorte(400, 400, "images/curriculo/A$frm_imagem");
		        if( $img->getImagemWidth() > 940){
		            $img->salvarImagemByPorcentagemWidth(940);
		        }
	        }
	    }
		
		if( count($error) <= 0 ){
            
		    $obj = new Curriculo();
			$obj->setIdEmpreendimento( $frm_id_empreendimento ); 
			$obj->setIdCurriculoArea( $frm_id_curriculo_area ); 
			$obj->setIdCurriculoSegmento( $frm_id_curriculo_segmento ); 
			$obj->setNome( $frm_nome ); 
			$obj->setSobrenome( $frm_sobrenome ); 
			$obj->setSexo( $frm_sexo ); 
			$obj->setDataNascimento( (Validacao::isData($frm_data_nascimento)) ? System::FormatarData($frm_data_nascimento, "Y-m-d") : "0000-00-00" );
			$obj->setCpf( $frm_cpf ); 
			$obj->setEstadoCivil( $frm_estado_civil ); 
			$obj->setTelefone( $frm_telefone ); 
			$obj->setTelefone2( $frm_telefone2 ); 
			$obj->setEmail( $frm_email ); 
			$obj->setEndereco( $frm_endereco ); 
			$obj->setCidade( $frm_cidade ); 
			$obj->setEstado( $frm_estado ); 
			$obj->setImagem( $frm_imagem ); 
			$obj->setArquivo( $frm_arquivo ); 
			$obj->setDatahora( $frm_datahora );
			$obj->setStatus( $frm_status );  
		    
		    if( $obj->inserir() ){
		        
		        System::Redirect(
		          Url::_Path()."curriculo-list?msg-success=".base64_encode("Currículo cadastrado com sucesso.")
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
	$fileTemplate = "curriculo_add.tpl.php";
	
	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Novo Currículo";
		
		$template->setTitle($Titulo);
		$template->Load();
		
		/*
		 * PAGE
		 */
		
		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( "Currículos", Url::_Path()."curriculo-list" );
		$Navegacao->Adicionar( $Titulo );
		$template->assign("Navegacao", $Navegacao->Gerar());
		
		$template->assign("Titulo", $Titulo);
		$template->assign("itensCurriculoArea", CurriculoAreaManage::consultarAttribute(CurriculoAreaAttribute::Status(), 1, SearchComparer::Igual(), CurriculoAreaAttribute::Titulo()));
		$template->assign("itensCurriculoSegmento", CurriculoSegmentoManage::consultarAttribute(CurriculoSegmentoAttribute::Status(), 1, SearchComparer::Igual(), CurriculoSegmentoAttribute::Titulo()));
		
		$template->assign("error", $error);
		$template->assign("success", $success);
		
	}
	$template->display($fileTemplate);

?>