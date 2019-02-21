<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "painel_menu_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "painel_menu_add.php?back=$link_back";
	$link_edit = "painel_menu_edit.php?back=$link_back";
	$link_remove = "painel_menu_remove.php?back=$link_back";

	$frm_id_painel_menu_pai = intval(System::_POST("FrmIdPainelMenuPai"));
	$frm_nome = System::_POST("FrmNome");
	$frm_url = System::_POST("FrmUrl");
	$frm_style = System::_POST("FrmStyle");
	$frm_target = System::_POST("FrmTarget");
	$frm_prioridade = PainelMenuManage::ultimaPrioridade();
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");
	$frm_id_usuario_perfil = $_POST["FrmIdUsuarioPerfil"];

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjPainelMenu = PainelMenuManage2::PainelMenusBySelect();
	$VObjUsuarioPerfil = UsuarioPerfilManage::consultarAttribute(null, null, null, UsuarioPerfilAttribute::Titulo());

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		if( Validacao::isVazio($frm_url) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Url (Endereço)#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new PainelMenu();
			$obj->setIdPainelMenuPai( $frm_id_painel_menu_pai ); 
			$obj->setNome( $frm_nome ); 
			$obj->setUrl( $frm_url ); 
			$obj->setStyle( $frm_style ); 
			$obj->setTarget( $frm_target ); 
			$obj->setPrioridade( $frm_prioridade ); 
			$obj->setStatus( $frm_status ); 

			if($obj->inserir()){
			    
			    PainelMenuManage2::Reordenar();
			    PainelMenuManage2::Gerenciar($obj->getIdPainelMenu(), $frm_id_usuario_perfil);
			    
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}else{
		$frm_status = 1;
	}
?>