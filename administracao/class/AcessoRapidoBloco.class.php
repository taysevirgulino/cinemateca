<? 
class AcessoRapidoBloco extends AbstractEntity implements EntityInterface { 
	 
	protected $id_acesso_rapido_bloco, $identificador, $ide_origem, $nome, $prioridade;
	 
	public function setAcessoRapidoBloco($IdAcessoRapidoBloco, $Identificador, $IdeOrigem, $Nome, $Prioridade){ 
			$this->setIdAcessoRapidoBloco( $IdAcessoRapidoBloco ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setNome( $Nome ); 
			$this->setPrioridade( $Prioridade ); 
			return $this; 
	} 
 
	public function setIdAcessoRapidoBloco( $valor ){ $this->id_acesso_rapido_bloco = $valor; return $this; } 
	public function getIdAcessoRapidoBloco(){ return $this->id_acesso_rapido_bloco; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
}
?>