<? 
class GaleriaFoto extends AbstractEntity implements EntityInterface { 
	 
	protected $id_galeria_foto, $identificador, $ide_origem, $id_galeria_album, $credito, $descricao, $foto, $prioridade;
	 
	public function setGaleriaFoto($IdGaleriaFoto, $Identificador, $IdeOrigem, $IdGaleriaAlbum, $Credito, $Descricao, $Foto, $Prioridade){ 
			$this->setIdGaleriaFoto( $IdGaleriaFoto ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setIdGaleriaAlbum( $IdGaleriaAlbum ); 
			$this->setCredito( $Credito ); 
			$this->setDescricao( $Descricao ); 
			$this->setFoto( $Foto ); 
			$this->setPrioridade( $Prioridade ); 
			return $this; 
	} 
 
	public function setIdGaleriaFoto( $valor ){ $this->id_galeria_foto = $valor; return $this; } 
	public function getIdGaleriaFoto(){ return $this->id_galeria_foto; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setIdGaleriaAlbum( $valor ){ $this->id_galeria_album = $valor; return $this; } 
	public function getIdGaleriaAlbum(){ return $this->id_galeria_album; } 
 
	public function setCredito( $valor ){ $this->credito = $valor; return $this; } 
	public function getCredito(){ return $this->credito; } 
 
	public function setDescricao( $valor ){ $this->descricao = $valor; return $this; } 
	public function getDescricao(){ return $this->descricao; } 
 
	public function setFoto( $valor ){ $this->foto = $valor; return $this; } 
	public function getFoto(){ return $this->foto; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
}
?>