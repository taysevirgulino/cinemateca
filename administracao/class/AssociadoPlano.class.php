<? 
class AssociadoPlano extends AbstractEntity implements EntityInterface { 
	 
	protected $id_associado_plano, $identificador, $titulo, $descricao, $valor, $prorata, $recorrencia, $prioridade, $status;
	 
	public function setAssociadoPlano($IdAssociadoPlano, $Identificador, $Titulo, $Descricao, $Valor, $Prorata, $Recorrencia, $Prioridade, $Status){ 
			$this->setIdAssociadoPlano( $IdAssociadoPlano ); 
			$this->setIdentificador( $Identificador ); 
			$this->setTitulo( $Titulo ); 
			$this->setDescricao( $Descricao ); 
			$this->setValor( $Valor ); 
			$this->setProrata( $Prorata ); 
			$this->setRecorrencia( $Recorrencia ); 
			$this->setPrioridade( $Prioridade ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdAssociadoPlano( $valor ){ $this->id_associado_plano = $valor; return $this; } 
	public function getIdAssociadoPlano(){ return $this->id_associado_plano; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setDescricao( $valor ){ $this->descricao = $valor; return $this; } 
	public function getDescricao(){ return $this->descricao; } 
 
	public function setValor( $valor ){ $this->valor = $valor; return $this; } 
	public function getValor(){ return $this->valor; } 
 
	public function setProrata( $valor ){ $this->prorata = $valor; return $this; } 
	public function getProrata(){ return $this->prorata; } 
 
	public function setRecorrencia( $valor ){ $this->recorrencia = $valor; return $this; } 
	public function getRecorrencia(){ return $this->recorrencia; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>