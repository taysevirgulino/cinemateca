<? 
class Documento extends AbstractEntity implements EntityInterface { 
	 
	protected $id_documento, $identificador, $id_empreendimento, $id_usuario, $titulo, $arquivo, $datahora, $status;
	 
	public function setDocumento($IdDocumento, $Identificador, $IdEmpreendimento, $IdUsuario, $Titulo, $Arquivo, $Datahora, $Status){ 
			$this->setIdDocumento( $IdDocumento ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdEmpreendimento( $IdEmpreendimento ); 
			$this->setIdUsuario( $IdUsuario ); 
			$this->setTitulo( $Titulo ); 
			$this->setArquivo( $Arquivo ); 
			$this->setDatahora( $Datahora ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdDocumento( $valor ){ $this->id_documento = $valor; return $this; } 
	public function getIdDocumento(){ return $this->id_documento; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdEmpreendimento( $valor ){ $this->id_empreendimento = $valor; return $this; } 
	public function getIdEmpreendimento(){ return $this->id_empreendimento; } 
 
	public function setIdUsuario( $valor ){ $this->id_usuario = $valor; return $this; } 
	public function getIdUsuario(){ return $this->id_usuario; } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setArquivo( $valor ){ $this->arquivo = $valor; return $this; } 
	public function getArquivo(){ return $this->arquivo; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>