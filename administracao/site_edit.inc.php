<?
	$ID = intval( System::_REQUEST("id") );
	$link_add = "site_add.php";
	$link_edit = "site_edit.php?id=$ID";
	$link_remove = "site_remove.php?id=$ID";
	$link_list = "site_list.php";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }	
	$obj = new Site();
	if(!$obj->buscarSite(1, $ID)){ System::Redirect($link_list); }

	$frm_titulo = System::_POST("FrmTitulo");
	$frm_email = System::_POST("FrmEmail");
	$frm_email_nome = System::_POST("FrmEmailNome");
	$frm_url = System::_POST("FrmUrl");
	$frm_host = System::_POST("FrmHost");
	$frm_template = System::_POST("FrmTemplate");
	$frm_imagem_topo_file = $_FILES["FrmImagemTopoFile"];
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$frm_qtd_grupos = intval($_POST["qtdGrupos"]);
	$vgrupos = array(); $vi = 0;
	for($i=0; $i < $frm_qtd_grupos; $i++){
		$value = $_POST["rbGrupo".$i];
		if(!empty($value)){
			$vgrupos[$vi] = $value;
			$vi++;
		}
	}	

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_titulo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Título#";
		}
		if( Validacao::isVazio($frm_email) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  E-mail#";
		}
		if( Validacao::isVazio($frm_email_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  E-mail Nome#";
		}
		if( Validacao::isVazio($frm_url) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Url (Endereço)#";
		}
		if( Validacao::isVazio($frm_host) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Host#";
		}
		if( Validacao::isVazio($frm_template) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Template#";
		}
		$frm_imagem_topo = $obj->getImagemTopo();
		/*if( ! Validacao::isVazio($frm_imagem_topo_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_imagem_topo_file, "../images/site/$prename", 2)){
				$frm_imagem_topo = $prename.$upload->getName();
			}else{
				$label_alerta_erro .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.#";
			}
		}*/

		if( Validacao::isVazio($label_alerta_erro) ){
			if(SiteManage::alterarSite($obj->getIdSite(), $obj->getIdentificador(), $frm_titulo, $frm_email, $frm_email_nome, $frm_url, $frm_host, $frm_template, $frm_imagem_topo, $frm_status)){
				
				$vg = SiteGrupoManage::consultarSiteGrupoAttribute(SiteGrupoAttribute::IdSite(), $ID, SearchComparer::Igual());
				for($i=0; $i < count($vg); $i++){
					SiteGrupoManage::excluirSiteGrupo($vg[$i]["id_site_grupo"]);
				}				
				
				for($i=0; $i < count($vgrupos); $i++){
					SiteGrupoManage::inserirSiteGrupo(-1, null, $ID, $vgrupos[$i]);
				}
								
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Alteração não Efetuada";
			}
		}
	}else{
		$frm_titulo = $obj->getTitulo();
		$frm_email = $obj->getEmail();
		$frm_email_nome = $obj->getEmailNome();
		$frm_url = $obj->getUrl();
		$frm_host = $obj->getHost();
		$frm_template = $obj->getTemplate();
		$frm_imagem_topo = $obj->getImagemTopo();
		$frm_status = $obj->getStatus();
		
		$vgrupos = array();
		$vg = SiteGrupoManage::consultarSiteGrupoAttribute(SiteGrupoAttribute::IdSite(), $ID, SearchComparer::Igual());
		for($i=0; $i < count($vg); $i++){
			$vgrupos[$i] = $vg[$i]["id_app_usuario_grupo"];
		}			
	}
?>