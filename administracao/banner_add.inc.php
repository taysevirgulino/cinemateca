<?
	$link_add = "banner_add.php";
	$link_edit = "banner_edit.php";
	$link_remove = "banner_remove.php";
	$link_list = "banner_list.php";

	$frm_id_banner_local = System::_POST("FrmIdBannerLocal");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_url = System::_POST("FrmUrl");
	$frm_target = System::_POST("FrmTarget");
	$frm_width = System::_POST("FrmWidth");
	$frm_height = System::_POST("FrmHeight");
	$frm_periodo_status = System::_POST("FrmPeriodoStatus");
	$frm_periodo_inicial = System::_POST("FrmPeriodoInicial");
	$frm_periodo_final = System::_POST("FrmPeriodoFinal");
	$frm_arquivo_file = $_FILES["FrmArquivoFile"];
	$frm_tipo = System::_POST("FrmTipo");
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjBannerLocal = BannerLocalManage::consultarBannerLocalAttribute("", "", "", BannerLocalAttribute::Nome());

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_banner_local) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Banner Local#";
		}
		if( Validacao::isVazio($frm_descricao) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Descri��o#";
		}
		if( Validacao::isVazio($frm_url) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Url (Endere�o)#";
		}
		if( Validacao::isVazio($frm_target) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Abrir#";
		}
		if( Validacao::isVazio($frm_width) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Largura (Width)#";
		}
		if( Validacao::isVazio($frm_height) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Altura (Height)#";
		}
		$frm_arquivo = "";
		if( ! Validacao::isVazio($frm_arquivo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_arquivo_file, "../files/publicidade/$prename", 3)){
				$frm_arquivo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar arquivo. Verifique seu tipo ou tamanho.#";
			}
		}else{
			$label_alerta_erro .="Preencha/Selecione o(a)  Arquivo#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			
			$frm_tipo = BannerTipo::TipoByFile($frm_arquivo);
			
			if(BannerManage::inserirBanner(-1, null, null, $frm_id_banner_local, $frm_descricao, $frm_url, $frm_target, $frm_width, $frm_height, $frm_periodo_status, System::FormatarData($frm_periodo_inicial, "Y-m-d"), System::FormatarData($frm_periodo_final, "Y-m-d"), $frm_arquivo, $frm_tipo, $frm_status)){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro n�o Efetuado";
			}
		}
	}else{
		$frm_url = "http://";
		$frm_periodo_inicial = date("d/m/Y");
		$frm_periodo_final = System::SomarData($frm_periodo_inicial, 30);
	}
?>