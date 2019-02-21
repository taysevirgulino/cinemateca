<? 
class MensagemResposta extends AbstractEntity implements EntityInterface { 
	 
	protected $id_mensagem_resposta, $identificador, $id_mensagem, $id_usuario, $texto, $arquivo, $datahora, $ip;
	 
	public function setMensagemResposta($IdMensagemResposta, $Identificador, $IdMensagem, $IdUsuario, $Texto, $Arquivo, $Datahora, $Ip){ 
			$this->setIdMensagemResposta( $IdMensagemResposta ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdMensagem( $IdMensagem ); 
			$this->setIdUsuario( $IdUsuario ); 
			$this->setTexto( $Texto ); 
			$this->setArquivo( $Arquivo ); 
			$this->setDatahora( $Datahora ); 
			$this->setIp( $Ip ); 
			return $this; 
	} 
 
	public function setIdMensagemResposta( $valor ){ $this->id_mensagem_resposta = $valor; return $this; } 
	public function getIdMensagemResposta(){ return $this->id_mensagem_resposta; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdMensagem( $valor ){ $this->id_mensagem = $valor; return $this; } 
	public function getIdMensagem(){ return $this->id_mensagem; } 
 
	public function setIdUsuario( $valor ){ $this->id_usuario = $valor; return $this; } 
	public function getIdUsuario(){ return $this->id_usuario; } 
 
	public function setTexto( $valor ){ $this->texto = $valor; return $this; } 
	public function getTexto(){ return $this->texto; } 
 
	public function setArquivo( $valor ){ $this->arquivo = $valor; return $this; } 
	public function getArquivo(){ return $this->arquivo; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setIp( $valor ){ $this->ip = $valor; return $this; } 
	public function getIp(){ return $this->ip; } 
 
}
?>