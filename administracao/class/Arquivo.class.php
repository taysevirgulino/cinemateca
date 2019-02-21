<? 
class Arquivo extends AbstractEntity implements EntityInterface { 
	 
	protected $id_arquivo, $identificador, $id_lojista, $id_arquivo_disciplina, $id_arquivo_tipo, $id_usuario, $id_usuario_responsavel, $titulo, $texto, $datahora, $datahora_edicao, $status;
	 
	public function setArquivo($IdArquivo, $Identificador, $IdLojista, $IdArquivoDisciplina, $IdArquivoTipo, $IdUsuario, $IdUsuarioResponsavel, $Titulo, $Texto, $Datahora, $DatahoraEdicao, $Status){ 
			$this->setIdArquivo( $IdArquivo ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdLojista( $IdLojista ); 
			$this->setIdArquivoDisciplina( $IdArquivoDisciplina ); 
			$this->setIdArquivoTipo( $IdArquivoTipo ); 
			$this->setIdUsuario( $IdUsuario ); 
			$this->setIdUsuarioResponsavel( $IdUsuarioResponsavel ); 
			$this->setTitulo( $Titulo ); 
			$this->setTexto( $Texto ); 
			$this->setDatahora( $Datahora ); 
			$this->setDatahoraEdicao( $DatahoraEdicao ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdArquivo( $valor ){ $this->id_arquivo = $valor; return $this; } 
	public function getIdArquivo(){ return $this->id_arquivo; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdLojista( $valor ){ $this->id_lojista = $valor; return $this; } 
	public function getIdLojista(){ return $this->id_lojista; } 
 
	public function setIdArquivoDisciplina( $valor ){ $this->id_arquivo_disciplina = $valor; return $this; } 
	public function getIdArquivoDisciplina(){ return $this->id_arquivo_disciplina; } 
 
	public function setIdArquivoTipo( $valor ){ $this->id_arquivo_tipo = $valor; return $this; } 
	public function getIdArquivoTipo(){ return $this->id_arquivo_tipo; } 
 
	public function setIdUsuario( $valor ){ $this->id_usuario = $valor; return $this; } 
	public function getIdUsuario(){ return $this->id_usuario; } 
 
	public function setIdUsuarioResponsavel( $valor ){ $this->id_usuario_responsavel = $valor; return $this; } 
	public function getIdUsuarioResponsavel(){ return $this->id_usuario_responsavel; } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setTexto( $valor ){ $this->texto = $valor; return $this; } 
	public function getTexto(){ return $this->texto; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setDatahoraEdicao( $valor ){ $this->datahora_edicao = $valor; return $this; } 
	public function getDatahoraEdicao(){ return $this->datahora_edicao; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>