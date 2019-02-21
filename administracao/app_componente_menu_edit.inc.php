<?
	$ID = intval( $_REQUEST["id"] );
	if( Validacao::isVazio($ID) ){ System::Redirect("app_componente_menu_list.php"); }	
	$obj = new AppComponenteMenu();
	if(!$obj->buscarAppComponenteMenu(1, $ID)){ System::Redirect("app_componente_menu_list.php"); }

	$frm_url = $_POST["FrmUrl"];
	$frm_descricao = $_POST["FrmDescricao"];
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	$frm_prioridade = $obj->getPrioridade();
	$frm_tipo = $_POST["FrmTipo"];
	$frm_status = $_POST["FrmStatus"];
	$frm_bt = $_POST["btSubmit"];

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		$frm_imagem = $obj->getImagem();
		if( ! Validacao::isVazio($frm_imagem_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_imagem_file, "../images/app_componente_menu/$prename", 2)){
				$frm_imagem = $prename.$upload->getName();
				/*$i = new Imagem();
				$i->carregarImagem("../images/app_componente_menu/$frm_imagem");
				$frm_imagem = "alt_$frm_imagem";
				$i->salvarImagem(100, 100, "../images/app_componente_menu/$frm_imagem");*/
			}else{
				$label_alerta_erro .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(AppComponenteMenuManage::alterarAppComponenteMenu($ID, null, $frm_url, $frm_descricao, $frm_imagem, $frm_prioridade, $frm_tipo, $frm_status)){
				$label_alerta_concluido .="Alteraчуo efetuada com sucesso!#Redirecionando...";
				$label_alerta_status = "disabled";
				System::Redirect("app_componente_menu_list.php");
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_url = $obj->getUrl();
		$frm_descricao = $obj->getDescricao();
		$frm_imagem = $obj->getImagem();
		$frm_prioridade = $obj->getPrioridade();
		$frm_tipo = $obj->getTipo();
		$frm_status = $obj->getStatus();
	}
?>