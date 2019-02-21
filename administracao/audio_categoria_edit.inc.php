<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "audio_categoria_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "audio_categoria_add.php?back=$link_back";
	$link_edit = "audio_categoria_edit.php?id=$ID&back=$link_back";
	$link_remove = "audio_categoria_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new AudioCategoria();
	if(!$obj->buscarAudioCategoria(1, $ID)){ System::Redirect($link_list); }

	$frm_nome = System::_POST("FrmNome");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_prioridade = $obj->getPrioridade();
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(AudioCategoriaManage::alterarAudioCategoria($ID, null, null, $frm_nome, $frm_descricao, $frm_prioridade)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_nome = $obj->getNome();
		$frm_descricao = $obj->getDescricao();
		$frm_prioridade = $obj->getPrioridade();
	}
?>