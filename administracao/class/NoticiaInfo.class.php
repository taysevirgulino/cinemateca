<? 
class NoticiaInfo extends AbstractEntity implements EntityInterface { 
	 
	protected $id_noticia_info, $identificador, $id_noticia, $id_app_usuario_cadastro, $id_app_usuario_edicao, $datahora_cadastro, $datahora_edicao, $url_curta;
	 
	public function setNoticiaInfo($IdNoticiaInfo, $Identificador, $IdNoticia, $IdAppUsuarioCadastro, $IdAppUsuarioEdicao, $DatahoraCadastro, $DatahoraEdicao, $UrlCurta){ 
			$this->setIdNoticiaInfo( $IdNoticiaInfo ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdNoticia( $IdNoticia ); 
			$this->setIdAppUsuarioCadastro( $IdAppUsuarioCadastro ); 
			$this->setIdAppUsuarioEdicao( $IdAppUsuarioEdicao ); 
			$this->setDatahoraCadastro( $DatahoraCadastro ); 
			$this->setDatahoraEdicao( $DatahoraEdicao ); 
			$this->setUrlCurta( $UrlCurta ); 
			return $this; 
	} 
 
	public function setIdNoticiaInfo( $valor ){ $this->id_noticia_info = $valor; return $this; } 
	public function getIdNoticiaInfo(){ return $this->id_noticia_info; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdNoticia( $valor ){ $this->id_noticia = $valor; return $this; } 
	public function getIdNoticia(){ return $this->id_noticia; } 
 
	public function setIdAppUsuarioCadastro( $valor ){ $this->id_app_usuario_cadastro = $valor; return $this; } 
	public function getIdAppUsuarioCadastro(){ return $this->id_app_usuario_cadastro; } 
 
	public function setIdAppUsuarioEdicao( $valor ){ $this->id_app_usuario_edicao = $valor; return $this; } 
	public function getIdAppUsuarioEdicao(){ return $this->id_app_usuario_edicao; } 
 
	public function setDatahoraCadastro( $valor ){ $this->datahora_cadastro = $valor; return $this; } 
	public function getDatahoraCadastro(){ return $this->datahora_cadastro; } 
 
	public function setDatahoraEdicao( $valor ){ $this->datahora_edicao = $valor; return $this; } 
	public function getDatahoraEdicao(){ return $this->datahora_edicao; } 
 
	public function setUrlCurta( $valor ){ $this->url_curta = $valor; return $this; } 
	public function getUrlCurta(){ return $this->url_curta; } 
 
}
?>