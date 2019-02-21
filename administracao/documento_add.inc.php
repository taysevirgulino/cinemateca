<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "documento_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "documento_add.php?back=$link_back";
	$link_edit = "documento_edit.php?back=$link_back";
	$link_remove = "documento_remove.php?back=$link_back";

	$frm_id_empreendimento = System::_POST("FrmIdEmpreendimento");
	$frm_id_usuario = 0;
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_arquivo_file = $_FILES["FrmArquivoFile"];
	$frm_datahora = date("Y-m-d H:i:s"); /*System::_POST("FrmDatahora");*/
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjEmpreendimento = EmpreendimentoManage::consultarEmpreendimento(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_empreendimento) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Empreendimento#";
		}
		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Título#";
		}
		$frm_arquivo = "";
		if( ! Validacao::isVazio($frm_arquivo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_arquivo_file, "../files/documento/$prename", 1)){
				$frm_arquivo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}else{
			$label_alerta_erro .="Preencha/Selecione o(a)  Arquivo#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new Documento();
			$obj->setIdEmpreendimento( $frm_id_empreendimento ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setTitulo( $frm_titulo ); 
			$obj->setArquivo( $frm_arquivo ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setStatus( $frm_status ); 

			if($obj->inserirDocumento()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}else{
	    $frm_status = 1;
	}
?>