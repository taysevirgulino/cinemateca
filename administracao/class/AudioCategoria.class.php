<? 
class AudioCategoria extends AbstractEntity implements EntityInterface { 
	 
	protected $id_audio_categoria, $identificador, $ide_origem, $nome, $descricao, $prioridade;
	 
	public function setAudioCategoria($IdAudioCategoria, $Identificador, $IdeOrigem, $Nome, $Descricao, $Prioridade){ 
			$this->setIdAudioCategoria( $IdAudioCategoria ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setNome( $Nome ); 
			$this->setDescricao( $Descricao ); 
			$this->setPrioridade( $Prioridade ); 
			return $this; 
	} 
 
	public function setIdAudioCategoria( $valor ){ $this->id_audio_categoria = $valor; return $this; } 
	public function getIdAudioCategoria(){ return $this->id_audio_categoria; } 
 
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