<? 
class AreaPublicacao extends AbstractEntity implements EntityInterface { 
	 
	protected $id_area_publicacao, $identificador, $id_area_publicacao_bloco, $nome, $quantidade, $img, $img_width, $img_height, $prioridade;
	 
	public function setAreaPublicacao($IdAreaPublicacao, $Identificador, $IdAreaPublicacaoBloco, $Nome, $Quantidade, $Img, $ImgWidth, $ImgHeight, $Prioridade){ 
			$this->setIdAreaPublicacao( $IdAreaPublicacao ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdAreaPublicacaoBloco( $IdAreaPublicacaoBloco ); 
			$this->setNome( $Nome ); 
			$this->setQuantidade( $Quantidade ); 
			$this->setImg( $Img ); 
			$this->setImgWidth( $ImgWidth ); 
			$this->setImgHeight( $ImgHeight ); 
			$this->setPrioridade( $Prioridade ); 
			return $this; 
	} 
 
	public function setIdAreaPublicacao( $valor ){ $this->id_area_publicacao = $valor; return $this; } 
	public function getIdAreaPublicacao(){ return $this->id_area_publicacao; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdAreaPublicacaoBloco( $valor ){ $this->id_area_publicacao_bloco = $valor; return $this; } 
	public function getIdAreaPublicacaoBloco(){ return $this->id_area_publicacao_bloco; } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setQuantidade( $valor ){ $this->quantidade = $valor; return $this; } 
	public function getQuantidade(){ return $this->quantidade; } 
 
	public function setImg( $valor ){ $this->img = $valor; return $this; } 
	public function getImg(){ return $this->img; } 
 
	public function setImgWidth( $valor ){ $this->img_width = $valor; return $this; } 
	public function getImgWidth(){ return $this->img_width; } 
 
	public function setImgHeight( $valor ){ $this->img_height = $valor; return $this; } 
	public function getImgHeight(){ return $this->img_height; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
}
?>