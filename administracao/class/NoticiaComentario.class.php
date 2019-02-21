<? 
class NoticiaComentario extends AbstractEntity implements EntityInterface { 
	 
	protected $id_noticia_comentario, $identificador, $ide_origem, $id_noticia, $nome, $email, $url, $texto, $ip, $datahora, $status;
	 
	public function setNoticiaComentario($IdNoticiaComentario, $Identificador, $IdeOrigem, $IdNoticia, $Nome, $Email, $Url, $Texto, $Ip, $Datahora, $Status){ 
			$this->setIdNoticiaComentario( $IdNoticiaComentario ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setIdNoticia( $IdNoticia ); 
			$this->setNome( $Nome ); 
			$this->setEmail( $Email ); 
			$this->setUrl( $Url ); 
			$this->setTexto( $Texto ); 
			$this->setIp( $Ip ); 
			$this->setDatahora( $Datahora ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdNoticiaComentario( $valor ){ $this->id_noticia_comentario = $valor; return $this; } 
	public function getIdNoticiaComentario(){ return $this->id_noticia_comentario; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setIdNoticia( $valor ){ $this->id_noticia = $valor; return $this; } 
	public function getIdNoticia(){ return $this->id_noticia; } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setEmail( $valor ){ $this->email = $valor; return $this; } 
	public function getEmail(){ return $this->email; } 
 
	public function setUrl( $valor ){ $this->url = $valor; return $this; } 
	public function getUrl(){ return $this->url; } 
 
	public function setTexto( $valor ){ $this->texto = $valor; return $this; } 
	public function getTexto(){ return $this->texto; } 
 
	public function setIp( $valor ){ $this->ip = $valor; return $this; } 
	public function getIp(){ return $this->ip; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>