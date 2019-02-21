<? 
class Pagina extends AbstractEntity implements EntityInterface { 
	 
	protected $id_pagina, $identificador, $ide_origem, $id_pagina_pai, $slug, $titulo, $resumo, $texto, $imagem, $filhos_exibir, $filhos_titulo, $datahora, $prioridade, $status;
	 
	public function setPagina($IdPagina, $Identificador, $IdeOrigem, $IdPaginaPai, $Slug, $Titulo, $Resumo, $Texto, $Imagem, $FilhosExibir, $FilhosTitulo, $Datahora, $Prioridade, $Status){ 
			$this->setIdPagina( $IdPagina ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setIdPaginaPai( $IdPaginaPai ); 
			$this->setSlug( $Slug ); 
			$this->setTitulo( $Titulo ); 
			$this->setResumo( $Resumo ); 
			$this->setTexto( $Texto ); 
			$this->setImagem( $Imagem ); 
			$this->setFilhosExibir( $FilhosExibir ); 
			$this->setFilhosTitulo( $FilhosTitulo ); 
			$this->setDatahora( $Datahora ); 
			$this->setPrioridade( $Prioridade ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdPagina( $valor ){ $this->id_pagina = $valor; return $this; } 
	public function getIdPagina(){ return $this->id_pagina; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setIdPaginaPai( $valor ){ $this->id_pagina_pai = $valor; return $this; } 
	public function getIdPaginaPai(){ return $this->id_pagina_pai; } 
 
	public function setSlug( $valor ){ $this->slug = $valor; return $this; } 
	public function getSlug(){ return $this->slug; } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setResumo( $valor ){ $this->resumo = $valor; return $this; } 
	public function getResumo(){ return $this->resumo; } 
 
	public function setTexto( $valor ){ $this->texto = $valor; return $this; } 
	public function getTexto(){ return $this->texto; } 
 
	public function setImagem( $valor ){ $this->imagem = $valor; return $this; } 
	public function getImagem(){ return $this->imagem; } 
 
	public function setFilhosExibir( $valor ){ $this->filhos_exibir = $valor; return $this; } 
	public function getFilhosExibir(){ return $this->filhos_exibir; } 
 
	public function setFilhosTitulo( $valor ){ $this->filhos_titulo = $valor; return $this; } 
	public function getFilhosTitulo(){ return $this->filhos_titulo; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>