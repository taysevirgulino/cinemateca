<? 
class JornalEdicao extends AbstractEntity implements EntityInterface { 
	 
	protected $id_jornal_edicao, $identificador, $numero, $ano, $data_inicial, $data_final, $status;
	 
	public function setJornalEdicao($IdJornalEdicao, $Identificador, $Numero, $Ano, $DataInicial, $DataFinal, $Status){ 
			$this->setIdJornalEdicao( $IdJornalEdicao ); 
			$this->setIdentificador( $Identificador ); 
			$this->setNumero( $Numero ); 
			$this->setAno( $Ano ); 
			$this->setDataInicial( $DataInicial ); 
			$this->setDataFinal( $DataFinal ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdJornalEdicao( $valor ){ $this->id_jornal_edicao = $valor; return $this; } 
	public function getIdJornalEdicao(){ return $this->id_jornal_edicao; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setNumero( $valor ){ $this->numero = $valor; return $this; } 
	public function getNumero(){ return $this->numero; } 
 
	public function setAno( $valor ){ $this->ano = $valor; return $this; } 
	public function getAno(){ return $this->ano; } 
 
	public function setDataInicial( $valor ){ $this->data_inicial = $valor; return $this; } 
	public function getDataInicial(){ return $this->data_inicial; } 
 
	public function setDataFinal( $valor ){ $this->data_final = $valor; return $this; } 
	public function getDataFinal(){ return $this->data_final; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>