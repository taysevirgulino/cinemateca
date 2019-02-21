<? 
class Mensagem extends AbstractEntity implements EntityInterface { 
	 
	protected $id_mensagem, $identificador, $id_empreendimento, $id_lojista, $id_usuario_remetente, $id_usuario_destinatario, $titulo, $texto, $arquivo, $datahora, $datahora_edicao, $ip, $status;
	 
	public function setMensagem($IdMensagem, $Identificador, $IdEmpreendimento, $IdLojista, $IdUsuarioRemetente, $IdUsuarioDestinatario, $Titulo, $Texto, $Arquivo, $Datahora, $DatahoraEdicao, $Ip, $Status){ 
			$this->setIdMensagem( $IdMensagem ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdEmpreendimento( $IdEmpreendimento ); 
			$this->setIdLojista( $IdLojista ); 
			$this->setIdUsuarioRemetente( $IdUsuarioRemetente ); 
			$this->setIdUsuarioDestinatario( $IdUsuarioDestinatario ); 
			$this->setTitulo( $Titulo ); 
			$this->setTexto( $Texto ); 
			$this->setArquivo( $Arquivo ); 
			$this->setDatahora( $Datahora ); 
			$this->setDatahoraEdicao( $DatahoraEdicao ); 
			$this->setIp( $Ip ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdMensagem( $valor ){ $this->id_mensagem = $valor; return $this; } 
	public function getIdMensagem(){ return $this->id_mensagem; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdEmpreendimento( $valor ){ $this->id_empreendimento = $valor; return $this; } 
	public function getIdEmpreendimento(){ return $this->id_empreendimento; } 
 
	public function setIdLojista( $valor ){ $this->id_lojista = $valor; return $this; } 
	public function getIdLojista(){ return $this->id_lojista; } 
 
	public function setIdUsuarioRemetente( $valor ){ $this->id_usuario_remetente = $valor; return $this; } 
	public function getIdUsuarioRemetente(){ return $this->id_usuario_remetente; } 
 
	public function setIdUsuarioDestinatario( $valor ){ $this->id_usuario_destinatario = $valor; return $this; } 
	public function getIdUsuarioDestinatario(){ return $this->id_usuario_destinatario; } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setTexto( $valor ){ $this->texto = $valor; return $this; } 
	public function getTexto(){ return $this->texto; } 
 
	public function setArquivo( $valor ){ $this->arquivo = $valor; return $this; } 
	public function getArquivo(){ return $this->arquivo; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setDatahoraEdicao( $valor ){ $this->datahora_edicao = $valor; return $this; } 
	public function getDatahoraEdicao(){ return $this->datahora_edicao; } 
 
	public function setIp( $valor ){ $this->ip = $valor; return $this; } 
	public function getIp(){ return $this->ip; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>