<? 
class CurriculoArea extends AbstractEntity implements EntityInterface { 
	 
	protected $id_curriculo_area, $identificador, $titulo, $prioridade, $status;
	 
	public function setCurriculoArea($IdCurriculoArea, $Identificador, $Titulo, $Prioridade, $Status){ 
			$this->setIdCurriculoArea( $IdCurriculoArea ); 
			$this->setIdentificador( $Identificador ); 
			$this->setTitulo( $Titulo ); 
			$this->setPrioridade( $Prioridade ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdCurriculoArea( $valor ){ $this->id_curriculo_area = $valor; return $this; } 
	public function getIdCurriculoArea(){ return $this->id_curriculo_area; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>