<? 
class Enquete extends AbstractEntity implements EntityInterface { 
	 
	protected $id_enquete, $identificador, $ide_origem, $pergunta, $data_inicial, $data_final, $status;
	 
	public function setEnquete($IdEnquete, $Identificador, $IdeOrigem, $Pergunta, $DataInicial, $DataFinal, $Status){ 
			$this->setIdEnquete( $IdEnquete ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setPergunta( $Pergunta ); 
			$this->setDataInicial( $DataInicial ); 
			$this->setDataFinal( $DataFinal ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdEnquete( $valor ){ $this->id_enquete = $valor; return $this; } 
	public function getIdEnquete(){ return $this->id_enquete; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setPergunta( $valor ){ $this->pergunta = $valor; return $this; } 
	public function getPergunta(){ return $this->pergunta; } 
 
	public function setDataInicial( $valor ){ $this->data_inicial = $valor; return $this; } 
	public function getDataInicial(){ return $this->data_inicial; } 
 
	public function setDataFinal( $valor ){ $this->data_final = $valor; return $this; } 
	public function getDataFinal(){ return $this->data_final; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>