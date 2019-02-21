<? 
class AssociadoContratacao extends AbstractEntity implements EntityInterface { 
	 
	protected $id_associado_contratacao, $identificador, $id_associado, $id_associado_plano, $valor_bruto, $valor_desconto, $valor_final, $datahora, $pagamento_retorno, $pagamento_datahora, $pagamento_valor, $plano_data_inicial, $plano_data_final, $status;
	 
	public function setAssociadoContratacao($IdAssociadoContratacao, $Identificador, $IdAssociado, $IdAssociadoPlano, $ValorBruto, $ValorDesconto, $ValorFinal, $Datahora, $PagamentoRetorno, $PagamentoDatahora, $PagamentoValor, $PlanoDataInicial, $PlanoDataFinal, $Status){ 
			$this->setIdAssociadoContratacao( $IdAssociadoContratacao ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdAssociado( $IdAssociado ); 
			$this->setIdAssociadoPlano( $IdAssociadoPlano ); 
			$this->setValorBruto( $ValorBruto ); 
			$this->setValorDesconto( $ValorDesconto ); 
			$this->setValorFinal( $ValorFinal ); 
			$this->setDatahora( $Datahora ); 
			$this->setPagamentoRetorno( $PagamentoRetorno ); 
			$this->setPagamentoDatahora( $PagamentoDatahora ); 
			$this->setPagamentoValor( $PagamentoValor ); 
			$this->setPlanoDataInicial( $PlanoDataInicial ); 
			$this->setPlanoDataFinal( $PlanoDataFinal ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdAssociadoContratacao( $valor ){ $this->id_associado_contratacao = $valor; return $this; } 
	public function getIdAssociadoContratacao(){ return $this->id_associado_contratacao; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdAssociado( $valor ){ $this->id_associado = $valor; return $this; } 
	public function getIdAssociado(){ return $this->id_associado; } 
 
	public function setIdAssociadoPlano( $valor ){ $this->id_associado_plano = $valor; return $this; } 
	public function getIdAssociadoPlano(){ return $this->id_associado_plano; } 
 
	public function setValorBruto( $valor ){ $this->valor_bruto = $valor; return $this; } 
	public function getValorBruto(){ return $this->valor_bruto; } 
 
	public function setValorDesconto( $valor ){ $this->valor_desconto = $valor; return $this; } 
	public function getValorDesconto(){ return $this->valor_desconto; } 
 
	public function setValorFinal( $valor ){ $this->valor_final = $valor; return $this; } 
	public function getValorFinal(){ return $this->valor_final; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setPagamentoRetorno( $valor ){ $this->pagamento_retorno = $valor; return $this; } 
	public function getPagamentoRetorno(){ return $this->pagamento_retorno; } 
 
	public function setPagamentoDatahora( $valor ){ $this->pagamento_datahora = $valor; return $this; } 
	public function getPagamentoDatahora(){ return $this->pagamento_datahora; } 
 
	public function setPagamentoValor( $valor ){ $this->pagamento_valor = $valor; return $this; } 
	public function getPagamentoValor(){ return $this->pagamento_valor; } 
 
	public function setPlanoDataInicial( $valor ){ $this->plano_data_inicial = $valor; return $this; } 
	public function getPlanoDataInicial(){ return $this->plano_data_inicial; } 
 
	public function setPlanoDataFinal( $valor ){ $this->plano_data_final = $valor; return $this; } 
	public function getPlanoDataFinal(){ return $this->plano_data_final; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>