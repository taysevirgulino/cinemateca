<? 
class Filme extends AbstractEntity implements EntityInterface { 
	 
	protected $id_filme, $identificador, $id_eixo, $id_disciplina, $nome, $url, $url_youtube, $descricao, $datahora, $status;
	 
	public function setFilme($IdFilme, $Identificador, $IdEixo, $IdDisciplina, $Nome, $Url, $UrlYoutube, $Descricao, $Datahora, $Status){ 
			$this->setIdFilme( $IdFilme ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdEixo( $IdEixo ); 
			$this->setIdDisciplina( $IdDisciplina ); 
			$this->setNome( $Nome ); 
			$this->setUrl( $Url ); 
			$this->setUrlYoutube( $UrlYoutube ); 
			$this->setDescricao( $Descricao ); 
			$this->setDatahora( $Datahora ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdFilme( $valor ){ $this->id_filme = $valor; return $this; } 
	public function getIdFilme(){ return $this->id_filme; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdEixo( $valor ){ $this->id_eixo = $valor; return $this; } 
	public function getIdEixo(){ return $this->id_eixo; } 
 
	public function setIdDisciplina( $valor ){ $this->id_disciplina = $valor; return $this; } 
	public function getIdDisciplina(){ return $this->id_disciplina; } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setUrl( $valor ){ $this->url = $valor; return $this; } 
	public function getUrl(){ return $this->url; } 
 
	public function setUrlYoutube( $valor ){ $this->url_youtube = $valor; return $this; } 
	public function getUrlYoutube(){ return $this->url_youtube; } 
 
	public function setDescricao( $valor ){ $this->descricao = $valor; return $this; } 
	public function getDescricao(){ return $this->descricao; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>