<? 
class Editoria extends AbstractEntity implements EntityInterface { 
	 
	protected $id_editoria, $identificador, $ide_origem, $id_editoria_pai, $nome, $legenda, $descricao, $imagem, $imagem_pagina, $blog, $prioridade, $status;
	 
	public function setEditoria($IdEditoria, $Identificador, $IdeOrigem, $IdEditoriaPai, $Nome, $Legenda, $Descricao, $Imagem, $ImagemPagina, $Blog, $Prioridade, $Status){ 
			$this->setIdEditoria( $IdEditoria ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setIdEditoriaPai( $IdEditoriaPai ); 
			$this->setNome( $Nome ); 
			$this->setLegenda( $Legenda ); 
			$this->setDescricao( $Descricao ); 
			$this->setImagem( $Imagem ); 
			$this->setImagemPagina( $ImagemPagina ); 
			$this->setBlog( $Blog ); 
			$this->setPrioridade( $Prioridade ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdEditoria( $valor ){ $this->id_editoria = $valor; return $this; } 
	public function getIdEditoria(){ return $this->id_editoria; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setIdEditoriaPai( $valor ){ $this->id_editoria_pai = $valor; return $this; } 
	public function getIdEditoriaPai(){ return $this->id_editoria_pai; } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setLegenda( $valor ){ $this->legenda = $valor; return $this; } 
	public function getLegenda(){ return $this->legenda; } 
 
	public function setDescricao( $valor ){ $this->descricao = $valor; return $this; } 
	public function getDescricao(){ return $this->descricao; } 
 
	public function setImagem( $valor ){ $this->imagem = $valor; return $this; } 
	public function getImagem(){ return $this->imagem; } 
 
	public function setImagemPagina( $valor ){ $this->imagem_pagina = $valor; return $this; } 
	public function getImagemPagina(){ return $this->imagem_pagina; } 
 
	public function setBlog( $valor ){ $this->blog = $valor; return $this; } 
	public function getBlog(){ return $this->blog; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>