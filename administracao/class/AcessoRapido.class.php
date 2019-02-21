<? 
class AcessoRapido extends AbstractEntity implements EntityInterface { 
	 
	protected $id_acesso_rapido, $identificador, $ide_origem, $id_acesso_rapido_pai, $id_acesso_rapido_bloco, $nome, $url, $target, $prioridade, $status;
	 
	public function setAcessoRapido($IdAcessoRapido, $Identificador, $IdeOrigem, $IdAcessoRapidoPai, $IdAcessoRapidoBloco, $Nome, $Url, $Target, $Prioridade, $Status){ 
			$this->setIdAcessoRapido( $IdAcessoRapido ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setIdAcessoRapidoPai( $IdAcessoRapidoPai ); 
			$this->setIdAcessoRapidoBloco( $IdAcessoRapidoBloco ); 
			$this->setNome( $Nome ); 
			$this->setUrl( $Url ); 
			$this->setTarget( $Target ); 
			$this->setPrioridade( $Prioridade ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdAcessoRapido( $valor ){ $this->id_acesso_rapido = $valor; return $this; } 
	public function getIdAcessoRapido(){ return $this->id_acesso_rapido; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setIdAcessoRapidoPai( $valor ){ $this->id_acesso_rapido_pai = $valor; return $this; } 
	public function getIdAcessoRapidoPai(){ return $this->id_acesso_rapido_pai; } 
 
	public function setIdAcessoRapidoBloco( $valor ){ $this->id_acesso_rapido_bloco = $valor; return $this; } 
	public function getIdAcessoRapidoBloco(){ return $this->id_acesso_rapido_bloco; } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setUrl( $valor ){ $this->url = $valor; return $this; } 
	public function getUrl(){ return $this->url; } 
 
	public function setTarget( $valor ){ $this->target = $valor; return $this; } 
	public function getTarget(){ return $this->target; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>