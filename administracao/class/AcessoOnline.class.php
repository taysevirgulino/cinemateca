<? 
class AcessoOnline extends AbstractEntity implements EntityInterface { 
	 
	protected $id_acesso_online, $identificador, $ide_origem, $sessao, $time_stamp;
	 
	public function setAcessoOnline($IdAcessoOnline, $Identificador, $IdeOrigem, $Sessao, $TimeStamp){ 
			$this->setIdAcessoOnline( $IdAcessoOnline ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setSessao( $Sessao ); 
			$this->setTimeStamp( $TimeStamp ); 
			return $this; 
	} 
 
	public function setIdAcessoOnline( $valor ){ $this->id_acesso_online = $valor; return $this; } 
	public function getIdAcessoOnline(){ return $this->id_acesso_online; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setSessao( $valor ){ $this->sessao = $valor; return $this; } 
	public function getSessao(){ return $this->sessao; } 
 
	public function setTimeStamp( $valor ){ $this->time_stamp = $valor; return $this; } 
	public function getTimeStamp(){ return $this->time_stamp; } 
 
}
?>