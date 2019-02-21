<? 
class ArquivoHistorico extends AbstractEntity implements EntityInterface { 
	 
	protected $id_arquivo_historico, $identificador, $id_arquivo, $id_arquivo_tipo, $id_usuario, $id_usuario_responsavel, $texto, $datahora, $status;
	 
	public function setArquivoHistorico($IdArquivoHistorico, $Identificador, $IdArquivo, $IdArquivoTipo, $IdUsuario, $IdUsuarioResponsavel, $Texto, $Datahora, $Status){ 
			$this->setIdArquivoHistorico( $IdArquivoHistorico ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdArquivo( $IdArquivo ); 
			$this->setIdArquivoTipo( $IdArquivoTipo ); 
			$this->setIdUsuario( $IdUsuario ); 
			$this->setIdUsuarioResponsavel( $IdUsuarioResponsavel ); 
			$this->setTexto( $Texto ); 
			$this->setDatahora( $Datahora ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdArquivoHistorico( $valor ){ $this->id_arquivo_historico = $valor; return $this; } 
	public function getIdArquivoHistorico(){ return $this->id_arquivo_historico; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdArquivo( $valor ){ $this->id_arquivo = $valor; return $this; } 
	public function getIdArquivo(){ return $this->id_arquivo; } 
 
	public function setIdArquivoTipo( $valor ){ $this->id_arquivo_tipo = $valor; return $this; } 
	public function getIdArquivoTipo(){ return $this->id_arquivo_tipo; } 
 
	public function setIdUsuario( $valor ){ $this->id_usuario = $valor; return $this; } 
	public function getIdUsuario(){ return $this->id_usuario; } 
 
	public function setIdUsuarioResponsavel( $valor ){ $this->id_usuario_responsavel = $valor; return $this; } 
	public function getIdUsuarioResponsavel(){ return $this->id_usuario_responsavel; } 
 
	public function setTexto( $valor ){ $this->texto = $valor; return $this; } 
	public function getTexto(){ return $this->texto; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>