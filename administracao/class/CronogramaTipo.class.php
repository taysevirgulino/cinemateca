<? 
class CronogramaTipo extends AbstractEntity implements EntityInterface { 
	 
	protected $id_cronograma_tipo, $identificador, $titulo, $prioridade, $status;
	 
	public function setCronogramaTipo($IdCronogramaTipo, $Identificador, $Titulo, $Prioridade, $Status){ 
			$this->setIdCronogramaTipo( $IdCronogramaTipo ); 
			$this->setIdentificador( $Identificador ); 
			$this->setTitulo( $Titulo ); 
			$this->setPrioridade( $Prioridade ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdCronogramaTipo( $valor ){ $this->id_cronograma_tipo = $valor; return $this; } 
	public function getIdCronogramaTipo(){ return $this->id_cronograma_tipo; } 
 
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