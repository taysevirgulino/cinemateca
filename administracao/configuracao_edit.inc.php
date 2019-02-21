<?
	$ID = 1; // intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "configuracao_edit.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "configuracao_edit.php?back=$link_back";
	$link_edit = "configuracao_edit.php?id=$ID&back=$link_back";
	$link_remove = "configuracao_edit.php?id=$ID&back=$link_back";

	if( Validacao::isVazio($ID) ){ System::CloseBox($link_list); /*System::Redirect($link_list);*/ }	
	$obj = new Configuracao();
	if(!$obj->buscarConfiguracao(1, $ID)){ System::CloseBox($link_list); /*System::Redirect($link_list);*/ }

	$frm_nome = System::_POST("FrmNome");
	$frm_numero = System::_POST("FrmNumero");
	$frm_cargo = System::_POST("FrmCargo");
	$frm_estado = System::_POST("FrmEstado");
	$frm_slogan = System::_POST("FrmSlogan");
	$frm_partido = System::_POST("FrmPartido");
	$frm_coligacao = System::_POST("FrmColigacao");
	$frm_cnpj = System::_POST("FrmCnpj");
	$frm_email = System::_POST("FrmEmail");
	$frm_telefone = System::_POST("FrmTelefone");
	$frm_endereco_completo = System::_POST("FrmEnderecoCompleto");
	$frm_rodape = System::_POST("FrmRodape");
	$frm_twitter_status = System::_POST("FrmTwitterStatus");
	$frm_twitter_username = System::_POST("FrmTwitterUsername");
	$frm_twitter_password = System::_POST("FrmTwitterPassword");
	$frm_twitter_rss_url = System::_POST("FrmTwitterRssUrl");
	$frm_link_twitter = System::_POST("FrmLinkTwitter");
	$frm_link_orkut = System::_POST("FrmLinkOrkut");
	$frm_link_youtube = System::_POST("FrmLinkYoutube");
	$frm_link_facebook = System::_POST("FrmLinkFacebook");
	$frm_link_flickr = System::_POST("FrmLinkFlickr");
	$frm_analytics_key = System::_POST("FrmAnalyticsKey");
	$frm_template_topo = System::_POST("FrmTemplateTopo");
	$frm_template_conteudo = System::_POST("FrmTemplateConteudo");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;


	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		/*if( Validacao::isVazio($frm_numero) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nњmero#";
		}
		if( Validacao::isVazio($frm_cargo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Cargo#";
		}
		if( Validacao::isVazio($frm_estado) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Estado#";
		}
		if( Validacao::isVazio($frm_slogan) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Slogan#";
		}
		if( Validacao::isVazio($frm_partido) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Partido#";
		}
		if( Validacao::isVazio($frm_coligacao) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Coligaчуo#";
		}
		if( Validacao::isVazio($frm_cnpj) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Cnpj#";
		}*/
		if( Validacao::isVazio($frm_email) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  E-mail#";
		}

		if( Validacao::isVazio($label_alerta_erro) ){
			if(ConfiguracaoManage::alterarConfiguracao($ID, null, $frm_nome, $frm_numero, $frm_cargo, $frm_estado, $frm_slogan, $frm_partido, $frm_coligacao, $frm_cnpj, $frm_email, $frm_telefone, $frm_endereco_completo, $frm_rodape, $frm_twitter_status, $frm_twitter_username, $frm_twitter_password, $frm_twitter_rss_url, $frm_link_twitter, $frm_link_orkut, $frm_link_youtube, $frm_link_facebook, $frm_link_flickr, $frm_analytics_key, $frm_template_topo, $frm_template_conteudo)){
				//System::CloseBox($link_list); /*System::Redirect($link_list);*/
				$label_alerta_concluido .= "Informaчѕes salvas com sucesso";
			}else{
				$label_alerta_erro .="Alteraчуo nуo Efetuada";
			}
		}
	}else{
		$frm_nome = $obj->getNome();
		$frm_numero = $obj->getNumero();
		$frm_cargo = $obj->getCargo();
		$frm_estado = $obj->getEstado();
		$frm_slogan = $obj->getSlogan();
		$frm_partido = $obj->getPartido();
		$frm_coligacao = $obj->getColigacao();
		$frm_cnpj = $obj->getCnpj();
		$frm_email = $obj->getEmail();
		$frm_telefone = $obj->getTelefone();
		$frm_endereco_completo = $obj->getEnderecoCompleto();
		$frm_rodape = System::_TextByHtml($obj->getRodape());
		$frm_twitter_status = $obj->getTwitterStatus();
		$frm_twitter_username = $obj->getTwitterUsername();
		$frm_twitter_password = $obj->getTwitterPassword();
		$frm_twitter_rss_url = $obj->getTwitterRssUrl();
		$frm_link_twitter = $obj->getLinkTwitter();
		$frm_link_orkut = $obj->getLinkOrkut();
		$frm_link_youtube = $obj->getLinkYoutube();
		$frm_link_facebook = $obj->getLinkFacebook();
		$frm_link_flickr = $obj->getLinkFlickr();
		$frm_analytics_key = $obj->getAnalyticsKey();
		$frm_template_topo = $obj->getTemplateTopo();
		$frm_template_conteudo = $obj->getTemplateConteudo();
	}
?>