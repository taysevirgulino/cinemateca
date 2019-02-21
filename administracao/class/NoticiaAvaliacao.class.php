<? 
class NoticiaAvaliacao extends AbstractEntity implements EntityInterface { 
	 
	protected $id_noticia_avaliacao, $identificador, $id_noticia, $valor, $sessao, $ip;
	 
	public function setNoticiaAvaliacao($IdNoticiaAvaliacao, $Identificador, $IdNoticia, $Valor, $Sessao, $Ip){ 
			$this->setIdNoticiaAvaliacao( $IdNoticiaAvaliacao ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdNoticia( $IdNoticia ); 
			$this->setValor( $Valor ); 
			$this->setSessao( $Sessao ); 
			$this->setIp( $Ip ); 
			return $this; 
	} 
 
	public function setIdNoticiaAvaliacao( $valor ){ $this->id_noticia_avaliacao = $valor; return $this; } 
	public function getIdNoticiaAvaliacao(){ return $this->id_noticia_avaliacao; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdNoticia( $valor ){ $this->id_noticia = $valor; return $this; } 
	public function getIdNoticia(){ return $this->id_noticia; } 
 
	public function setValor( $valor ){ $this->valor = $valor; return $this; } 
	public function getValor(){ return $this->valor; } 
 
	public function setSessao( $valor ){ $this->sessao = $valor; return $this; } 
	public function getSessao(){ return $this->sessao; } 
 
	public function setIp( $valor ){ $this->ip = $valor; return $this; } 
	public function getIp(){ return $this->ip; } 
 
}
?>