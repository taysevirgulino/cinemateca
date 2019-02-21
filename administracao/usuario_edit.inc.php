<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "usuario_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "usuario_add.php?back=$link_back";
	$link_edit = "usuario_edit.php?id=$ID&back=$link_back";
	$link_remove = "usuario_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Usuario();
	if(!$obj->buscarUsuario(1, $ID)){ System::Redirect($link_list); }

	$frm_id_usuario_perfil = System::_POST("FrmIdUsuarioPerfil");
	$frm_nome = System::_POST("FrmNome");
	$frm_email = System::_POST("FrmEmail");
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	$frm_imagem_remove = System::_POST("FrmImagemRemove");
	$frm_login = System::_POST("FrmLogin");
	$frm_senha = System::_POST("FrmSenha");
	$frm_datahora_cadastro = $obj->getDatahoraCadastro();
	$frm_datahora_edicao = "Y-m-d H:i:s";
	$frm_datahora_login = $obj->getDatahoraLogin();
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjUsuarioPerfil = UsuarioPerfilManage::consultarAttribute(UsuarioPerfilAttribute::IdUsuarioPerfil(), 1, SearchComparer::Diferente());
	$VObjStatus = UsuarioStatus::_Values();

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_usuario_perfil) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuсrio Perfil#";
		}
		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		if( Validacao::isVazio($frm_email) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  E-mail#";
		}
		if( Validacao::isVazio($frm_login) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Login#";
		}
		$frm_imagem = ((!empty($frm_imagem_remove)) ? "" : $obj->getImagem() );
		if( ! Validacao::isVazio($frm_imagem_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_imagem_file, "../images/usuario/$prename", 2)){
				$frm_imagem = $prename.$upload->getName();
				$img = new Imagem();
		        $img->carregarImagem("../images/usuario/$frm_imagem");
		        $img->salvarImagemByCorte(400, 400, "../images/usuario/A$frm_imagem");
		        if( $img->getImagemWidth() > 940){
		            $img->salvarImagemByPorcentagemWidth(940);
		        }
			}else{
				$label_alerta_erro .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setIdUsuarioPerfil( $frm_id_usuario_perfil ); 
			$obj->setNome( $frm_nome ); 
			$obj->setEmail( $frm_email ); 
			$obj->setImagem( $frm_imagem ); 
			$obj->setLogin( $frm_login ); 
			if( !empty($frm_senha) ){
			 $obj->setSenha( UsuarioCrypt::Encrypt($frm_senha) );
			} 
			$obj->setDatahoraCadastro( System::FormatarData($frm_datahora_cadastro, "Y-m-d H:i:s") );
			$obj->setDatahoraEdicao( System::FormatarData($frm_datahora_edicao, "Y-m-d H:i:s") );
			$obj->setDatahoraLogin( System::FormatarData($frm_datahora_login, "Y-m-d H:i:s") );
			$obj->setStatus( $frm_status ); 

			if($obj->alterarUsuario()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_id_usuario_perfil = $obj->getIdUsuarioPerfil();
		$frm_nome = $obj->getNome();
		$frm_email = $obj->getEmail();
		$frm_imagem = $obj->getImagem();
		$frm_login = $obj->getLogin();
		$frm_senha = UsuarioCrypt::Decrypt($obj->getSenha());
		$frm_datahora_cadastro = System::FormatarData($obj->getDatahoraCadastro(), "d/m/Y H:i:s");
		$frm_datahora_edicao = System::FormatarData($obj->getDatahoraEdicao(), "d/m/Y H:i:s");
		$frm_datahora_login = System::FormatarData($obj->getDatahoraLogin(), "d/m/Y H:i:s");
		$frm_status = $obj->getStatus();
	}
?>