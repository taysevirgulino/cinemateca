<? 
class Lojista extends AbstractEntity implements EntityInterface { 
	 
	protected $id_lojista, $identificador, $id_loja, $id_usuario_responsavel, $nome, $responsavel, $fraquia, $imagem, $observacoes, $email, $status;
	 
	public function setLojista($IdLojista, $Identificador, $IdLoja, $IdUsuarioResponsavel, $Nome, $Responsavel, $Fraquia, $Imagem, $Observacoes, $Email, $Status){ 
			$this->setIdLojista( $IdLojista ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdLoja( $IdLoja ); 
			$this->setIdUsuarioResponsavel( $IdUsuarioResponsavel ); 
			$this->setNome( $Nome ); 
			$this->setResponsavel( $Responsavel ); 
			$this->setFraquia( $Fraquia ); 
			$this->setImagem( $Imagem ); 
			$this->setObservacoes( $Observacoes ); 
			$this->setEmail( $Email ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdLojista( $valor ){ $this->id_lojista = $valor; return $this; } 
	public function getIdLojista(){ return $this->id_lojista; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdLoja( $valor ){ $this->id_loja = $valor; return $this; } 
	public function getIdLoja(){ return $this->id_loja; } 
 
	public function setIdUsuarioResponsavel( $valor ){ $this->id_usuario_responsavel = $valor; return $this; } 
	public function getIdUsuarioResponsavel(){ return $this->id_usuario_responsavel; } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setResponsavel( $valor ){ $this->responsavel = $valor; return $this; } 
	public function getResponsavel(){ return $this->responsavel; } 
 
	public function setFraquia( $valor ){ $this->fraquia = $valor; return $this; } 
	public function getFraquia(){ return $this->fraquia; } 
 
	public function setImagem( $valor ){ $this->imagem = $valor; return $this; } 
	public function getImagem(){ return $this->imagem; } 
 
	public function setObservacoes( $valor ){ $this->observacoes = $valor; return $this; } 
	public function getObservacoes(){ return $this->observacoes; } 

	public function setEmail( $valor ){ $this->email = $valor; return $this; } 
	public function getEmail(){ return $this->email; }  
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>