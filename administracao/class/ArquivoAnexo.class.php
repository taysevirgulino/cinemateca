<? 
class ArquivoAnexo extends AbstractEntity implements EntityInterface { 
	 
	protected $id_arquivo_anexo, $identificador, $id_arquivo, $id_arquivo_historico, $arquivo, $datahora;
	 
	public function setArquivoAnexo($IdArquivoAnexo, $Identificador, $IdArquivo, $IdArquivoHistorico, $Arquivo, $Datahora){ 
			$this->setIdArquivoAnexo( $IdArquivoAnexo ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdArquivo( $IdArquivo ); 
			$this->setIdArquivoHistorico( $IdArquivoHistorico ); 
			$this->setArquivo( $Arquivo ); 
			$this->setDatahora( $Datahora ); 
			return $this; 
	} 
 
	public function setIdArquivoAnexo( $valor ){ $this->id_arquivo_anexo = $valor; return $this; } 
	public function getIdArquivoAnexo(){ return $this->id_arquivo_anexo; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdArquivo( $valor ){ $this->id_arquivo = $valor; return $this; } 
	public function getIdArquivo(){ return $this->id_arquivo; } 
 
	public function setIdArquivoHistorico( $valor ){ $this->id_arquivo_historico = $valor; return $this; } 
	public function getIdArquivoHistorico(){ return $this->id_arquivo_historico; } 
 
	public function setArquivo( $valor ){ $this->arquivo = $valor; return $this; } 
	public function getArquivo(){ return $this->arquivo; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
}
?>