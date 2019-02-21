<? 
class FaleConoscoAssunto extends AbstractEntity implements EntityInterface { 
	 
	protected $id_fale_conosco_assunto, $identificador, $ide_origem, $assunto, $emails, $prioridade;
	 
	public function setFaleConoscoAssunto($IdFaleConoscoAssunto, $Identificador, $IdeOrigem, $Assunto, $Emails, $Prioridade){ 
			$this->setIdFaleConoscoAssunto( $IdFaleConoscoAssunto ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setAssunto( $Assunto ); 
			$this->setEmails( $Emails ); 
			$this->setPrioridade( $Prioridade ); 
			return $this; 
	} 
 
	public function setIdFaleConoscoAssunto( $valor ){ $this->id_fale_conosco_assunto = $valor; return $this; } 
	public function getIdFaleConoscoAssunto(){ return $this->id_fale_conosco_assunto; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setAssunto( $valor ){ $this->assunto = $valor; return $this; } 
	public function getAssunto(){ return $this->assunto; } 
 
	public function setEmails( $valor ){ $this->emails = $valor; return $this; } 
	public function getEmails(){ return $this->emails; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
}
?>