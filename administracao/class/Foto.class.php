<? 
class Foto extends AbstractEntity implements EntityInterface { 
	 
	protected $id_foto, $identificador, $id_lojista, $id_usuario, $titulo, $imagem, $datahora, $status;
	 
	public function setFoto($IdFoto, $Identificador, $IdLojista, $IdUsuario, $Titulo, $Imagem, $Datahora, $Status){ 
			$this->setIdFoto( $IdFoto ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdLojista( $IdLojista ); 
			$this->setIdUsuario( $IdUsuario ); 
			$this->setTitulo( $Titulo ); 
			$this->setImagem( $Imagem ); 
			$this->setDatahora( $Datahora ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdFoto( $valor ){ $this->id_foto = $valor; return $this; } 
	public function getIdFoto(){ return $this->id_foto; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdLojista( $valor ){ $this->id_lojista = $valor; return $this; } 
	public function getIdLojista(){ return $this->id_lojista; } 
 
	public function setIdUsuario( $valor ){ $this->id_usuario = $valor; return $this; } 
	public function getIdUsuario(){ return $this->id_usuario; } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setImagem( $valor ){ $this->imagem = $valor; return $this; } 
	public function getImagem(){ return $this->imagem; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>