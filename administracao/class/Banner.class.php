<? 
class Banner extends AbstractEntity implements EntityInterface { 
	 
	protected $id_banner, $identificador, $ide_origem, $id_banner_local, $descricao, $url, $target, $width, $height, $periodo_status, $periodo_inicial, $periodo_final, $arquivo, $tipo, $status;
	 
	public function setBanner($IdBanner, $Identificador, $IdeOrigem, $IdBannerLocal, $Descricao, $Url, $Target, $Width, $Height, $PeriodoStatus, $PeriodoInicial, $PeriodoFinal, $Arquivo, $Tipo, $Status){ 
			$this->setIdBanner( $IdBanner ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setIdBannerLocal( $IdBannerLocal ); 
			$this->setDescricao( $Descricao ); 
			$this->setUrl( $Url ); 
			$this->setTarget( $Target ); 
			$this->setWidth( $Width ); 
			$this->setHeight( $Height ); 
			$this->setPeriodoStatus( $PeriodoStatus ); 
			$this->setPeriodoInicial( $PeriodoInicial ); 
			$this->setPeriodoFinal( $PeriodoFinal ); 
			$this->setArquivo( $Arquivo ); 
			$this->setTipo( $Tipo ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdBanner( $valor ){ $this->id_banner = $valor; return $this; } 
	public function getIdBanner(){ return $this->id_banner; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setIdBannerLocal( $valor ){ $this->id_banner_local = $valor; return $this; } 
	public function getIdBannerLocal(){ return $this->id_banner_local; } 
 
	public function setDescricao( $valor ){ $this->descricao = $valor; return $this; } 
	public function getDescricao(){ return $this->descricao; } 
 
	public function setUrl( $valor ){ $this->url = $valor; return $this; } 
	public function getUrl(){ return $this->url; } 
 
	public function setTarget( $valor ){ $this->target = $valor; return $this; } 
	public function getTarget(){ return $this->target; } 
 
	public function setWidth( $valor ){ $this->width = $valor; return $this; } 
	public function getWidth(){ return $this->width; } 
 
	public function setHeight( $valor ){ $this->height = $valor; return $this; } 
	public function getHeight(){ return $this->height; } 
 
	public function setPeriodoStatus( $valor ){ $this->periodo_status = $valor; return $this; } 
	public function getPeriodoStatus(){ return $this->periodo_status; } 
 
	public function setPeriodoInicial( $valor ){ $this->periodo_inicial = $valor; return $this; } 
	public function getPeriodoInicial(){ return $this->periodo_inicial; } 
 
	public function setPeriodoFinal( $valor ){ $this->periodo_final = $valor; return $this; } 
	public function getPeriodoFinal(){ return $this->periodo_final; } 
 
	public function setArquivo( $valor ){ $this->arquivo = $valor; return $this; } 
	public function getArquivo(){ return $this->arquivo; } 
 
	public function setTipo( $valor ){ $this->tipo = $valor; return $this; } 
	public function getTipo(){ return $this->tipo; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>