<? 
class LojistaCronograma extends AbstractEntity implements EntityInterface { 
	 
	protected $id_lojista_cronograma, $identificador, $id_lojista, $id_cronograma_farol, $porcentagem_indefinido, $porcentagem_aberto, $porcentagem_vencido, $porcentagem_concluido, $previsao_inicio, $previsao_fim, $datahora;
	 
	public function setLojistaCronograma($IdLojistaCronograma, $Identificador, $IdLojista, $IdCronogramaFarol, $PorcentagemIndefinido, $PorcentagemAberto, $PorcentagemVencido, $PorcentagemConcluido, $PrevisaoInicio, $PrevisaoFim, $Datahora){ 
			$this->setIdLojistaCronograma( $IdLojistaCronograma ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdLojista( $IdLojista ); 
			$this->setIdCronogramaFarol( $IdCronogramaFarol ); 
			$this->setPorcentagemIndefinido( $PorcentagemIndefinido ); 
			$this->setPorcentagemAberto( $PorcentagemAberto ); 
			$this->setPorcentagemVencido( $PorcentagemVencido ); 
			$this->setPorcentagemConcluido( $PorcentagemConcluido ); 
			$this->setPrevisaoInicio( $PrevisaoInicio ); 
			$this->setPrevisaoFim( $PrevisaoFim ); 
			$this->setDatahora( $Datahora ); 
			return $this; 
	} 
 
	public function setIdLojistaCronograma( $valor ){ $this->id_lojista_cronograma = $valor; return $this; } 
	public function getIdLojistaCronograma(){ return $this->id_lojista_cronograma; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdLojista( $valor ){ $this->id_lojista = $valor; return $this; } 
	public function getIdLojista(){ return $this->id_lojista; } 
 
	public function setIdCronogramaFarol( $valor ){ $this->id_cronograma_farol = $valor; return $this; } 
	public function getIdCronogramaFarol(){ return $this->id_cronograma_farol; } 
 
	public function setPorcentagemIndefinido( $valor ){ $this->porcentagem_indefinido = $valor; return $this; } 
	public function getPorcentagemIndefinido(){ return $this->porcentagem_indefinido; } 
 
	public function setPorcentagemAberto( $valor ){ $this->porcentagem_aberto = $valor; return $this; } 
	public function getPorcentagemAberto(){ return $this->porcentagem_aberto; } 
 
	public function setPorcentagemVencido( $valor ){ $this->porcentagem_vencido = $valor; return $this; } 
	public function getPorcentagemVencido(){ return $this->porcentagem_vencido; } 
 
	public function setPorcentagemConcluido( $valor ){ $this->porcentagem_concluido = $valor; return $this; } 
	public function getPorcentagemConcluido(){ return $this->porcentagem_concluido; } 
 
	public function setPrevisaoInicio( $valor ){ $this->previsao_inicio = $valor; return $this; } 
	public function getPrevisaoInicio(){ return $this->previsao_inicio; } 
 
	public function setPrevisaoFim( $valor ){ $this->previsao_fim = $valor; return $this; } 
	public function getPrevisaoFim(){ return $this->previsao_fim; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
}
?>