<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "documento_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "documento_add.php?back=$link_back";
	$link_edit = "documento_edit.php?id=$ID&back=$link_back";
	$link_remove = "documento_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Documento();
	if(!$obj->buscarDocumento(1, $ID)){ System::Redirect($link_list); }

	$frm_id_empreendimento = System::_POST("FrmIdEmpreendimento");
	$frm_id_usuario = $obj->getIdUsuario();
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_arquivo_file = $_FILES["FrmArquivoFile"];
	$frm_arquivo_remove = System::_POST("FrmArquivoRemove");
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
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
			$label_alerta_erro .="Preencha/Selecione o(a)  Tнtulo#";
		}
		
		$frm_arquivo = ((!empty($frm_arquivo_remove)) ? "" : $obj->getArquivo() );
		if( ! Validacao::isVazio($frm_arquivo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_arquivo_file, "../files/documento/$prename", 1)){
				$frm_arquivo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setIdEmpreendimento( $frm_id_empreendimento ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setTitulo( $frm_titulo ); 
			$obj->setArquivo( $frm_arquivo ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setStatus( $frm_status ); 

			if($obj->alterarDocumento()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_id_empreendimento = $obj->getIdEmpreendimento();
		$frm_id_usuario = $obj->getIdUsuario();
		$frm_titulo = $obj->getTitulo();
		$frm_arquivo = $obj->getArquivo();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_status = $obj->getStatus();
	}
?>