<? 
class NoticiaRelacao extends AbstractEntity implements EntityInterface { 
	 
	protected $id_noticia_relacao, $identificador, $id_noticia, $id_noticia_ligacao;
	 
	public function setNoticiaRelacao($IdNoticiaRelacao, $Identificador, $IdNoticia, $IdNoticiaLigacao){ 
			$this->setIdNoticiaRelacao( $IdNoticiaRelacao ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdNoticia( $IdNoticia ); 
			$this->setIdNoticiaLigacao( $IdNoticiaLigacao ); 
			return $this; 
	} 
 
	public function setIdNoticiaRelacao( $valor ){ $this->id_noticia_relacao = $valor; return $this; } 
	public function getIdNoticiaRelacao(){ return $this->id_noticia_relacao; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdNoticia( $valor ){ $this->id_noticia = $valor; return $this; } 
	public function getIdNoticia(){ return $this->id_noticia; } 
 
	public function setIdNoticiaLigacao( $valor ){ $this->id_noticia_ligacao = $valor; return $this; } 
	public function getIdNoticiaLigacao(){ return $this->id_noticia_ligacao; } 
 
}
?>