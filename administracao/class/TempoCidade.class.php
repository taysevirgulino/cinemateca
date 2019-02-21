<? 
class TempoCidade extends AbstractEntity implements EntityInterface { 
	 
	protected $id_tempo_cidade, $identificador, $nome, $uf, $codigo, $prioridade, $status;
	 
	public function setTempoCidade($IdTempoCidade, $Identificador, $Nome, $Uf, $Codigo, $Prioridade, $Status){ 
			$this->setIdTempoCidade( $IdTempoCidade ); 
			$this->setIdentificador( $Identificador ); 
			$this->setNome( $Nome ); 
			$this->setUf( $Uf ); 
			$this->setCodigo( $Codigo ); 
			$this->setPrioridade( $Prioridade ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdTempoCidade( $valor ){ $this->id_tempo_cidade = $valor; return $this; } 
	public function getIdTempoCidade(){ return $this->id_tempo_cidade; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setUf( $valor ){ $this->uf = $valor; return $this; } 
	public function getUf(){ return $this->uf; } 
 
	public function setCodigo( $valor ){ $this->codigo = $valor; return $this; } 
	public function getCodigo(){ return $this->codigo; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>