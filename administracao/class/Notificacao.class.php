<? 
class Notificacao extends AbstractEntity implements EntityInterface { 
	 
	protected $id_notificacao, $identificador, $id_usuario, $titulo, $descricao, $link, $tipo, $datahora, $datahora_acesso, $status;
	 
	public function setNotificacao($IdNotificacao, $Identificador, $IdUsuario, $Titulo, $Descricao, $Link, $Tipo, $Datahora, $DatahoraAcesso, $Status){ 
			$this->setIdNotificacao( $IdNotificacao ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdUsuario( $IdUsuario ); 
			$this->setTitulo( $Titulo ); 
			$this->setDescricao( $Descricao ); 
			$this->setLink( $Link ); 
			$this->setTipo( $Tipo ); 
			$this->setDatahora( $Datahora ); 
			$this->setDatahoraAcesso( $DatahoraAcesso ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdNotificacao( $valor ){ $this->id_notificacao = $valor; return $this; } 
	public function getIdNotificacao(){ return $this->id_notificacao; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdUsuario( $valor ){ $this->id_usuario = $valor; return $this; } 
	public function getIdUsuario(){ return $this->id_usuario; } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setDescricao( $valor ){ $this->descricao = $valor; return $this; } 
	public function getDescricao(){ return $this->descricao; } 
 
	public function setLink( $valor ){ $this->link = $valor; return $this; } 
	public function getLink(){ return $this->link; } 
 
	public function setTipo( $valor ){ $this->tipo = $valor; return $this; } 
	public function getTipo(){ return $this->tipo; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setDatahoraAcesso( $valor ){ $this->datahora_acesso = $valor; return $this; } 
	public function getDatahoraAcesso(){ return $this->datahora_acesso; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>