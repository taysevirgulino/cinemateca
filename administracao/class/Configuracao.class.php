<? 
class Configuracao extends AbstractEntity implements EntityInterface { 
	 
	protected $id_configuracao, $identificador, $nome, $numero, $cargo, $estado, $slogan, $partido, $coligacao, $cnpj, $email, $telefone, $endereco_completo, $rodape, $twitter_status, $twitter_username, $twitter_password, $twitter_rss_url, $link_twitter, $link_orkut, $link_youtube, $link_facebook, $link_flickr, $analytics_key, $template_topo, $template_conteudo;
	 
	public function setConfiguracao($IdConfiguracao, $Identificador, $Nome, $Numero, $Cargo, $Estado, $Slogan, $Partido, $Coligacao, $Cnpj, $Email, $Telefone, $EnderecoCompleto, $Rodape, $TwitterStatus, $TwitterUsername, $TwitterPassword, $TwitterRssUrl, $LinkTwitter, $LinkOrkut, $LinkYoutube, $LinkFacebook, $LinkFlickr, $AnalyticsKey, $TemplateTopo, $TemplateConteudo){ 
			$this->setIdConfiguracao( $IdConfiguracao ); 
			$this->setIdentificador( $Identificador ); 
			$this->setNome( $Nome ); 
			$this->setNumero( $Numero ); 
			$this->setCargo( $Cargo ); 
			$this->setEstado( $Estado ); 
			$this->setSlogan( $Slogan ); 
			$this->setPartido( $Partido ); 
			$this->setColigacao( $Coligacao ); 
			$this->setCnpj( $Cnpj ); 
			$this->setEmail( $Email ); 
			$this->setTelefone( $Telefone ); 
			$this->setEnderecoCompleto( $EnderecoCompleto ); 
			$this->setRodape( $Rodape ); 
			$this->setTwitterStatus( $TwitterStatus ); 
			$this->setTwitterUsername( $TwitterUsername ); 
			$this->setTwitterPassword( $TwitterPassword ); 
			$this->setTwitterRssUrl( $TwitterRssUrl ); 
			$this->setLinkTwitter( $LinkTwitter ); 
			$this->setLinkOrkut( $LinkOrkut ); 
			$this->setLinkYoutube( $LinkYoutube ); 
			$this->setLinkFacebook( $LinkFacebook ); 
			$this->setLinkFlickr( $LinkFlickr ); 
			$this->setAnalyticsKey( $AnalyticsKey ); 
			$this->setTemplateTopo( $TemplateTopo ); 
			$this->setTemplateConteudo( $TemplateConteudo ); 
			return $this; 
	} 
 
	public function setIdConfiguracao( $valor ){ $this->id_configuracao = $valor; return $this; } 
	public function getIdConfiguracao(){ return $this->id_configuracao; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setNumero( $valor ){ $this->numero = $valor; return $this; } 
	public function getNumero(){ return $this->numero; } 
 
	public function setCargo( $valor ){ $this->cargo = $valor; return $this; } 
	public function getCargo(){ return $this->cargo; } 
 
	public function setEstado( $valor ){ $this->estado = $valor; return $this; } 
	public function getEstado(){ return $this->estado; } 
 
	public function setSlogan( $valor ){ $this->slogan = $valor; return $this; } 
	public function getSlogan(){ return $this->slogan; } 
 
	public function setPartido( $valor ){ $this->partido = $valor; return $this; } 
	public function getPartido(){ return $this->partido; } 
 
	public function setColigacao( $valor ){ $this->coligacao = $valor; return $this; } 
	public function getColigacao(){ return $this->coligacao; } 
 
	public function setCnpj( $valor ){ $this->cnpj = $valor; return $this; } 
	public function getCnpj(){ return $this->cnpj; } 
 
	public function setEmail( $valor ){ $this->email = $valor; return $this; } 
	public function getEmail(){ return $this->email; } 
 
	public function setTelefone( $valor ){ $this->telefone = $valor; return $this; } 
	public function getTelefone(){ return $this->telefone; } 
 
	public function setEnderecoCompleto( $valor ){ $this->endereco_completo = $valor; return $this; } 
	public function getEnderecoCompleto(){ return $this->endereco_completo; } 
 
	public function setRodape( $valor ){ $this->rodape = $valor; return $this; } 
	public function getRodape(){ return $this->rodape; } 
 
	public function setTwitterStatus( $valor ){ $this->twitter_status = $valor; return $this; } 
	public function getTwitterStatus(){ return $this->twitter_status; } 
 
	public function setTwitterUsername( $valor ){ $this->twitter_username = $valor; return $this; } 
	public function getTwitterUsername(){ return $this->twitter_username; } 
 
	public function setTwitterPassword( $valor ){ $this->twitter_password = $valor; return $this; } 
	public function getTwitterPassword(){ return $this->twitter_password; } 
 
	public function setTwitterRssUrl( $valor ){ $this->twitter_rss_url = $valor; return $this; } 
	public function getTwitterRssUrl(){ return $this->twitter_rss_url; } 
 
	public function setLinkTwitter( $valor ){ $this->link_twitter = $valor; return $this; } 
	public function getLinkTwitter(){ return $this->link_twitter; } 
 
	public function setLinkOrkut( $valor ){ $this->link_orkut = $valor; return $this; } 
	public function getLinkOrkut(){ return $this->link_orkut; } 
 
	public function setLinkYoutube( $valor ){ $this->link_youtube = $valor; return $this; } 
	public function getLinkYoutube(){ return $this->link_youtube; } 
 
	public function setLinkFacebook( $valor ){ $this->link_facebook = $valor; return $this; } 
	public function getLinkFacebook(){ return $this->link_facebook; } 
 
	public function setLinkFlickr( $valor ){ $this->link_flickr = $valor; return $this; } 
	public function getLinkFlickr(){ return $this->link_flickr; } 
 
	public function setAnalyticsKey( $valor ){ $this->analytics_key = $valor; return $this; } 
	public function getAnalyticsKey(){ return $this->analytics_key; } 
 
	public function setTemplateTopo( $valor ){ $this->template_topo = $valor; return $this; } 
	public function getTemplateTopo(){ return $this->template_topo; } 
 
	public function setTemplateConteudo( $valor ){ $this->template_conteudo = $valor; return $this; } 
	public function getTemplateConteudo(){ return $this->template_conteudo; } 
 
}
?>