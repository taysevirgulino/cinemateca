<? 
class Tag extends AbstractEntity implements EntityInterface { 
	 
	protected $id_tag, $identificador, $nome, $slug, $quantidade;
	 
	public function setTag($IdTag, $Identificador, $Nome, $Slug, $Quantidade){ 
			$this->setIdTag( $IdTag ); 
			$this->setIdentificador( $Identificador ); 
			$this->setNome( $Nome ); 
			$this->setSlug( $Slug ); 
			$this->setQuantidade( $Quantidade ); 
			return $this; 
	} 
 
	public function setIdTag( $valor ){ $this->id_tag = $valor; return $this; } 
	public function getIdTag(){ return $this->id_tag; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setSlug( $valor ){ $this->slug = $valor; return $this; } 
	public function getSlug(){ return $this->slug; } 
 
	public function setQuantidade( $valor ){ $this->quantidade = $valor; return $this; } 
	public function getQuantidade(){ return $this->quantidade; } 
 
}
?>