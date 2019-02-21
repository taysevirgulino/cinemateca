<? 
class BannerAcesso extends AbstractEntity implements EntityInterface { 
	 
	protected $id_banner_acesso, $identificador, $id_banner, $datahora, $click, $view;
	 
	public function setBannerAcesso($IdBannerAcesso, $Identificador, $IdBanner, $Datahora, $Click, $View){ 
			$this->setIdBannerAcesso( $IdBannerAcesso ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdBanner( $IdBanner ); 
			$this->setDatahora( $Datahora ); 
			$this->setClick( $Click ); 
			$this->setView( $View ); 
			return $this; 
	} 
 
	public function setIdBannerAcesso( $valor ){ $this->id_banner_acesso = $valor; return $this; } 
	public function getIdBannerAcesso(){ return $this->id_banner_acesso; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdBanner( $valor ){ $this->id_banner = $valor; return $this; } 
	public function getIdBanner(){ return $this->id_banner; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setClick( $valor ){ $this->click = $valor; return $this; } 
	public function getClick(){ return $this->click; } 
 
	public function setView( $valor ){ $this->view = $valor; return $this; } 
	public function getView(){ return $this->view; } 
 
}
?>