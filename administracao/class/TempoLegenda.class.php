<? 
class TempoLegenda extends AbstractEntity implements EntityInterface { 
	 
	protected $id_tempo_legenda, $identificador, $titulo, $codigo;
	 
	public function setTempoLegenda($IdTempoLegenda, $Identificador, $Titulo, $Codigo){ 
			$this->setIdTempoLegenda( $IdTempoLegenda ); 
			$this->setIdentificador( $Identificador ); 
			$this->setTitulo( $Titulo ); 
			$this->setCodigo( $Codigo ); 
			return $this; 
	} 
 
	public function setIdTempoLegenda( $valor ){ $this->id_tempo_legenda = $valor; return $this; } 
	public function getIdTempoLegenda(){ return $this->id_tempo_legenda; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setCodigo( $valor ){ $this->codigo = $valor; return $this; } 
	public function getCodigo(){ return $this->codigo; } 
 
}
?>