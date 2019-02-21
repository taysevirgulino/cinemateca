<? 
class ArquivoDownload extends AbstractEntity implements EntityInterface { 
	 
	protected $id_arquivo_download, $identificador, $id_arquivo_anexo, $id_usuario, $datahora, $ip;
	 
	public function setArquivoDownload($IdArquivoDownload, $Identificador, $IdArquivoAnexo, $IdUsuario, $Datahora, $Ip){ 
			$this->setIdArquivoDownload( $IdArquivoDownload ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdArquivoAnexo( $IdArquivoAnexo ); 
			$this->setIdUsuario( $IdUsuario ); 
			$this->setDatahora( $Datahora ); 
			$this->setIp( $Ip ); 
			return $this; 
	} 
 
	public function setIdArquivoDownload( $valor ){ $this->id_arquivo_download = $valor; return $this; } 
	public function getIdArquivoDownload(){ return $this->id_arquivo_download; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdArquivoAnexo( $valor ){ $this->id_arquivo_anexo = $valor; return $this; } 
	public function getIdArquivoAnexo(){ return $this->id_arquivo_anexo; } 
 
	public function setIdUsuario( $valor ){ $this->id_usuario = $valor; return $this; } 
	public function getIdUsuario(){ return $this->id_usuario; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setIp( $valor ){ $this->ip = $valor; return $this; } 
	public function getIp(){ return $this->ip; } 
 
}
?>