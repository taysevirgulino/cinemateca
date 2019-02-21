<? 
class EnqueteAlternativa extends AbstractEntity implements EntityInterface { 
	 
	protected $id_enquete_alternativa, $identificador, $ide_origem, $id_enquete, $resposta, $prioridade;
	 
	public function setEnqueteAlternativa($IdEnqueteAlternativa, $Identificador, $IdeOrigem, $IdEnquete, $Resposta, $Prioridade){ 
			$this->setIdEnqueteAlternativa( $IdEnqueteAlternativa ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setIdEnquete( $IdEnquete ); 
			$this->setResposta( $Resposta ); 
			$this->setPrioridade( $Prioridade ); 
			return $this; 
	} 
 
	public function setIdEnqueteAlternativa( $valor ){ $this->id_enquete_alternativa = $valor; return $this; } 
	public function getIdEnqueteAlternativa(){ return $this->id_enquete_alternativa; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setIdEnquete( $valor ){ $this->id_enquete = $valor; return $this; } 
	public function getIdEnquete(){ return $this->id_enquete; } 
 
	public function setResposta( $valor ){ $this->resposta = $valor; return $this; } 
	public function getResposta(){ return $this->resposta; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
}
?>