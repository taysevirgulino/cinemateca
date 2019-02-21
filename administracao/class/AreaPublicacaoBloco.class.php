<? 
class AreaPublicacaoBloco extends AbstractEntity implements EntityInterface { 
	 
	protected $id_area_publicacao_bloco, $identificador, $titulo, $legenda, $url, $style, $prioridade, $status;
	 
	public function setAreaPublicacaoBloco($IdAreaPublicacaoBloco, $Identificador, $Titulo, $Legenda, $Url, $Style, $Prioridade, $Status){ 
			$this->setIdAreaPublicacaoBloco( $IdAreaPublicacaoBloco ); 
			$this->setIdentificador( $Identificador ); 
			$this->setTitulo( $Titulo ); 
			$this->setLegenda( $Legenda ); 
			$this->setUrl( $Url ); 
			$this->setStyle( $Style ); 
			$this->setPrioridade( $Prioridade ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdAreaPublicacaoBloco( $valor ){ $this->id_area_publicacao_bloco = $valor; return $this; } 
	public function getIdAreaPublicacaoBloco(){ return $this->id_area_publicacao_bloco; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setLegenda( $valor ){ $this->legenda = $valor; return $this; } 
	public function getLegenda(){ return $this->legenda; } 
 
	public function setUrl( $valor ){ $this->url = $valor; return $this; } 
	public function getUrl(){ return $this->url; } 
 
	public function setStyle( $valor ){ $this->style = $valor; return $this; } 
	public function getStyle(){ return $this->style; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>