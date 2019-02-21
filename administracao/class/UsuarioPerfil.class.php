<? 
class UsuarioPerfil extends AbstractEntity implements EntityInterface { 
	 
	protected $id_usuario_perfil, $identificador, $titulo, $nivel;
	 
	public function setUsuarioPerfil($IdUsuarioPerfil, $Identificador, $Titulo, $Nivel){ 
			$this->setIdUsuarioPerfil( $IdUsuarioPerfil ); 
			$this->setIdentificador( $Identificador ); 
			$this->setTitulo( $Titulo ); 
			$this->setNivel( $Nivel ); 
			return $this; 
	} 
 
	public function setIdUsuarioPerfil( $valor ){ $this->id_usuario_perfil = $valor; return $this; } 
	public function getIdUsuarioPerfil(){ return $this->id_usuario_perfil; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setNivel( $valor ){ $this->nivel = $valor; return $this; } 
	public function getNivel(){ return $this->nivel; } 
 
}
?>