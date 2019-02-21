<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "curriculo_acesso_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "curriculo_acesso_add.php?back=$link_back";
	$link_edit = "curriculo_acesso_edit.php?id=$ID&back=$link_back";
	$link_remove = "curriculo_acesso_remove.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new CurriculoAcesso();
	if(!$obj->buscarCurriculoAcesso(1, $ID)){ System::Redirect($link_list); }

	$frm_id_curriculo = System::_POST("FrmIdCurriculo");
	$frm_id_usuario = System::_POST("FrmIdUsuario");
	$frm_datahora = $obj->getDatahora(); /*date("Y-m-d H:i:s"); $_POST["FrmDatahora"];*/
	$frm_ip = System::_POST("FrmIp");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjCurriculo = CurriculoManage::consultarCurriculo(1, "");
	$VObjUsuario = UsuarioManage::consultarUsuario(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_curriculo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Currнculo#";
		}
		if( Validacao::isVazio($frm_id_usuario) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Usuбrio#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj->setIdCurriculo( $frm_id_curriculo ); 
			$obj->setIdUsuario( $frm_id_usuario ); 
			$obj->setDatahora( System::FormatarData($frm_datahora, "Y-m-d H:i:s") );
			$obj->setIp( $frm_ip ); 

			if($obj->alterarCurriculoAcesso()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteraзгo nгo Efetuada";
			}
		}
	}else{
		$frm_id_curriculo = $obj->getIdCurriculo();
		$frm_id_usuario = $obj->getIdUsuario();
		$frm_datahora = System::FormatarData($obj->getDatahora(), "d/m/Y H:i:s");
		$frm_ip = $obj->getIp();
	}
?>