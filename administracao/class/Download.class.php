<? 
class Download extends AbstractEntity implements EntityInterface { 
	 
	protected $id_download, $identificador, $ide_origem, $id_download_categoria, $nome, $descricao, $arquivo, $imagem, $click, $datahora, $prioridade, $status;
	 
	public function setDownload($IdDownload, $Identificador, $IdeOrigem, $IdDownloadCategoria, $Nome, $Descricao, $Arquivo, $Imagem, $Click, $Datahora, $Prioridade, $Status){ 
			$this->setIdDownload( $IdDownload ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setIdDownloadCategoria( $IdDownloadCategoria ); 
			$this->setNome( $Nome ); 
			$this->setDescricao( $Descricao ); 
			$this->setArquivo( $Arquivo ); 
			$this->setImagem( $Imagem ); 
			$this->setClick( $Click ); 
			$this->setDatahora( $Datahora ); 
			$this->setPrioridade( $Prioridade ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdDownload( $valor ){ $this->id_download = $valor; return $this; } 
	public function getIdDownload(){ return $this->id_download; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setIdDownloadCategoria( $valor ){ $this->id_download_categoria = $valor; return $this; } 
	public function getIdDownloadCategoria(){ return $this->id_download_categoria; } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setDescricao( $valor ){ $this->descricao = $valor; return $this; } 
	public function getDescricao(){ return $this->descricao; } 
 
	public function setArquivo( $valor ){ $this->arquivo = $valor; return $this; } 
	public function getArquivo(){ return $this->arquivo; } 
 
	public function setImagem( $valor ){ $this->imagem = $valor; return $this; } 
	public function getImagem(){ return $this->imagem; } 
 
	public function setClick( $valor ){ $this->click = $valor; return $this; } 
	public function getClick(){ return $this->click; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>