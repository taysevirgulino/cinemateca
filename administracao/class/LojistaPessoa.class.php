<? 
class LojistaPessoa extends AbstractEntity implements EntityInterface { 
	 
	protected $id_lojista_pessoa, $identificador, $id_lojista, $id_lojista_pessoa_perfil, $id_usuario, $nome, $email, $email2, $telefone, $telefone2, $endereco, $cidade, $estado, $cep, $observacoes, $receber_email, $status;
	 
	public function setLojistaPessoa($IdLojistaPessoa, $Identificador, $IdLojista, $IdLojistaPessoaPerfil, $IdUsuario, $Nome, $Email, $Email2, $Telefone, $Telefone2, $Endereco, $Cidade, $Estado, $Cep, $Observacoes, $ReceberEmail, $Status){ 
			$this->setIdLojistaPessoa( $IdLojistaPessoa ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdLojista( $IdLojista ); 
			$this->setIdLojistaPessoaPerfil( $IdLojistaPessoaPerfil ); 
			$this->setIdUsuario( $IdUsuario ); 
			$this->setNome( $Nome ); 
			$this->setEmail( $Email ); 
			$this->setEmail2( $Email2 ); 
			$this->setTelefone( $Telefone ); 
			$this->setTelefone2( $Telefone2 ); 
			$this->setEndereco( $Endereco ); 
			$this->setCidade( $Cidade ); 
			$this->setEstado( $Estado ); 
			$this->setCep( $Cep ); 
			$this->setObservacoes( $Observacoes ); 
			$this->setReceberEmail( $ReceberEmail ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdLojistaPessoa( $valor ){ $this->id_lojista_pessoa = $valor; return $this; } 
	public function getIdLojistaPessoa(){ return $this->id_lojista_pessoa; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdLojista( $valor ){ $this->id_lojista = $valor; return $this; } 
	public function getIdLojista(){ return $this->id_lojista; } 
 
	public function setIdLojistaPessoaPerfil( $valor ){ $this->id_lojista_pessoa_perfil = $valor; return $this; } 
	public function getIdLojistaPessoaPerfil(){ return $this->id_lojista_pessoa_perfil; } 
 
	public function setIdUsuario( $valor ){ $this->id_usuario = $valor; return $this; } 
	public function getIdUsuario(){ return $this->id_usuario; } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setEmail( $valor ){ $this->email = $valor; return $this; } 
	public function getEmail(){ return $this->email; } 
 
	public function setEmail2( $valor ){ $this->email2 = $valor; return $this; } 
	public function getEmail2(){ return $this->email2; } 
 
	public function setTelefone( $valor ){ $this->telefone = $valor; return $this; } 
	public function getTelefone(){ return $this->telefone; } 
 
	public function setTelefone2( $valor ){ $this->telefone2 = $valor; return $this; } 
	public function getTelefone2(){ return $this->telefone2; } 
 
	public function setEndereco( $valor ){ $this->endereco = $valor; return $this; } 
	public function getEndereco(){ return $this->endereco; } 
 
	public function setCidade( $valor ){ $this->cidade = $valor; return $this; } 
	public function getCidade(){ return $this->cidade; } 
 
	public function setEstado( $valor ){ $this->estado = $valor; return $this; } 
	public function getEstado(){ return $this->estado; } 
 
	public function setCep( $valor ){ $this->cep = $valor; return $this; } 
	public function getCep(){ return $this->cep; } 
 
	public function setObservacoes( $valor ){ $this->observacoes = $valor; return $this; } 
	public function getObservacoes(){ return $this->observacoes; } 
 
	public function setReceberEmail( $valor ){ $this->receber_email = $valor; return $this; } 
	public function getReceberEmail(){ return $this->receber_email; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>