<? 
class PainelMenu extends AbstractEntity implements EntityInterface { 
	 
	protected $id_painel_menu, $identificador, $id_painel_menu_pai, $nome, $url, $style, $target, $prioridade, $status;
	 
	public function setPainelMenu($IdPainelMenu, $Identificador, $IdPainelMenuPai, $Nome, $Url, $Style, $Target, $Prioridade, $Status){ 
			$this->setIdPainelMenu( $IdPainelMenu ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdPainelMenuPai( $IdPainelMenuPai ); 
			$this->setNome( $Nome ); 
			$this->setUrl( $Url ); 
			$this->setStyle( $Style ); 
			$this->setTarget( $Target ); 
			$this->setPrioridade( $Prioridade ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdPainelMenu( $valor ){ $this->id_painel_menu = $valor; return $this; } 
	public function getIdPainelMenu(){ return $this->id_painel_menu; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdPainelMenuPai( $valor ){ $this->id_painel_menu_pai = $valor; return $this; } 
	public function getIdPainelMenuPai(){ return $this->id_painel_menu_pai; } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setUrl( $valor ){ $this->url = $valor; return $this; } 
	public function getUrl(){ return $this->url; } 
 
	public function setStyle( $valor ){ $this->style = $valor; return $this; } 
	public function getStyle(){ return $this->style; } 
 
	public function setTarget( $valor ){ $this->target = $valor; return $this; } 
	public function getTarget(){ return $this->target; } 
 
	public function setPrioridade( $valor ){ $this->prioridade = $valor; return $this; } 
	public function getPrioridade(){ return $this->prioridade; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>