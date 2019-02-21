<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "foto_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "foto_add.php?back=$link_back";
	$link_edit = "foto_edit.php?back=$link_back";
	$link_remove = "foto_remove.php?back=$link_back";

	$frm_id_lojista = System::_POST("FrmIdLojista");
	$frm_id_usuario = System::_POST("FrmIdUsuario");
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjLojista = LojistaManage::consultarLojista(1, "");
	$VObjUsuario = UsuarioManage::consultarUsuario(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_lojista) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Lojista#";
		}
		if( Validacao::isVazio($frm_id_usuario) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuário#";
		}
		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Título#";
		}
		$frm_imagem = "";
		if( ! Validacao::isVazio($frm_imagem_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_imagem_file, "../images/foto/$prename", 2)){
				$frm_imagem = $prename.$upload->getName();
				/*$i = new Imagem();
				$i->carregarImagem("../images/foto/$frm_imagem");
				$frm_imagem = "alt_$frm_imagem";
				$i->salvarImagem(100, 100, "../images/foto/$frm_imagem");*/
			}else{
				$label_alerta_erro .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.#";
			}
		}else{
			$label_alerta_erro .="Preencha/Selecione o(a)  Imagem#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new Foto();
			$obj->setIdLojista( $frm_id_lojista ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setTitulo( $frm_titulo ); 
			$obj->setImagem( $frm_imagem ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setStatus( $frm_status ); 

			if($obj->inserirFoto()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>