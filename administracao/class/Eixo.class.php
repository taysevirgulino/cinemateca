<? 
class Eixo extends AbstractEntity implements EntityInterface { 
	 
	protected $id_eixo, $identificador, $categoria, $nome, $id_disciplina, $datahora, $status;
	 
	public function setEixo($IdEixo, $Identificador, $Categoria, $Nome, $IdDisciplina, $Datahora, $Status){ 
			$this->setIdEixo( $IdEixo ); 
			$this->setIdentificador( $Identificador ); 
			$this->setCategoria( $Categoria ); 
			$this->setNome( $Nome ); 
			$this->setIdDisciplina( $IdDisciplina ); 
			$this->setDatahora( $Datahora ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdEixo( $valor ){ $this->id_eixo = $valor; return $this; } 
	public function getIdEixo(){ return $this->id_eixo; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setCategoria( $valor ){ $this->categoria = $valor; return $this; } 
	public function getCategoria(){ return $this->categoria; } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setIdDisciplina( $valor ){ $this->id_disciplina = $valor; return $this; } 
	public function getIdDisciplina(){ return $this->id_disciplina; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>