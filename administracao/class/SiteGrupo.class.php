<? 
class SiteGrupo extends AbstractEntity implements EntityInterface { 
	 
	protected $id_site_grupo, $identificador, $id_site, $id_app_usuario_grupo;
	 
	public function setSiteGrupo($IdSiteGrupo, $Identificador, $IdSite, $IdAppUsuarioGrupo){ 
			$this->setIdSiteGrupo( $IdSiteGrupo ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdSite( $IdSite ); 
			$this->setIdAppUsuarioGrupo( $IdAppUsuarioGrupo ); 
			return $this; 
	} 
 
	public function setIdSiteGrupo( $valor ){ $this->id_site_grupo = $valor; return $this; } 
	public function getIdSiteGrupo(){ return $this->id_site_grupo; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdSite( $valor ){ $this->id_site = $valor; return $this; } 
	public function getIdSite(){ return $this->id_site; } 
 
	public function setIdAppUsuarioGrupo( $valor ){ $this->id_app_usuario_grupo = $valor; return $this; } 
	public function getIdAppUsuarioGrupo(){ return $this->id_app_usuario_grupo; } 
 
}
?>