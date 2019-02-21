<? 
class CurriculoAcesso extends AbstractEntity implements EntityInterface { 
	 
	protected $id_curriculo_acesso, $identificador, $id_curriculo, $id_usuario, $datahora, $ip;
	 
	public function setCurriculoAcesso($IdCurriculoAcesso, $Identificador, $IdCurriculo, $IdUsuario, $Datahora, $Ip){ 
			$this->setIdCurriculoAcesso( $IdCurriculoAcesso ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdCurriculo( $IdCurriculo ); 
			$this->setIdUsuario( $IdUsuario ); 
			$this->setDatahora( $Datahora ); 
			$this->setIp( $Ip ); 
			return $this; 
	} 
 
	public function setIdCurriculoAcesso( $valor ){ $this->id_curriculo_acesso = $valor; return $this; } 
	public function getIdCurriculoAcesso(){ return $this->id_curriculo_acesso; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdCurriculo( $valor ){ $this->id_curriculo = $valor; return $this; } 
	public function getIdCurriculo(){ return $this->id_curriculo; } 
 
	public function setIdUsuario( $valor ){ $this->id_usuario = $valor; return $this; } 
	public function getIdUsuario(){ return $this->id_usuario; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setIp( $valor ){ $this->ip = $valor; return $this; } 
	public function getIp(){ return $this->ip; } 
 
}
?>