<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "usuario_perfil_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "usuario_perfil_add.php?back=$link_back";
	$link_edit = "usuario_perfil_edit.php?back=$link_back";
	$link_remove = "usuario_perfil_remove.php?back=$link_back";

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_nivel = System::_POST("FrmNivel");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  T�tulo#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new UsuarioPerfil();
			$obj->setTitulo( $frm_titulo ); 
			$obj->setNivel( $frm_nivel ); 

			if($obj->inserirUsuarioPerfil()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro n�o Efetuado";
			}
		}
	}
?>