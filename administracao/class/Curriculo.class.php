<? 
class Curriculo extends AbstractEntity implements EntityInterface { 
	 
	protected $id_curriculo, $identificador, $id_empreendimento, $id_curriculo_area, $id_curriculo_segmento, $nome, $sobrenome, $sexo, $data_nascimento, $cpf, $estado_civil, $telefone, $telefone2, $email, $endereco, $cidade, $estado, $imagem, $arquivo, $datahora, $status;
	 
	public function setCurriculo($IdCurriculo, $Identificador, $IdEmpreendimento, $IdCurriculoArea, $IdCurriculoSegmento, $Nome, $Sobrenome, $Sexo, $DataNascimento, $Cpf, $EstadoCivil, $Telefone, $Telefone2, $Email, $Endereco, $Cidade, $Estado, $Imagem, $Arquivo, $Datahora, $Status){ 
			$this->setIdCurriculo( $IdCurriculo ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdEmpreendimento( $IdEmpreendimento ); 
			$this->setIdCurriculoArea( $IdCurriculoArea ); 
			$this->setIdCurriculoSegmento( $IdCurriculoSegmento ); 
			$this->setNome( $Nome ); 
			$this->setSobrenome( $Sobrenome ); 
			$this->setSexo( $Sexo ); 
			$this->setDataNascimento( $DataNascimento ); 
			$this->setCpf( $Cpf ); 
			$this->setEstadoCivil( $EstadoCivil ); 
			$this->setTelefone( $Telefone ); 
			$this->setTelefone2( $Telefone2 ); 
			$this->setEmail( $Email ); 
			$this->setEndereco( $Endereco ); 
			$this->setCidade( $Cidade ); 
			$this->setEstado( $Estado ); 
			$this->setImagem( $Imagem ); 
			$this->setArquivo( $Arquivo ); 
			$this->setDatahora( $Datahora ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdCurriculo( $valor ){ $this->id_curriculo = $valor; return $this; } 
	public function getIdCurriculo(){ return $this->id_curriculo; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdEmpreendimento( $valor ){ $this->id_empreendimento = $valor; return $this; } 
	public function getIdEmpreendimento(){ return $this->id_empreendimento; } 
 
	public function setIdCurriculoArea( $valor ){ $this->id_curriculo_area = $valor; return $this; } 
	public function getIdCurriculoArea(){ return $this->id_curriculo_area; } 
 
	public function setIdCurriculoSegmento( $valor ){ $this->id_curriculo_segmento = $valor; return $this; } 
	public function getIdCurriculoSegmento(){ return $this->id_curriculo_segmento; } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setSobrenome( $valor ){ $this->sobrenome = $valor; return $this; } 
	public function getSobrenome(){ return $this->sobrenome; } 
 
	public function setSexo( $valor ){ $this->sexo = $valor; return $this; } 
	public function getSexo(){ return $this->sexo; } 
 
	public function setDataNascimento( $valor ){ $this->data_nascimento = $valor; return $this; } 
	public function getDataNascimento(){ return $this->data_nascimento; } 
 
	public function setCpf( $valor ){ $this->cpf = $valor; return $this; } 
	public function getCpf(){ return $this->cpf; } 
 
	public function setEstadoCivil( $valor ){ $this->estado_civil = $valor; return $this; } 
	public function getEstadoCivil(){ return $this->estado_civil; } 
 
	public function setTelefone( $valor ){ $this->telefone = $valor; return $this; } 
	public function getTelefone(){ return $this->telefone; } 
 
	public function setTelefone2( $valor ){ $this->telefone2 = $valor; return $this; } 
	public function getTelefone2(){ return $this->telefone2; } 
 
	public function setEmail( $valor ){ $this->email = $valor; return $this; } 
	public function getEmail(){ return $this->email; } 
 
	public function setEndereco( $valor ){ $this->endereco = $valor; return $this; } 
	public function getEndereco(){ return $this->endereco; } 
 
	public function setCidade( $valor ){ $this->cidade = $valor; return $this; } 
	public function getCidade(){ return $this->cidade; } 
 
	public function setEstado( $valor ){ $this->estado = $valor; return $this; } 
	public function getEstado(){ return $this->estado; } 
 
	public function setImagem( $valor ){ $this->imagem = $valor; return $this; } 
	public function getImagem(){ return $this->imagem; } 
 
	public function setArquivo( $valor ){ $this->arquivo = $valor; return $this; } 
	public function getArquivo(){ return $this->arquivo; } 
 
	public function setDatahora( $valor ){ $this->datahora = $valor; return $this; } 
	public function getDatahora(){ return $this->datahora; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>