<?
	$ID = intval($_REQUEST["id"]);
	if(empty($ID)){ System::Redirect("app_usuario_grupo_list.php"); } 
	$GRUPO = new AppUsuarioGrupo();
	if(!$GRUPO->buscarAppUsuarioGrupo(1, $ID)){ System::Redirect("app_usuario_grupo_list.php"); }
	
	$label_grupo = $GRUPO->getNome();
	
	$frm_qtd = intval($_POST["qtd"]);
	$vobj = array(); $vi = 0;
	for($i=0; $i < $frm_qtd; $i++){
		$value = $_POST["rb".$i];
		if(!empty($value)){
			$vobj[$vi] = $value;
			$vi++;
		}
	}
	
	$frm_bt = $_POST["btSubmit"];

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($label_alerta_erro) ){
			
			$vp = AppComponentePermissaoManage::consultarAppComponentePermissao(6, $ID);
			for($i=0; $i < count($vp); $i++){
				AppComponentePermissaoManage::excluirAppComponentePermissao($vp[$i]["id_app_permissao"]);
			}
			
			for($i=0; $i < count($vobj); $i++){
				AppComponentePermissaoManage::inserirAppComponentePermissao(-1, $ID, $vobj[$i], 1);
			}
			
			System::Redirect("app_usuario_grupo_list.php");
			
		}
	}else{
		$vobj = array();
		$vg = AppComponentePermissaoManage::consultarAppComponentePermissao(6, $ID);
		for($i=0; $i < count($vg); $i++){
			$vobj[$i] = $vg[$i]["id_app_componente"];
		}
	}
?>