<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "lojista_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "lojista_add.php?back=$link_back";
	$link_edit = "lojista_edit.php?back=$link_back";
	$link_remove = "lojista_remove.php?back=$link_back";

	$frm_id_loja = System::_POST("FrmIdLoja");
	$frm_id_usuario_responsavel = System::_POST("FrmIdUsuarioResponsavel");
	$frm_nome = System::_POST("FrmNome");
	$frm_responsavel = System::_POST("FrmResponsavel");
	$frm_fraquia = System::_POST("FrmFraquia");
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	$frm_observacoes = System::_POST("FrmObservacoes");
	$frm_email = System::_POST("FrmEmail");
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjLoja = LojaManage::consultarLoja(1, "");
	$VObjUsuario = UsuarioManage::consultarUsuario(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_loja) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Loja#";
		}
		if( Validacao::isVazio($frm_id_usuario_responsavel) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuário#";
		}

		$frm_imagem = "";
		if( ! Validacao::isVazio($frm_imagem_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_imagem_file, "../images/lojista/$prename", 2)){
				$frm_imagem = $prename.$upload->getName();
				$img = new Imagem();
		        $img->carregarImagem("../images/lojista/$frm_imagem");
		        $img->salvarImagemByCorte(400, 400, "../images/lojista/A$frm_imagem");
		        if( $img->getImagemWidth() > 940){
		            $img->salvarImagemByPorcentagemWidth(940);
		        }
			}else{
				$label_alerta_erro .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new Lojista();
			$obj->setIdLoja( $frm_id_loja ); 
			$obj->setIdUsuarioResponsavel( $frm_id_usuario_responsavel ); 
			$obj->setNome( $frm_nome ); 
			$obj->setResponsavel( $frm_responsavel ); 
			$obj->setFraquia( $frm_fraquia ); 
			$obj->setImagem( $frm_imagem ); 
			$obj->setObservacoes( $frm_observacoes ); 
			$obj->setEmail( $frm_email ); 
			$obj->setStatus( $frm_status ); 

			if($obj->inserirLojista()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}else{
	    $frm_fraquia = 2;
	    $frm_status = 1;
	}
?>