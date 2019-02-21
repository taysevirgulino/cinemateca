<? 
class AgendaCategoria extends AbstractEntity implements EntityInterface { 
	 
	protected $id_agenda_categoria, $identificador, $ide_origem, $nome, $descricao, $prioridade;
	 
	public function setAgendaCategoria($IdAgendaCategoria, $Identificador, $IdeOrigem, $Nome, $Descricao, $Prioridade){ 
			$this->setIdAgendaCategoria( $IdAgendaCategoria ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setNome( $Nome ); 
			$this->setDescricao( $Descricao ); 
			$this->setPrioridade( $Prioridade ); 
			return $this; 
	} 
 
	public function setIdAgendaCategoria( $valor ){ $this->id_agenda_categoria = $valor; return $this; } 
	public function getIdAgendaCategoria(){ return $this->id_agenda_categoria; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setDescricao( $valor ){ $this->descricao = $valor; return $this; } 
	public function getDescricao(){ return $this->descricao; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
}
?>