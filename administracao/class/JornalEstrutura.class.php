<? 
class JornalEstrutura extends AbstractEntity implements EntityInterface { 
	 
	protected $id_jornal_estrutura, $identificador, $nome, $prioridade;
	 
	public function setJornalEstrutura($IdJornalEstrutura, $Identificador, $Nome, $Prioridade){ 
			$this->setIdJornalEstrutura( $IdJornalEstrutura ); 
			$this->setIdentificador( $Identificador ); 
			$this->setNome( $Nome ); 
			$this->setPrioridade( $Prioridade ); 
			return $this; 
	} 
 
	public function setIdJornalEstrutura( $valor ){ $this->id_jornal_estrutura = $valor; return $this; } 
	public function getIdJornalEstrutura(){ return $this->id_jornal_estrutura; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
}
?>