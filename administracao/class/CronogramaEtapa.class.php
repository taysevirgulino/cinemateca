<? 
class CronogramaEtapa extends AbstractEntity implements EntityInterface { 
	 
	protected $id_cronograma_etapa, $identificador, $id_cronograma_tipo, $titulo, $descricao, $porcentagem, $prioridade, $status;
	 
	public function setCronogramaEtapa($IdCronogramaEtapa, $Identificador, $IdCronogramaTipo, $Titulo, $Descricao, $Porcentagem, $Prioridade, $Status){ 
			$this->setIdCronogramaEtapa( $IdCronogramaEtapa ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdCronogramaTipo( $IdCronogramaTipo ); 
			$this->setTitulo( $Titulo ); 
			$this->setDescricao( $Descricao ); 
			$this->setPorcentagem( $Porcentagem ); 
			$this->setPrioridade( $Prioridade ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdCronogramaEtapa( $valor ){ $this->id_cronograma_etapa = $valor; return $this; } 
	public function getIdCronogramaEtapa(){ return $this->id_cronograma_etapa; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdCronogramaTipo( $valor ){ $this->id_cronograma_tipo = $valor; return $this; } 
	public function getIdCronogramaTipo(){ return $this->id_cronograma_tipo; } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setDescricao( $valor ){ $this->descricao = $valor; return $this; } 
	public function getDescricao(){ return $this->descricao; } 
 
	public function setPorcentagem( $valor ){ $this->porcentagem = $valor; return $this; } 
	public function getPorcentagem(){ return $this->porcentagem; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>