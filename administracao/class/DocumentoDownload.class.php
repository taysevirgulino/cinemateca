<? 
class DocumentoDownload extends AbstractEntity implements EntityInterface { 
	 
	protected $id_documento_download, $identificador, $id_documento, $id_usuario, $datahora, $ip;
	 
	public function setDocumentoDownload($IdDocumentoDownload, $Identificador, $IdDocumento, $IdUsuario, $Datahora, $Ip){ 
			$this->setIdDocumentoDownload( $IdDocumentoDownload ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdDocumento( $IdDocumento ); 
			$this->setIdUsuario( $IdUsuario ); 
			$this->setDatahora( $Datahora ); 
			$this->setIp( $Ip ); 
			return $this; 
	} 
 
	public function setIdDocumentoDownload( $valor ){ $this->id_documento_download = $valor; return $this; } 
	public function getIdDocumentoDownload(){ return $this->id_documento_download; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdDocumento( $valor ){ $this->id_documento = $valor; return $this; } 
	public function getIdDocumento(){ return $this->id_documento; } 
 
	public function setIdUsuario( $valor ){ $this->id_usuario = $valor; return $this; } 
	public function getIdUsuario(){ return $this->id_usuario; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setIp( $valor ){ $this->ip = $valor; return $this; } 
	public function getIp(){ return $this->ip; } 
 
}
?>