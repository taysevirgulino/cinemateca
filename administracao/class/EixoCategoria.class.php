<? 
class EixoCategoria extends AbstractEntity implements EntityInterface { 
	 
	protected $id_eixo_categoria, $identificador, $nome, $datahora, $status;
	 
	public function setEixoCategoria($IdEixoCategoria, $Identificador, $Nome, $Datahora, $Status){ 
			$this->setIdEixoCategoria( $IdEixoCategoria ); 
			$this->setIdentificador( $Identificador ); 
			$this->setNome( $Nome ); 
			$this->setDatahora( $Datahora ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdEixoCategoria( $valor ){ $this->id_eixo_categoria = $valor; return $this; } 
	public function getIdEixoCategoria(){ return $this->id_eixo_categoria; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>