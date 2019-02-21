<?
	require_once("config.inc.php");

	Validar::Completo();
    $objUsuario = UsuarioLogin::getUsuario();
   

	$objLojista = new Lojista();
	if( !$objLojista->buscarAttribute(LojistaAttribute::Identificador(), System::_GET("ide")) ){
	    System::Redirect( Url::Painel() );
	}


	/*
	 * POST
	*/
	$error = array();
	$success = array();

	$frm_nome = System::_POST("FrmNome");
	$frm_responsavel = System::_POST("FrmResponsavel");
	$frm_fraquia = intval(System::_POST("FrmFraquia"));
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	$frm_observacoes = System::_POST("FrmObservacoes");
	$frm_email = System::_POST("FrmEmail");
	$frm_bt = System::_POST("btSubmit");


	$frm_id_lojista =  $objLojista->getIdLojista();
	$frm_id_lojista_pessoa_perfil = 4;


	$frm_telefone = 1;

	$frm_usuario = intval(System::_POST("FrmUsuario"));
	$frm_login = System::_POST("FrmLogin");
	$frm_senha = System::_POST("FrmSenha");
	$frm_status = 0;
	if( !Validacao::isVazio($frm_nome) ){

	 //    if( Validacao::isVazio($frm_responsavel) ){
		// 	$error[] = "Preencha o Responsável";
		// }

		$frm_imagem = $objLojista->getImagem();
		if( ! Validacao::isVazio($frm_imagem_file["name"]) ){
		    $upload = new Upload();
		    $prename = date("YmdHis")."_";
		    if($upload->SendFile($frm_imagem_file, "images/lojista/$prename", 2)){
		        $frm_imagem = $prename.$upload->getName();
		        $img = new Imagem();
		        $img->carregarImagem("images/lojista/$frm_imagem");
		        $img->salvarImagemByCorte(400, 400, "images/lojista/A$frm_imagem");
		        if( $img->getImagemWidth() > 940){
		            $img->salvarImagemByPorcentagemWidth(940);
		        }
		    }else{
		        $error[] = "Problema ao enviar imagem (verifique formato ou tamanho)";
		    }
		}

		if( count($error) <= 0 ){

			$obj = new LojistaPessoa();
			$obj->setIdLojista( $frm_id_lojista );
			$obj->setIdLojistaPessoaPerfil( $frm_id_lojista_pessoa_perfil );
			$obj->setIdUsuario( $frm_usuario==1 );
			$obj->setNome( $frm_nome );
			$obj->setEmail( $frm_email );
			$obj->setTelefone( $frm_telefone );
			$obj->setStatus( $frm_status );


			 if( $obj->inserir() ){

			$rsa = UsuarioManage2::LojistaPessoa($obj, $frm_login, $frm_senha, ($frm_usuario==1));

		    $objLojista->setNome( $frm_nome );
			$objLojista->setResponsavel( $frm_responsavel );
			$objLojista->setFraquia( $frm_fraquia );
			$objLojista->setImagem( $frm_imagem );
			$objLojista->setObservacoes( $frm_observacoes );
			$objLojista->setEmail( $frm_email );


		    if( $objLojista->alterar() ){
				$rs = UsuarioManage2::Lojista($objLojista, $frm_login, $frm_senha, ($frm_usuario==1));
				if($frm_login != ""){
				 $mail = new Email(CurrentSite::Site());
                 $mail->Usuario($objLojista, $frm_login, $frm_senha, $objUsuario);
				}
				if( $rs ){
		            System::Redirect( Url::_Path()."lojista-list?msg-success=".base64_encode("Contato cadastrado com sucesso.") );

		        }
		        System::Redirect(
		          Url::_Path()."lojista-list?msg-success=".base64_encode("Lojista salvo com sucesso.")
		        );
		    }else{
		        $error[] = "Problema ao salvar lojista, tente novamente daqui alguns minutos";
		    }

		}
		}
	}
	/*
	 * END POST
	*/

	$template = new LayoutTemplate();
	$fileTemplate = "lojista_edit.tpl.php";

	if( !$template->isCached($fileTemplate) ){
		/*
		 * DEFAULT
		 */
		$Titulo = "Editar Lojista: ".$objLojista->getNome();

		$template->setTitle($Titulo);
		$template->Load();

		/*
		 * PAGE
		 */

		$Navegacao = new Navegacao();
		$Navegacao->Adicionar( "Lojistas", Url::_Path()."lojista-list" );
		$Navegacao->Adicionar( $Titulo );
		$template->assign("Navegacao", $Navegacao->Gerar());

		$template->assign("Titulo", $Titulo);
		$template->assign("objLojista", $objLojista);

		$template->assign("error", $error);
		$template->assign("success", $success);

	}
	$template->display($fileTemplate);

?>