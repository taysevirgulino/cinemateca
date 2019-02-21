<? 
class Site extends AbstractEntity implements EntityInterface { 
	 
	protected $id_site, $identificador, $titulo, $email, $email_nome, $url, $host, $template, $imagem_topo, $status;
	 
	public function setSite($IdSite, $Identificador, $Titulo, $Email, $EmailNome, $Url, $Host, $Template, $ImagemTopo, $Status){ 
			$this->setIdSite( $IdSite ); 
			$this->setIdentificador( $Identificador ); 
			$this->setTitulo( $Titulo ); 
			$this->setEmail( $Email ); 
			$this->setEmailNome( $EmailNome ); 
			$this->setUrl( $Url ); 
			$this->setHost( $Host ); 
			$this->setTemplate( $Template ); 
			$this->setImagemTopo( $ImagemTopo ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdSite( $valor ){ $this->id_site = $valor; return $this; } 
	public function getIdSite(){ return $this->id_site; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setEmail( $valor ){ $this->email = $valor; return $this; } 
	public function getEmail(){ return $this->email; } 
 
	public function setEmailNome( $valor ){ $this->email_nome = $valor; return $this; } 
	public function getEmailNome(){ return $this->email_nome; } 
 
	public function setUrl( $valor ){ $this->url = $valor; return $this; } 
	public function getUrl(){ return $this->url; } 
 
	public function setHost( $valor ){ $this->host = $valor; return $this; } 
	public function getHost(){ return $this->host; } 
 
	public function setTemplate( $valor ){ $this->template = $valor; return $this; } 
	public function getTemplate(){ return $this->template; } 
 
	public function setImagemTopo( $valor ){ $this->imagem_topo = $valor; return $this; } 
	public function getImagemTopo(){ return $this->imagem_topo; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>