<? 
class ArquivoDisciplina extends AbstractEntity implements EntityInterface { 
	 
	protected $id_arquivo_disciplina, $identificador, $titulo, $prioridade, $status;
	 
	public function setArquivoDisciplina($IdArquivoDisciplina, $Identificador, $Titulo, $Prioridade, $Status){ 
			$this->setIdArquivoDisciplina( $IdArquivoDisciplina ); 
			$this->setIdentificador( $Identificador ); 
			$this->setTitulo( $Titulo ); 
			$this->setPrioridade( $Prioridade ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdArquivoDisciplina( $valor ){ $this->id_arquivo_disciplina = $valor; return $this; } 
	public function getIdArquivoDisciplina(){ return $this->id_arquivo_disciplina; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>