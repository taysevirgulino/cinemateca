<? 
class GaleriaCategoria extends AbstractEntity implements EntityInterface { 
	 
	protected $id_galeria_categoria, $identificador, $ide_origem, $id_galeria_categoria_pai, $nome, $descricao, $prioridade, $status;
	 
	public function setGaleriaCategoria($IdGaleriaCategoria, $Identificador, $IdeOrigem, $IdGaleriaCategoriaPai, $Nome, $Descricao, $Prioridade, $Status){ 
			$this->setIdGaleriaCategoria( $IdGaleriaCategoria ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setIdGaleriaCategoriaPai( $IdGaleriaCategoriaPai ); 
			$this->setNome( $Nome ); 
			$this->setDescricao( $Descricao ); 
			$this->setPrioridade( $Prioridade ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdGaleriaCategoria( $valor ){ $this->id_galeria_categoria = $valor; return $this; } 
	public function getIdGaleriaCategoria(){ return $this->id_galeria_categoria; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setIdGaleriaCategoriaPai( $valor ){ $this->id_galeria_categoria_pai = $valor; return $this; } 
	public function getIdGaleriaCategoriaPai(){ return $this->id_galeria_categoria_pai; } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setDescricao( $valor ){ $this->descricao = $valor; return $this; } 
	public function getDescricao(){ return $this->descricao; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>