<? 
class Disciplina extends AbstractEntity implements EntityInterface { 
	 
	protected $id_disciplina, $identificador, $nome, $semestre, $conteudo, $datahora, $status;
	 
	public function setDisciplina($IdDisciplina, $Identificador, $Nome, $Semestre, $Conteudo, $Datahora, $Status){ 
			$this->setIdDisciplina( $IdDisciplina ); 
			$this->setIdentificador( $Identificador ); 
			$this->setNome( $Nome ); 
			$this->setSemestre( $Semestre ); 
			$this->setConteudo( $Conteudo ); 
			$this->setDatahora( $Datahora ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdDisciplina( $valor ){ $this->id_disciplina = $valor; return $this; } 
	public function getIdDisciplina(){ return $this->id_disciplina; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setSemestre( $valor ){ $this->semestre = $valor; return $this; } 
	public function getSemestre(){ return $this->semestre; } 
 
	public function setConteudo( $valor ){ $this->conteudo = $valor; return $this; } 
	public function getConteudo(){ return $this->conteudo; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>