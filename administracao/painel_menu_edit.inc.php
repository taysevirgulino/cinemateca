<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "painel_menu_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "painel_menu_add.php?back=$link_back";
	$link_edit = "painel_menu_edit.php?id=$ID&back=$link_back";
	$link_remove = "painel_menu_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new PainelMenu();
	if(!$obj->buscarPainelMenu(1, $ID)){ System::Redirect($link_list); }

	$frm_id_painel_menu_pai = intval(System::_POST("FrmIdPainelMenuPai"));
	$frm_nome = System::_POST("FrmNome");
	$frm_url = System::_POST("FrmUrl");
	$frm_style = System::_POST("FrmStyle");
	$frm_target = System::_POST("FrmTarget");
	$frm_prioridade = $obj->getPrioridade();
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");
	$frm_id_usuario_perfil = $_POST["FrmIdUsuarioPerfil"];

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjPainelMenu = PainelMenuManage2::PainelMenusBySelect( $obj->getIdPainelMenu() );
	$VObjUsuarioPerfil = UsuarioPerfilManage::consultarAttribute(null, null, null, UsuarioPerfilAttribute::Titulo());

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		if( Validacao::isVazio($frm_url) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Url (Endereзo)#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setIdPainelMenuPai( $frm_id_painel_menu_pai ); 
			$obj->setNome( $frm_nome ); 
			$obj->setUrl( $frm_url ); 
			$obj->setStyle( $frm_style ); 
			$obj->setTarget( $frm_target ); 
			$obj->setPrioridade( $frm_prioridade ); 
			$obj->setStatus( $frm_status ); 

			if($obj->alterarPainelMenu()){
			    
			    PainelMenuManage2::Reordenar();
			    PainelMenuManage2::Gerenciar($obj->getIdPainelMenu(), $frm_id_usuario_perfil);
			    
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_id_painel_menu_pai = $obj->getIdPainelMenuPai();
		$frm_nome = $obj->getNome();
		$frm_url = $obj->getUrl();
		$frm_style = $obj->getStyle();
		$frm_target = $obj->getTarget();
		$frm_prioridade = $obj->getPrioridade();
		$frm_status = $obj->getStatus();
		
		$itensPainelMenuPerfil = PainelMenuPerfilManage::consultarSearchQuery(
		    array(
		        new SearchQueryComparer(PainelMenuPerfilAttribute::IdPainelMenu(), SearchComparer::Igual(), SearchCondition::E(), $obj->getIdPainelMenu()),
		    )
		);
	}
?>