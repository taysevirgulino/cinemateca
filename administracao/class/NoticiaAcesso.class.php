<? 
class NoticiaAcesso extends AbstractEntity implements EntityInterface { 
	 
	protected $id_noticia_acesso, $identificador, $id_noticia, $datahora, $click;
	 
	public function setNoticiaAcesso($IdNoticiaAcesso, $Identificador, $IdNoticia, $Datahora, $Click){ 
			$this->setIdNoticiaAcesso( $IdNoticiaAcesso ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdNoticia( $IdNoticia ); 
			$this->setDatahora( $Datahora ); 
			$this->setClick( $Click ); 
			return $this; 
	} 
 
	public function setIdNoticiaAcesso( $valor ){ $this->id_noticia_acesso = $valor; return $this; } 
	public function getIdNoticiaAcesso(){ return $this->id_noticia_acesso; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdNoticia( $valor ){ $this->id_noticia = $valor; return $this; } 
	public function getIdNoticia(){ return $this->id_noticia; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setClick( $valor ){ $this->click = $valor; return $this; } 
	public function getClick(){ return $this->click; } 
 
}
?>