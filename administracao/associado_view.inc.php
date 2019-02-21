<?
	$ID = intval( System::_REQUEST("id") );
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "associado_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "associado_add.php?back=$link_back";
	$link_edit = "associado_edit.php?id=$ID&back=$link_back";
	$link_remove = "associado_remove.php?id=$ID&back=$link_back";


	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Associado();

	if( $obj->buscarAssociado(1, $ID) ){
		$ValueAssociadoPerfil = AssociadoPerfilManage::buscarAssociadoPerfil(1, $obj->getIdAssociadoPerfil());
		$frm_id_associado_perfil = $ValueAssociadoPerfil["titulo"];
		$ValueAssociadoPlano = AssociadoPlanoManage::buscarAssociadoPlano(1, $obj->getIdAssociadoPlano());
		$frm_id_associado_plano = $ValueAssociadoPlano["titulo"];
		$frm_apelido = $obj->getApelido();
		$frm_nome = $obj->getNome();
		$frm_cpf = $obj->getCpf();
		$frm_sexo = $obj->getSexo();
		$frm_data_nascimento = System::FormatarData($obj->getDataNascimento(), "d/m/y");
		$frm_estado_civil = $obj->getEstadoCivil();
		$frm_rg = $obj->getRg();
		$frm_formacao = $obj->getFormacao();
		$frm_descricao = System::_TextByHtml($obj->getDescricao());
		$frm_endereco = $obj->getEndereco();
		$frm_numero = $obj->getNumero();
		$frm_complemento = $obj->getComplemento();
		$frm_bairro = $obj->getBairro();
		$frm_cep = $obj->getCep();
		$frm_telefone_fixo = $obj->getTelefoneFixo();
		$frm_telefone_celular = $obj->getTelefoneCelular();
		$frm_telefone_comercial = $obj->getTelefoneComercial();
		$frm_redes = $obj->getRedes();
		$frm_imagem = $obj->getImagem();
		$frm_email = $obj->getEmail();
		$frm_senha = AssociadoCrypt::Decrypt($obj->getSenha());
		$frm_empresa_nome = $obj->getEmpresaNome();
		$frm_empresa_ramo = $obj->getEmpresaRamo();
		$frm_empresa_cnpj = $obj->getEmpresaCnpj();
		$frm_empresa_natureza = $obj->getEmpresaNatureza();
		$frm_empresa_cargo = $obj->getEmpresaCargo();
		$frm_empresa_email = $obj->getEmpresaEmail();
		$frm_empresa_site = $obj->getEmpresaSite();
		$frm_empresa_telefone1 = $obj->getEmpresaTelefone1();
		$frm_empresa_telefone2 = $obj->getEmpresaTelefone2();
		$frm_empresa_telefone3 = $obj->getEmpresaTelefone3();
		$frm_empresa_endereco = $obj->getEmpresaEndereco();
		$frm_empresa_cep = $obj->getEmpresaCep();
		$frm_empresa_imagem = $obj->getEmpresaImagem();
		$frm_contratacao_id = $obj->getContratacaoId();
		$frm_contratacao_data_inicial = System::FormatarData($obj->getContratacaoDataInicial(), "d/m/y");
		$frm_contratacao_data_final = System::FormatarData($obj->getContratacaoDataFinal(), "d/m/y");
		$frm_newsletter = $obj->getNewsletter();
		$frm_datahora_cadastro = System::FormatarData($obj->getDatahoraCadastro(), "d/m/y [Hhi]");
		$frm_datahora_edicao = System::FormatarData($obj->getDatahoraEdicao(), "d/m/y [Hhi]");
		$frm_datahora_login = System::FormatarData($obj->getDatahoraLogin(), "d/m/y [Hhi]");
		$frm_status = (($obj->getStatus()==1) ? "Ativo" : "Inativo");
	}else{
		System::Redirect($link_list);
	}
?>