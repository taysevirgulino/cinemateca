<? 
class AcessoLive extends AbstractEntity implements EntityInterface { 
	 
	protected $id_acesso_live, $identificador, $ide_origem, $datahora, $acesso;
	 
	public function setAcessoLive($IdAcessoLive, $Identificador, $IdeOrigem, $Datahora, $Acesso){ 
			$this->setIdAcessoLive( $IdAcessoLive ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setDatahora( $Datahora ); 
			$this->setAcesso( $Acesso ); 
			return $this; 
	} 
 
	public function setIdAcessoLive( $valor ){ $this->id_acesso_live = $valor; return $this; } 
	public function getIdAcessoLive(){ return $this->id_acesso_live; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setAcesso( $valor ){ $this->acesso = $valor; return $this; } 
	public function getAcesso(){ return $this->acesso; } 
 
}
?>