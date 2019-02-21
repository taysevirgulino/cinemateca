<? 
class Conteudo extends AbstractEntity implements EntityInterface { 
	 
	protected $id_conteudo, $identificador, $ide_origem, $titulo, $codigo, $legenda, $texto, $imagem, $prioridade;
	 
	public function setConteudo($IdConteudo, $Identificador, $IdeOrigem, $Titulo, $Codigo, $Legenda, $Texto, $Imagem, $Prioridade){ 
			$this->setIdConteudo( $IdConteudo ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setTitulo( $Titulo ); 
			$this->setCodigo( $Codigo ); 
			$this->setLegenda( $Legenda ); 
			$this->setTexto( $Texto ); 
			$this->setImagem( $Imagem ); 
			$this->setPrioridade( $Prioridade ); 
			return $this; 
	} 
 
	public function setIdConteudo( $valor ){ $this->id_conteudo = $valor; return $this; } 
	public function getIdConteudo(){ return $this->id_conteudo; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setCodigo( $valor ){ $this->codigo = $valor; return $this; } 
	public function getCodigo(){ return $this->codigo; } 
 
	public function setLegenda( $valor ){ $this->legenda = $valor; return $this; } 
	public function getLegenda(){ return $this->legenda; } 
 
	public function setTexto( $valor ){ $this->texto = $valor; return $this; } 
	public function getTexto(){ return $this->texto; } 
 
	public function setImagem( $valor ){ $this->imagem = $valor; return $this; } 
	public function getImagem(){ return $this->imagem; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
}
?>