<? 
class Noticia extends AbstractEntity implements EntityInterface { 
	 
	protected $id_noticia, $identificador, $ide_origem, $id_editoria, $id_area_publicacao, $id_app_usuario_cadastro, $id_app_usuario_edicao, $chapeu, $titulo, $resumo, $texto, $link, $link_target, $foto_credito, $foto_descricao, $foto_arquivo, $foto_area_publicacao, $click, $shares, $comments, $slug, $url_curta, $datahora, $datahora_cadastro, $datahora_edicao, $tipo, $status;
	 
	public function setNoticia($IdNoticia, $Identificador, $IdeOrigem, $IdEditoria, $IdAreaPublicacao, $IdAppUsuarioCadastro, $IdAppUsuarioEdicao, $Chapeu, $Titulo, $Resumo, $Texto, $Link, $LinkTarget, $FotoCredito, $FotoDescricao, $FotoArquivo, $FotoAreaPublicacao, $Click, $Shares, $Comments, $Slug, $UrlCurta, $Datahora, $DatahoraCadastro, $DatahoraEdicao, $Tipo, $Status){ 
			$this->setIdNoticia( $IdNoticia ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setIdEditoria( $IdEditoria ); 
			$this->setIdAreaPublicacao( $IdAreaPublicacao ); 
			$this->setIdAppUsuarioCadastro( $IdAppUsuarioCadastro ); 
			$this->setIdAppUsuarioEdicao( $IdAppUsuarioEdicao ); 
			$this->setChapeu( $Chapeu ); 
			$this->setTitulo( $Titulo ); 
			$this->setResumo( $Resumo ); 
			$this->setTexto( $Texto ); 
			$this->setLink( $Link ); 
			$this->setLinkTarget( $LinkTarget ); 
			$this->setFotoCredito( $FotoCredito ); 
			$this->setFotoDescricao( $FotoDescricao ); 
			$this->setFotoArquivo( $FotoArquivo ); 
			$this->setFotoAreaPublicacao( $FotoAreaPublicacao ); 
			$this->setClick( $Click ); 
			$this->setShares( $Shares ); 
			$this->setComments( $Comments ); 
			$this->setSlug( $Slug ); 
			$this->setUrlCurta( $UrlCurta ); 
			$this->setDatahora( $Datahora ); 
			$this->setDatahoraCadastro( $DatahoraCadastro ); 
			$this->setDatahoraEdicao( $DatahoraEdicao ); 
			$this->setTipo( $Tipo ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdNoticia( $valor ){ $this->id_noticia = $valor; return $this; } 
	public function getIdNoticia(){ return $this->id_noticia; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setIdEditoria( $valor ){ $this->id_editoria = $valor; return $this; } 
	public function getIdEditoria(){ return $this->id_editoria; } 
 
	public function setIdAreaPublicacao( $valor ){ $this->id_area_publicacao = $valor; return $this; } 
	public function getIdAreaPublicacao(){ return $this->id_area_publicacao; } 
 
	public function setIdAppUsuarioCadastro( $valor ){ $this->id_app_usuario_cadastro = $valor; return $this; } 
	public function getIdAppUsuarioCadastro(){ return $this->id_app_usuario_cadastro; } 
 
	public function setIdAppUsuarioEdicao( $valor ){ $this->id_app_usuario_edicao = $valor; return $this; } 
	public function getIdAppUsuarioEdicao(){ return $this->id_app_usuario_edicao; } 
 
	public function setChapeu( $valor ){ $this->chapeu = $valor; return $this; } 
	public function getChapeu(){ return $this->chapeu; } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setResumo( $valor ){ $this->resumo = $valor; return $this; } 
	public function getResumo(){ return $this->resumo; } 
 
	public function setTexto( $valor ){ $this->texto = $valor; return $this; } 
	public function getTexto(){ return $this->texto; } 
 
	public function setLink( $valor ){ $this->link = $valor; return $this; } 
	public function getLink(){ return $this->link; } 
 
	public function setLinkTarget( $valor ){ $this->link_target = $valor; return $this; } 
	public function getLinkTarget(){ return $this->link_target; } 
 
	public function setFotoCredito( $valor ){ $this->foto_credito = $valor; return $this; } 
	public function getFotoCredito(){ return $this->foto_credito; } 
 
	public function setFotoDescricao( $valor ){ $this->foto_descricao = $valor; return $this; } 
	public function getFotoDescricao(){ return $this->foto_descricao; } 
 
	public function setFotoArquivo( $valor ){ $this->foto_arquivo = $valor; return $this; } 
	public function getFotoArquivo(){ return $this->foto_arquivo; } 
 
	public function setFotoAreaPublicacao( $valor ){ $this->foto_area_publicacao = $valor; return $this; } 
	public function getFotoAreaPublicacao(){ return $this->foto_area_publicacao; } 
 
	public function setClick( $valor ){ $this->click = $valor; return $this; } 
	public function getClick(){ return $this->click; } 
 
	public function setShares( $valor ){ $this->shares = $valor; return $this; } 
	public function getShares(){ return $this->shares; } 
 
	public function setComments( $valor ){ $this->comments = $valor; return $this; } 
	public function getComments(){ return $this->comments; } 
 
	public function setSlug( $valor ){ $this->slug = $valor; return $this; } 
	public function getSlug(){ return $this->slug; } 
 
	public function setUrlCurta( $valor ){ $this->url_curta = $valor; return $this; } 
	public function getUrlCurta(){ return $this->url_curta; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setDatahoraCadastro( $valor ){ $this->datahora_cadastro = $valor; return $this; } 
	public function getDatahoraCadastro(){ return $this->datahora_cadastro; } 
 
	public function setDatahoraEdicao( $valor ){ $this->datahora_edicao = $valor; return $this; } 
	public function getDatahoraEdicao(){ return $this->datahora_edicao; } 
 
	public function setTipo( $valor ){ $this->tipo = $valor; return $this; } 
	public function getTipo(){ return $this->tipo; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>