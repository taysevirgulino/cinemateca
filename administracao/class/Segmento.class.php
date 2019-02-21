<? 
class Segmento extends AbstractEntity implements EntityInterface { 
	 
	protected $id_segmento, $identificador, $titulo, $cor, $prioridade;
	 
	public function setSegmento($IdSegmento, $Identificador, $Titulo, $Cor, $Prioridade){ 
			$this->setIdSegmento( $IdSegmento ); 
			$this->setIdentificador( $Identificador ); 
			$this->setTitulo( $Titulo ); 
			$this->setCor( $Cor ); 
			$this->setPrioridade( $Prioridade ); 
			return $this; 
	} 
 
	public function setIdSegmento( $valor ){ $this->id_segmento = $valor; return $this; } 
	public function getIdSegmento(){ return $this->id_segmento; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setCor( $valor ){ $this->cor = $valor; return $this; } 
	public function getCor(){ return $this->cor; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
}
?>