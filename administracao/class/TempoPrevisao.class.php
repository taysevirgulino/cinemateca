<? 
class TempoPrevisao extends AbstractEntity implements EntityInterface { 
	 
	protected $id_tempo_previsao, $identificador, $id_tempo_cidade, $dia, $tempo, $maxima, $minima, $iuv;
	 
	public function setTempoPrevisao($IdTempoPrevisao, $Identificador, $IdTempoCidade, $Dia, $Tempo, $Maxima, $Minima, $Iuv){ 
			$this->setIdTempoPrevisao( $IdTempoPrevisao ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdTempoCidade( $IdTempoCidade ); 
			$this->setDia( $Dia ); 
			$this->setTempo( $Tempo ); 
			$this->setMaxima( $Maxima ); 
			$this->setMinima( $Minima ); 
			$this->setIuv( $Iuv ); 
			return $this; 
	} 
 
	public function setIdTempoPrevisao( $valor ){ $this->id_tempo_previsao = $valor; return $this; } 
	public function getIdTempoPrevisao(){ return $this->id_tempo_previsao; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdTempoCidade( $valor ){ $this->id_tempo_cidade = $valor; return $this; } 
	public function getIdTempoCidade(){ return $this->id_tempo_cidade; } 
 
	public function setDia( $valor ){ $this->dia = $valor; return $this; } 
	public function getDia(){ return $this->dia; } 
 
	public function setTempo( $valor ){ $this->tempo = $valor; return $this; } 
	public function getTempo(){ return $this->tempo; } 
 
	public function setMaxima( $valor ){ $this->maxima = $valor; return $this; } 
	public function getMaxima(){ return $this->maxima; } 
 
	public function setMinima( $valor ){ $this->minima = $valor; return $this; } 
	public function getMinima(){ return $this->minima; } 
 
	public function setIuv( $valor ){ $this->iuv = $valor; return $this; } 
	public function getIuv(){ return $this->iuv; } 
 
}
?>