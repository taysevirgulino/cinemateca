<? 
class FaleConosco extends AbstractEntity implements EntityInterface { 
	 
	protected $id_fale_conosco, $identificador, $ide_origem, $id_fale_conosco_assunto, $nome, $email, $telefone, $cidade, $estado, $mensagem, $datahora, $status;
	 
	public function setFaleConosco($IdFaleConosco, $Identificador, $IdeOrigem, $IdFaleConoscoAssunto, $Nome, $Email, $Telefone, $Cidade, $Estado, $Mensagem, $Datahora, $Status){ 
			$this->setIdFaleConosco( $IdFaleConosco ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setIdFaleConoscoAssunto( $IdFaleConoscoAssunto ); 
			$this->setNome( $Nome ); 
			$this->setEmail( $Email ); 
			$this->setTelefone( $Telefone ); 
			$this->setCidade( $Cidade ); 
			$this->setEstado( $Estado ); 
			$this->setMensagem( $Mensagem ); 
			$this->setDatahora( $Datahora ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdFaleConosco( $valor ){ $this->id_fale_conosco = $valor; return $this; } 
	public function getIdFaleConosco(){ return $this->id_fale_conosco; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setIdFaleConoscoAssunto( $valor ){ $this->id_fale_conosco_assunto = $valor; return $this; } 
	public function getIdFaleConoscoAssunto(){ return $this->id_fale_conosco_assunto; } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setEmail( $valor ){ $this->email = $valor; return $this; } 
	public function getEmail(){ return $this->email; } 
 
	public function setTelefone( $valor ){ $this->telefone = $valor; return $this; } 
	public function getTelefone(){ return $this->telefone; } 
 
	public function setCidade( $valor ){ $this->cidade = $valor; return $this; } 
	public function getCidade(){ return $this->cidade; } 
 
	public function setEstado( $valor ){ $this->estado = $valor; return $this; } 
	public function getEstado(){ return $this->estado; } 
 
	public function setMensagem( $valor ){ $this->mensagem = $valor; return $this; } 
	public function getMensagem(){ return $this->mensagem; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>