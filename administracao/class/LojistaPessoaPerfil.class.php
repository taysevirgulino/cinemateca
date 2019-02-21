<? 
class LojistaPessoaPerfil extends AbstractEntity implements EntityInterface { 
	 
	protected $id_lojista_pessoa_perfil, $identificador, $titulo, $prioridade;
	 
	public function setLojistaPessoaPerfil($IdLojistaPessoaPerfil, $Identificador, $Titulo, $Prioridade){ 
			$this->setIdLojistaPessoaPerfil( $IdLojistaPessoaPerfil ); 
			$this->setIdentificador( $Identificador ); 
			$this->setTitulo( $Titulo ); 
			$this->setPrioridade( $Prioridade ); 
			return $this; 
	} 
 
	public function setIdLojistaPessoaPerfil( $valor ){ $this->id_lojista_pessoa_perfil = $valor; return $this; } 
	public function getIdLojistaPessoaPerfil(){ return $this->id_lojista_pessoa_perfil; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
}
?>