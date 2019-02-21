<? 
class Agenda extends AbstractEntity implements EntityInterface { 
	 
	protected $id_agenda, $identificador, $ide_origem, $id_agenda_categoria, $titulo, $descricao, $data, $hora, $local, $informacoes_contato, $imagem, $datahora, $status;
	 
	public function setAgenda($IdAgenda, $Identificador, $IdeOrigem, $IdAgendaCategoria, $Titulo, $Descricao, $Data, $Hora, $Local, $InformacoesContato, $Imagem, $Datahora, $Status){ 
			$this->setIdAgenda( $IdAgenda ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdeOrigem( $IdeOrigem ); 
			$this->setIdAgendaCategoria( $IdAgendaCategoria ); 
			$this->setTitulo( $Titulo ); 
			$this->setDescricao( $Descricao ); 
			$this->setData( $Data ); 
			$this->setHora( $Hora ); 
			$this->setLocal( $Local ); 
			$this->setInformacoesContato( $InformacoesContato ); 
			$this->setImagem( $Imagem ); 
			$this->setDatahora( $Datahora ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdAgenda( $valor ){ $this->id_agenda = $valor; return $this; } 
	public function getIdAgenda(){ return $this->id_agenda; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdeOrigem( $valor ){ $this->ide_origem = $valor; return $this; } 
	public function getIdeOrigem(){ return (!empty($this->ide_origem)) ? $this->ide_origem : $this->ide_origem = Current::IdeOrigem(); } 
 
	public function setIdAgendaCategoria( $valor ){ $this->id_agenda_categoria = $valor; return $this; } 
	public function getIdAgendaCategoria(){ return $this->id_agenda_categoria; } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setDescricao( $valor ){ $this->descricao = $valor; return $this; } 
	public function getDescricao(){ return $this->descricao; } 
 
	public function setData( $valor ){ $this->data = $valor; return $this; } 
	public function getData(){ return $this->data; } 
 
	public function setHora( $valor ){ $this->hora = $valor; return $this; } 
	public function getHora(){ return $this->hora; } 
 
	public function setLocal( $valor ){ $this->local = $valor; return $this; } 
	public function getLocal(){ return $this->local; } 
 
	public function setInformacoesContato( $valor ){ $this->informacoes_contato = $valor; return $this; } 
	public function getInformacoesContato(){ return $this->informacoes_contato; } 
 
	public function setImagem( $valor ){ $this->imagem = $valor; return $this; } 
	public function getImagem(){ return $this->imagem; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>