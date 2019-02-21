<? 
class Localidade extends AbstractEntity implements EntityInterface { 
	 
	protected $id_localidade, $identificador, $uf, $cidade, $capital;
	 
	public function setLocalidade($IdLocalidade, $Identificador, $Uf, $Cidade, $Capital){ 
			$this->setIdLocalidade( $IdLocalidade ); 
			$this->setIdentificador( $Identificador ); 
			$this->setUf( $Uf ); 
			$this->setCidade( $Cidade ); 
			$this->setCapital( $Capital ); 
			return $this; 
	} 
 
	public function setIdLocalidade( $valor ){ $this->id_localidade = $valor; return $this; } 
	public function getIdLocalidade(){ return $this->id_localidade; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setUf( $valor ){ $this->uf = $valor; return $this; } 
	public function getUf(){ return $this->uf; } 
 
	public function setCidade( $valor ){ $this->cidade = $valor; return $this; } 
	public function getCidade(){ return $this->cidade; } 
 
	public function setCapital( $valor ){ $this->capital = $valor; return $this; } 
	public function getCapital(){ return $this->capital; } 
 
}
?>