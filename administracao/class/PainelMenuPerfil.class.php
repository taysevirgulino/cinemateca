<? 
class PainelMenuPerfil extends AbstractEntity implements EntityInterface { 
	 
	protected $id_painel_menu_perfil, $identificador, $id_painel_menu, $id_usuario_perfil;
	 
	public function setPainelMenuPerfil($IdPainelMenuPerfil, $Identificador, $IdPainelMenu, $IdUsuarioPerfil){ 
			$this->setIdPainelMenuPerfil( $IdPainelMenuPerfil ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdPainelMenu( $IdPainelMenu ); 
			$this->setIdUsuarioPerfil( $IdUsuarioPerfil ); 
			return $this; 
	} 
 
	public function setIdPainelMenuPerfil( $valor ){ $this->id_painel_menu_perfil = $valor; return $this; } 
	public function getIdPainelMenuPerfil(){ return $this->id_painel_menu_perfil; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdPainelMenu( $valor ){ $this->id_painel_menu = $valor; return $this; } 
	public function getIdPainelMenu(){ return $this->id_painel_menu; } 
 
	public function setIdUsuarioPerfil( $valor ){ $this->id_usuario_perfil = $valor; return $this; } 
	public function getIdUsuarioPerfil(){ return $this->id_usuario_perfil; } 
 
}
?>