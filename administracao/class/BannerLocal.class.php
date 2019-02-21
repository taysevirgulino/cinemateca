<? 
class BannerLocal extends AbstractEntity implements EntityInterface { 
	 
	protected $id_banner_local, $identificador, $nome, $codigo;
	 
	public function setBannerLocal($IdBannerLocal, $Identificador, $Nome, $Codigo){ 
			$this->setIdBannerLocal( $IdBannerLocal ); 
			$this->setIdentificador( $Identificador ); 
			$this->setNome( $Nome ); 
			$this->setCodigo( $Codigo ); 
			return $this; 
	} 
 
	public function setIdBannerLocal( $valor ){ $this->id_banner_local = $valor; return $this; } 
	public function getIdBannerLocal(){ return $this->id_banner_local; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setCodigo( $valor ){ $this->codigo = $valor; return $this; } 
	public function getCodigo(){ return $this->codigo; } 
 
}
?>