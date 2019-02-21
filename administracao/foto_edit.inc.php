<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "foto_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "foto_add.php?back=$link_back";
	$link_edit = "foto_edit.php?id=$ID&back=$link_back";
	$link_remove = "foto_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Foto();
	if(!$obj->buscarFoto(1, $ID)){ System::Redirect($link_list); }

	$frm_id_lojista = System::_POST("FrmIdLojista");
	$frm_id_usuario = System::_POST("FrmIdUsuario");
	$frm_titulo = System::_POST("FrmTitulo");
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	$frm_imagem_remove = System::_POST("FrmImagemRemove");
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
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
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuбrio#";
		}
		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Tнtulo#";
		}
		$frm_imagem = ((!empty($frm_imagem_remove)) ? "" : $obj->getImagem() );
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
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setIdLojista( $frm_id_lojista ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setTitulo( $frm_titulo ); 
			$obj->setImagem( $frm_imagem ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setStatus( $frm_status ); 

			if($obj->alterarFoto()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_id_lojista = $obj->getIdLojista();
		$frm_id_usuario = $obj->getIdUsuario();
		$frm_titulo = $obj->getTitulo();
		$frm_imagem = $obj->getImagem();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_status = $obj->getStatus();
	}
?>