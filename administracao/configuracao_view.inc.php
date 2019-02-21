<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "configuracao_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "configuracao_add.php?back=$link_back";
	$link_edit = "configuracao_edit.php?id=$ID&back=$link_back";
	$link_remove = "configuracao_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Configuracao();

	if( $obj->buscarConfiguracao(1, $ID) ){
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
		$frm_twitter_status = (($obj->getTwitterStatus()==1) ? "Ativo" : "Inativo");
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
	}else{
		System::Redirect($link_list);
	}
?>