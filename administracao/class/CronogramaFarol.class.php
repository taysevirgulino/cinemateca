<? 
class CronogramaFarol extends AbstractEntity implements EntityInterface { 
	 
	protected $id_cronograma_farol, $identificador, $titulo, $cor, $peso, $prioridade;
	 
	public function setCronogramaFarol($IdCronogramaFarol, $Identificador, $Titulo, $Cor, $Peso, $Prioridade){ 
			$this->setIdCronogramaFarol( $IdCronogramaFarol ); 
			$this->setIdentificador( $Identificador ); 
			$this->setTitulo( $Titulo ); 
			$this->setCor( $Cor ); 
			$this->setPeso( $Peso ); 
			$this->setPrioridade( $Prioridade ); 
			return $this; 
	} 
 
	public function setIdCronogramaFarol( $valor ){ $this->id_cronograma_farol = $valor; return $this; } 
	public function getIdCronogramaFarol(){ return $this->id_cronograma_farol; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setCor( $valor ){ $this->cor = $valor; return $this; } 
	public function getCor(){ return $this->cor; } 
 
	public function setPeso( $valor ){ $this->peso = $valor; return $this; } 
	public function getPeso(){ return $this->peso; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
}
?>