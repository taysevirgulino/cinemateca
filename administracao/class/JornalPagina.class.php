<? 
class JornalPagina extends AbstractEntity implements EntityInterface { 
	 
	protected $id_jornal_pagina, $identificador, $id_jornal_edicao, $id_jornal_estrutura, $imagem;
	 
	public function setJornalPagina($IdJornalPagina, $Identificador, $IdJornalEdicao, $IdJornalEstrutura, $Imagem){ 
			$this->setIdJornalPagina( $IdJornalPagina ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdJornalEdicao( $IdJornalEdicao ); 
			$this->setIdJornalEstrutura( $IdJornalEstrutura ); 
			$this->setImagem( $Imagem ); 
			return $this; 
	} 
 
	public function setIdJornalPagina( $valor ){ $this->id_jornal_pagina = $valor; return $this; } 
	public function getIdJornalPagina(){ return $this->id_jornal_pagina; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdJornalEdicao( $valor ){ $this->id_jornal_edicao = $valor; return $this; } 
	public function getIdJornalEdicao(){ return $this->id_jornal_edicao; } 
 
	public function setIdJornalEstrutura( $valor ){ $this->id_jornal_estrutura = $valor; return $this; } 
	public function getIdJornalEstrutura(){ return $this->id_jornal_estrutura; } 
 
	public function setImagem( $valor ){ $this->imagem = $valor; return $this; } 
	public function getImagem(){ return $this->imagem; } 
 
}
?>