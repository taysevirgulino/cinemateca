<? 
class Associado extends AbstractEntity implements EntityInterface { 
	 
	protected $id_associado, $identificador, $id_associado_perfil, $id_localidade, $id_associado_plano, $apelido, $nome, $cpf, $sexo, $data_nascimento, $estado_civil, $rg, $formacao, $descricao, $endereco, $numero, $complemento, $bairro, $cep, $telefone_fixo, $telefone_celular, $telefone_comercial, $redes, $imagem, $email, $senha, $empresa_nome, $empresa_ramo, $empresa_cnpj, $empresa_natureza, $empresa_cargo, $empresa_email, $empresa_site, $empresa_telefone1, $empresa_telefone2, $empresa_telefone3, $empresa_endereco, $empresa_cep, $empresa_imagem, $contratacao_id, $contratacao_data_inicial, $contratacao_data_final, $newsletter, $datahora_cadastro, $datahora_edicao, $datahora_login, $status;
	 
	public function setAssociado($IdAssociado, $Identificador, $IdAssociadoPerfil, $IdLocalidade, $IdAssociadoPlano, $Apelido, $Nome, $Cpf, $Sexo, $DataNascimento, $EstadoCivil, $Rg, $Formacao, $Descricao, $Endereco, $Numero, $Complemento, $Bairro, $Cep, $TelefoneFixo, $TelefoneCelular, $TelefoneComercial, $Redes, $Imagem, $Email, $Senha, $EmpresaNome, $EmpresaRamo, $EmpresaCnpj, $EmpresaNatureza, $EmpresaCargo, $EmpresaEmail, $EmpresaSite, $EmpresaTelefone1, $EmpresaTelefone2, $EmpresaTelefone3, $EmpresaEndereco, $EmpresaCep, $EmpresaImagem, $ContratacaoId, $ContratacaoDataInicial, $ContratacaoDataFinal, $Newsletter, $DatahoraCadastro, $DatahoraEdicao, $DatahoraLogin, $Status){ 
			$this->setIdAssociado( $IdAssociado ); 
			$this->setIdentificador( $Identificador ); 
			$this->setIdAssociadoPerfil( $IdAssociadoPerfil ); 
			$this->setIdLocalidade( $IdLocalidade ); 
			$this->setIdAssociadoPlano( $IdAssociadoPlano ); 
			$this->setApelido( $Apelido ); 
			$this->setNome( $Nome ); 
			$this->setCpf( $Cpf ); 
			$this->setSexo( $Sexo ); 
			$this->setDataNascimento( $DataNascimento ); 
			$this->setEstadoCivil( $EstadoCivil ); 
			$this->setRg( $Rg ); 
			$this->setFormacao( $Formacao ); 
			$this->setDescricao( $Descricao ); 
			$this->setEndereco( $Endereco ); 
			$this->setNumero( $Numero ); 
			$this->setComplemento( $Complemento ); 
			$this->setBairro( $Bairro ); 
			$this->setCep( $Cep ); 
			$this->setTelefoneFixo( $TelefoneFixo ); 
			$this->setTelefoneCelular( $TelefoneCelular ); 
			$this->setTelefoneComercial( $TelefoneComercial ); 
			$this->setRedes( $Redes ); 
			$this->setImagem( $Imagem ); 
			$this->setEmail( $Email ); 
			$this->setSenha( $Senha ); 
			$this->setEmpresaNome( $EmpresaNome ); 
			$this->setEmpresaRamo( $EmpresaRamo ); 
			$this->setEmpresaCnpj( $EmpresaCnpj ); 
			$this->setEmpresaNatureza( $EmpresaNatureza ); 
			$this->setEmpresaCargo( $EmpresaCargo ); 
			$this->setEmpresaEmail( $EmpresaEmail ); 
			$this->setEmpresaSite( $EmpresaSite ); 
			$this->setEmpresaTelefone1( $EmpresaTelefone1 ); 
			$this->setEmpresaTelefone2( $EmpresaTelefone2 ); 
			$this->setEmpresaTelefone3( $EmpresaTelefone3 ); 
			$this->setEmpresaEndereco( $EmpresaEndereco ); 
			$this->setEmpresaCep( $EmpresaCep ); 
			$this->setEmpresaImagem( $EmpresaImagem ); 
			$this->setContratacaoId( $ContratacaoId ); 
			$this->setContratacaoDataInicial( $ContratacaoDataInicial ); 
			$this->setContratacaoDataFinal( $ContratacaoDataFinal ); 
			$this->setNewsletter( $Newsletter ); 
			$this->setDatahoraCadastro( $DatahoraCadastro ); 
			$this->setDatahoraEdicao( $DatahoraEdicao ); 
			$this->setDatahoraLogin( $DatahoraLogin ); 
			$this->setStatus( $Status ); 
			return $this; 
	} 
 
	public function setIdAssociado( $valor ){ $this->id_associado = $valor; return $this; } 
	public function getIdAssociado(){ return $this->id_associado; } 
 
	public function setIdentificador( $valor ){ $this->identificador = $valor; return $this; } 
	public function getIdentificador(){ return (!empty($this->identificador)) ? $this->identificador : $this->identificador = md5(uniqid(rand(), true)); } 
 
	public function setIdAssociadoPerfil( $valor ){ $this->id_associado_perfil = $valor; return $this; } 
	public function getIdAssociadoPerfil(){ return $this->id_associado_perfil; } 
 
	public function setIdLocalidade( $valor ){ $this->id_localidade = $valor; return $this; } 
	public function getIdLocalidade(){ return $this->id_localidade; } 
 
	public function setIdAssociadoPlano( $valor ){ $this->id_associado_plano = $valor; return $this; } 
	public function getIdAssociadoPlano(){ return $this->id_associado_plano; } 
 
	public function setApelido( $valor ){ $this->apelido = $valor; return $this; } 
	public function getApelido(){ return $this->apelido; } 
 
	public function setNome( $valor ){ $this->nome = $valor; return $this; } 
	public function getNome(){ return $this->nome; } 
 
	public function setCpf( $valor ){ $this->cpf = $valor; return $this; } 
	public function getCpf(){ return $this->cpf; } 
 
	public function setSexo( $valor ){ $this->sexo = $valor; return $this; } 
	public function getSexo(){ return $this->sexo; } 
 
	public function setDataNascimento( $valor ){ $this->data_nascimento = $valor; return $this; } 
	public function getDataNascimento(){ return $this->data_nascimento; } 
 
	public function setEstadoCivil( $valor ){ $this->estado_civil = $valor; return $this; } 
	public function getEstadoCivil(){ return $this->estado_civil; } 
 
	public function setRg( $valor ){ $this->rg = $valor; return $this; } 
	public function getRg(){ return $this->rg; } 
 
	public function setFormacao( $valor ){ $this->formacao = $valor; return $this; } 
	public function getFormacao(){ return $this->formacao; } 
 
	public function setDescricao( $valor ){ $this->descricao = $valor; return $this; } 
	public function getDescricao(){ return $this->descricao; } 
 
	public function setEndereco( $valor ){ $this->endereco = $valor; return $this; } 
	public function getEndereco(){ return $this->endereco; } 
 
	public function setNumero( $valor ){ $this->numero = $valor; return $this; } 
	public function getNumero(){ return $this->numero; } 
 
	public function setComplemento( $valor ){ $this->complemento = $valor; return $this; } 
	public function getComplemento(){ return $this->complemento; } 
 
	public function setBairro( $valor ){ $this->bairro = $valor; return $this; } 
	public function getBairro(){ return $this->bairro; } 
 
	public function setCep( $valor ){ $this->cep = $valor; return $this; } 
	public function getCep(){ return $this->cep; } 
 
	public function setTelefoneFixo( $valor ){ $this->telefone_fixo = $valor; return $this; } 
	public function getTelefoneFixo(){ return $this->telefone_fixo; } 
 
	public function setTelefoneCelular( $valor ){ $this->telefone_celular = $valor; return $this; } 
	public function getTelefoneCelular(){ return $this->telefone_celular; } 
 
	public function setTelefoneComercial( $valor ){ $this->telefone_comercial = $valor; return $this; } 
	public function getTelefoneComercial(){ return $this->telefone_comercial; } 
 
	public function setRedes( $valor ){ $this->redes = $valor; return $this; } 
	public function getRedes(){ return $this->redes; } 
 
	public function setImagem( $valor ){ $this->imagem = $valor; return $this; } 
	public function getImagem(){ return $this->imagem; } 
 
	public function setEmail( $valor ){ $this->email = $valor; return $this; } 
	public function getEmail(){ return $this->email; } 
 
	public function setSenha( $valor ){ $this->senha = $valor; return $this; } 
	public function getSenha(){ return $this->senha; } 
 
	public function setEmpresaNome( $valor ){ $this->empresa_nome = $valor; return $this; } 
	public function getEmpresaNome(){ return $this->empresa_nome; } 
 
	public function setEmpresaRamo( $valor ){ $this->empresa_ramo = $valor; return $this; } 
	public function getEmpresaRamo(){ return $this->empresa_ramo; } 
 
	public function setEmpresaCnpj( $valor ){ $this->empresa_cnpj = $valor; return $this; } 
	public function getEmpresaCnpj(){ return $this->empresa_cnpj; } 
 
	public function setEmpresaNatureza( $valor ){ $this->empresa_natureza = $valor; return $this; } 
	public function getEmpresaNatureza(){ return $this->empresa_natureza; } 
 
	public function setEmpresaCargo( $valor ){ $this->empresa_cargo = $valor; return $this; } 
	public function getEmpresaCargo(){ return $this->empresa_cargo; } 
 
	public function setEmpresaEmail( $valor ){ $this->empresa_email = $valor; return $this; } 
	public function getEmpresaEmail(){ return $this->empresa_email; } 
 
	public function setEmpresaSite( $valor ){ $this->empresa_site = $valor; return $this; } 
	public function getEmpresaSite(){ return $this->empresa_site; } 
 
	public function setEmpresaTelefone1( $valor ){ $this->empresa_telefone1 = $valor; return $this; } 
	public function getEmpresaTelefone1(){ return $this->empresa_telefone1; } 
 
	public function setEmpresaTelefone2( $valor ){ $this->empresa_telefone2 = $valor; return $this; } 
	public function getEmpresaTelefone2(){ return $this->empresa_telefone2; } 
 
	public function setEmpresaTelefone3( $valor ){ $this->empresa_telefone3 = $valor; return $this; } 
	public function getEmpresaTelefone3(){ return $this->empresa_telefone3; } 
 
	public function setEmpresaEndereco( $valor ){ $this->empresa_endereco = $valor; return $this; } 
	public function getEmpresaEndereco(){ return $this->empresa_endereco; } 
 
	public function setEmpresaCep( $valor ){ $this->empresa_cep = $valor; return $this; } 
	public function getEmpresaCep(){ return $this->empresa_cep; } 
 
	public function setEmpresaImagem( $valor ){ $this->empresa_imagem = $valor; return $this; } 
	public function getEmpresaImagem(){ return $this->empresa_imagem; } 
 
	public function setContratacaoId( $valor ){ $this->contratacao_id = $valor; return $this; } 
	public function getContratacaoId(){ return $this->contratacao_id; } 
 
	public function setContratacaoDataInicial( $valor ){ $this->contratacao_data_inicial = $valor; return $this; } 
	public function getContratacaoDataInicial(){ return $this->contratacao_data_inicial; } 
 
	public function setContratacaoDataFinal( $valor ){ $this->contratacao_data_final = $valor; return $this; } 
	public function getContratacaoDataFinal(){ return $this->contratacao_data_final; } 
 
	public function setNewsletter( $valor ){ $this->newsletter = $valor; return $this; } 
	public function getNewsletter(){ return $this->newsletter; } 
 
	public function setDatahoraCadastro( $valor ){ $this->datahora_cadastro = $valor; return $this; } 
	public function getDatahoraCadastro(){ return $this->datahora_cadastro; } 
 
	public function setDatahoraEdicao( $valor ){ $this->datahora_edicao = $valor; return $this; } 
	public function getDatahoraEdicao(){ return $this->datahora_edicao; } 
 
	public function setDatahoraLogin( $valor ){ $this->datahora_login = $valor; return $this; } 
	public function getDatahoraLogin(){ return $this->datahora_login; } 
 
	public function setStatus( $valor ){ $this->status = $valor; return $this; } 
	public function getStatus(){ return $this->status; } 
 
}
?>