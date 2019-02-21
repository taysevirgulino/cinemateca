<? 
class TagRelacao extends AbstractEntity implements EntityInterface { 
	 
	protected $id_tag_relacao, $identificador, $id_tag, $id_noticia;
	 
	public function setTagRelacao($IdTagRelacao, $Identificador, $IdTag, $IdNoticia){ 
			$this->setIdTagRelacao( $IdTagRelacao ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdTag( $IdTag ); 
			$this->setIdNoticia( $IdNoticia ); 
			return $this; 
	} 
 
	public function setIdTagRelacao( $valor ){ $this->id_tag_relacao = $valor; return $this; } 
	public function getIdTagRelacao(){ return $this->id_tag_relacao; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdTag( $valor ){ $this->id_tag = $valor; return $this; } 
	public function getIdTag(){ return $this->id_tag; } 
 
	public function setIdNoticia( $valor ){ $this->id_noticia = $valor; return $this; } 
	public function getIdNoticia(){ return $this->id_noticia; } 
 
}
?>