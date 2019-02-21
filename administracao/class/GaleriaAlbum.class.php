<? 
class GaleriaAlbum extends AbstractEntity implements EntityInterface { 
	 
	protected $id_galeria_album, $identificador, $ide_origem, $id_galeria_categoria, $nome, $descricao, $datahora, $status;
	 
	public function setGaleriaAlbum($IdGaleriaAlbum, $Identificador, $IdeOrigem, $IdGaleriaCategoria, $Nome, $Descricao, $Datahora, $Status){ 
			$this->setIdGaleriaAlbum( $IdGaleriaAlbum ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setIdGaleriaCategoria( $IdGaleriaCategoria ); 
			$this->setNome( $Nome ); 
			$this->setDescricao( $Descricao ); 
			$this->setDatahora( $Datahora ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdGaleriaAlbum( $valor ){ $this->id_galeria_album = $valor; return $this; } 
	public function getIdGaleriaAlbum(){ return $this->id_galeria_album; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setIdGaleriaCategoria( $valor ){ $this->id_galeria_categoria = $valor; return $this; } 
	public function getIdGaleriaCategoria(){ return $this->id_galeria_categoria; } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setDescricao( $valor ){ $this->descricao = $valor; return $this; } 
	public function getDescricao(){ return $this->descricao; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>