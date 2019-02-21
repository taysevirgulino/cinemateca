<? 
class Usuario extends AbstractEntity implements EntityInterface { 
	 
	protected $id_usuario, $identificador, $id_usuario_perfil, $nome, $email, $imagem, $login, $senha, $datahora_cadastro, $datahora_edicao, $datahora_login, $status;
	 
	public function setUsuario($IdUsuario, $Identificador, $IdUsuarioPerfil, $Nome, $Email, $Imagem, $Login, $Senha, $DatahoraCadastro, $DatahoraEdicao, $DatahoraLogin, $Status){ 
			$this->setIdUsuario( $IdUsuario ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdUsuarioPerfil( $IdUsuarioPerfil ); 
			$this->setNome( $Nome ); 
			$this->setEmail( $Email ); 
			$this->setImagem( $Imagem ); 
			$this->setLogin( $Login ); 
			$this->setSenha( $Senha ); 
			$this->setDatahoraCadastro( $DatahoraCadastro ); 
			$this->setDatahoraEdicao( $DatahoraEdicao ); 
			$this->setDatahoraLogin( $DatahoraLogin ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdUsuario( $valor ){ $this->id_usuario = $valor; return $this; } 
	public function getIdUsuario(){ return $this->id_usuario; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdUsuarioPerfil( $valor ){ $this->id_usuario_perfil = $valor; return $this; } 
	public function getIdUsuarioPerfil(){ return $this->id_usuario_perfil; } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setEmail( $valor ){ $this->email = $valor; return $this; } 
	public function getEmail(){ return $this->email; } 
 
	public function setImagem( $valor ){ $this->imagem = $valor; return $this; } 
	public function getImagem(){ return $this->imagem; } 
 
	public function setLogin( $valor ){ $this->login = $valor; return $this; } 
	public function getLogin(){ return $this->login; } 
 
	public function setSenha( $valor ){ $this->senha = $valor; return $this; } 
	public function getSenha(){ return $this->senha; } 
 
	public function setDatahoraCadastro( $valor ){ $this->datahora_cadastro = $valor; return $this; } 
	public function getDatahoraCadastro(){ return $this->datahora_cadastro; } 
 
	public function setDatahoraEdicao( $valor ){ $this->datahora_edicao = $valor; return $this; } 
	public function getDatahoraEdicao(){ return $this->datahora_edicao; } 
 
	public function setDatahoraLogin( $valor ){ $this->datahora_login = $valor; return $this; } 
	public function getDatahoraLogin(){ return $this->datahora_login; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>