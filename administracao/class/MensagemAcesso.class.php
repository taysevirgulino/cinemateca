<? 
class MensagemAcesso extends AbstractEntity implements EntityInterface { 
	 
	protected $id_mensagem_acesso, $identificador, $id_mensagem, $id_usuario, $datahora, $status;
	 
	public function setMensagemAcesso($IdMensagemAcesso, $Identificador, $IdMensagem, $IdUsuario, $Datahora, $Status){ 
			$this->setIdMensagemAcesso( $IdMensagemAcesso ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdMensagem( $IdMensagem ); 
			$this->setIdUsuario( $IdUsuario ); 
			$this->setDatahora( $Datahora ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdMensagemAcesso( $valor ){ $this->id_mensagem_acesso = $valor; return $this; } 
	public function getIdMensagemAcesso(){ return $this->id_mensagem_acesso; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdMensagem( $valor ){ $this->id_mensagem = $valor; return $this; } 
	public function getIdMensagem(){ return $this->id_mensagem; } 
 
	public function setIdUsuario( $valor ){ $this->id_usuario = $valor; return $this; } 
	public function getIdUsuario(){ return $this->id_usuario; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>