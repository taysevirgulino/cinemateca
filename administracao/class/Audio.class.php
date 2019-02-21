<? 
class Audio extends AbstractEntity implements EntityInterface { 
	 
	protected $id_audio, $identificador, $ide_origem, $id_audio_categoria, $titulo, $descricao, $arquivo, $embed, $width, $height, $imagem, $datahora, $status;
	 
	public function setAudio($IdAudio, $Identificador, $IdeOrigem, $IdAudioCategoria, $Titulo, $Descricao, $Arquivo, $Embed, $Width, $Height, $Imagem, $Datahora, $Status){ 
			$this->setIdAudio( $IdAudio ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setIdAudioCategoria( $IdAudioCategoria ); 
			$this->setTitulo( $Titulo ); 
			$this->setDescricao( $Descricao ); 
			$this->setArquivo( $Arquivo ); 
			$this->setEmbed( $Embed ); 
			$this->setWidth( $Width ); 
			$this->setHeight( $Height ); 
			$this->setImagem( $Imagem ); 
			$this->setDatahora( $Datahora ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdAudio( $valor ){ $this->id_audio = $valor; return $this; } 
	public function getIdAudio(){ return $this->id_audio; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setIdAudioCategoria( $valor ){ $this->id_audio_categoria = $valor; return $this; } 
	public function getIdAudioCategoria(){ return $this->id_audio_categoria; } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setDescricao( $valor ){ $this->descricao = $valor; return $this; } 
	public function getDescricao(){ return $this->descricao; } 
 
	public function setArquivo( $valor ){ $this->arquivo = $valor; return $this; } 
	public function getArquivo(){ return $this->arquivo; } 
 
	public function setEmbed( $valor ){ $this->embed = $valor; return $this; } 
	public function getEmbed(){ return $this->embed; } 
 
	public function setWidth( $valor ){ $this->width = $valor; return $this; } 
	public function getWidth(){ return $this->width; } 
 
	public function setHeight( $valor ){ $this->height = $valor; return $this; } 
	public function getHeight(){ return $this->height; } 
 
	public function setImagem( $valor ){ $this->imagem = $valor; return $this; } 
	public function getImagem(){ return $this->imagem; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>