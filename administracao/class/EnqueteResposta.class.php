<? 
class EnqueteResposta extends AbstractEntity implements EntityInterface { 
	 
	protected $id_enquete_resposta, $identificador, $ide_origem, $id_enquete_alternativa, $ip, $datahora;
	 
	public function setEnqueteResposta($IdEnqueteResposta, $Identificador, $IdeOrigem, $IdEnqueteAlternativa, $Ip, $Datahora){ 
			$this->setIdEnqueteResposta( $IdEnqueteResposta ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setIdEnqueteAlternativa( $IdEnqueteAlternativa ); 
			$this->setIp( $Ip ); 
			$this->setDatahora( $Datahora ); 
			return $this; 
	} 
 
	public function setIdEnqueteResposta( $valor ){ $this->id_enquete_resposta = $valor; return $this; } 
	public function getIdEnqueteResposta(){ return $this->id_enquete_resposta; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setIdEnqueteAlternativa( $valor ){ $this->id_enquete_alternativa = $valor; return $this; } 
	public function getIdEnqueteAlternativa(){ return $this->id_enquete_alternativa; } 
 
	public function setIp( $valor ){ $this->ip = $valor; return $this; } 
	public function getIp(){ return $this->ip; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
}
?>