<? 
class Loja extends AbstractEntity implements EntityInterface { 
	 
	protected $id_loja, $identificador, $id_empreendimento, $id_segmento, $numero, $pavimento, $area, $status;
	 
	public function setLoja($IdLoja, $Identificador, $IdEmpreendimento, $IdSegmento, $Numero, $Pavimento, $Area, $Status){ 
			$this->setIdLoja( $IdLoja ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdEmpreendimento( $IdEmpreendimento ); 
			$this->setIdSegmento( $IdSegmento ); 
			$this->setNumero( $Numero ); 
			$this->setPavimento( $Pavimento ); 
			$this->setArea( $Area ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdLoja( $valor ){ $this->id_loja = $valor; return $this; } 
	public function getIdLoja(){ return $this->id_loja; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdEmpreendimento( $valor ){ $this->id_empreendimento = $valor; return $this; } 
	public function getIdEmpreendimento(){ return $this->id_empreendimento; } 
 
	public function setIdSegmento( $valor ){ $this->id_segmento = $valor; return $this; } 
	public function getIdSegmento(){ return $this->id_segmento; } 
 
	public function setNumero( $valor ){ $this->numero = $valor; return $this; } 
	public function getNumero(){ return $this->numero; } 
 
	public function setPavimento( $valor ){ $this->pavimento = $valor; return $this; } 
	public function getPavimento(){ return $this->pavimento; } 
 
	public function setArea( $valor ){ $this->area = $valor; return $this; } 
	public function getArea(){ return $this->area; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>