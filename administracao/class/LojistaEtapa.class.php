<? 
class LojistaEtapa extends AbstractEntity implements EntityInterface { 
	 
	protected $id_lojista_etapa, $identificador, $id_cronograma_etapa, $id_lojista, $id_usuario, $data, $datahora, $status;
	 
	public function setLojistaEtapa($IdLojistaEtapa, $Identificador, $IdCronogramaEtapa, $IdLojista, $IdUsuario, $Data, $Datahora, $Status){ 
			$this->setIdLojistaEtapa( $IdLojistaEtapa ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdCronogramaEtapa( $IdCronogramaEtapa ); 
			$this->setIdLojista( $IdLojista ); 
			$this->setIdUsuario( $IdUsuario ); 
			$this->setData( $Data ); 
			$this->setDatahora( $Datahora ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdLojistaEtapa( $valor ){ $this->id_lojista_etapa = $valor; return $this; } 
	public function getIdLojistaEtapa(){ return $this->id_lojista_etapa; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdCronogramaEtapa( $valor ){ $this->id_cronograma_etapa = $valor; return $this; } 
	public function getIdCronogramaEtapa(){ return $this->id_cronograma_etapa; } 
 
	public function setIdLojista( $valor ){ $this->id_lojista = $valor; return $this; } 
	public function getIdLojista(){ return $this->id_lojista; } 
 
	public function setIdUsuario( $valor ){ $this->id_usuario = $valor; return $this; } 
	public function getIdUsuario(){ return $this->id_usuario; } 
 
	public function setData( $valor ){ $this->data = $valor; return $this; } 
	public function getData(){ return $this->data; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>