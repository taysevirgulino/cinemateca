<? 
class Empreendimento extends AbstractEntity implements EntityInterface { 
	 
	protected $id_empreendimento, $identificador, $titulo, $endereco, $telefone, $email, $area_bruta_locavel, $area_total_construida, $status;
	 
	public function setEmpreendimento($IdEmpreendimento, $Identificador, $Titulo, $Endereco, $Telefone, $Email, $AreaBrutaLocavel, $AreaTotalConstruida, $Status){ 
			$this->setIdEmpreendimento( $IdEmpreendimento ); 
			$this->setIdentificador( $Identificador ); 
			$this->setTitulo( $Titulo ); 
			$this->setEndereco( $Endereco ); 
			$this->setTelefone( $Telefone ); 
			$this->setEmail( $Email ); 
			$this->setAreaBrutaLocavel( $AreaBrutaLocavel ); 
			$this->setAreaTotalConstruida( $AreaTotalConstruida ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdEmpreendimento( $valor ){ $this->id_empreendimento = $valor; return $this; } 
	public function getIdEmpreendimento(){ return $this->id_empreendimento; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setTitulo( $valor ){ $this->titulo = $valor; return $this; } 
	public function getTitulo(){ return $this->titulo; } 
 
	public function setEndereco( $valor ){ $this->endereco = $valor; return $this; } 
	public function getEndereco(){ return $this->endereco; } 
 
	public function setTelefone( $valor ){ $this->telefone = $valor; return $this; } 
	public function getTelefone(){ return $this->telefone; } 
 
	public function setEmail( $valor ){ $this->email = $valor; return $this; } 
	public function getEmail(){ return $this->email; } 
 
	public function setAreaBrutaLocavel( $valor ){ $this->area_bruta_locavel = $valor; return $this; } 
	public function getAreaBrutaLocavel(){ return $this->area_bruta_locavel; } 
 
	public function setAreaTotalConstruida( $valor ){ $this->area_total_construida = $valor; return $this; } 
	public function getAreaTotalConstruida(){ return $this->area_total_construida; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>