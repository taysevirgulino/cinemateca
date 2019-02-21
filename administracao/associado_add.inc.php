<?
	$link_list = ((Validacao::isVazio(System::_REQUEST("back"))) ? "associado_list.php" : base64_decode(System::_REQUEST("back")) );
	$link_back = base64_encode($link_list);
	$link_add = "associado_add.php?back=$link_back";
	$link_edit = "associado_edit.php?back=$link_back";
	$link_remove = "associado_remove.php?back=$link_back";

	$frm_id_associado_perfil = System::_POST("FrmIdAssociadoPerfil");
	$frm_id_localidade = System::_POST("FrmIdLocalidade");
	$frm_id_associado_plano = System::_POST("FrmIdAssociadoPlano");
	$frm_apelido = System::_POST("FrmApelido");
	$frm_nome = System::_POST("FrmNome");
	$frm_cpf = System::_POST("FrmCpf");
	$frm_sexo = System::_POST("FrmSexo");
	$frm_data_nascimento = System::_POST("FrmDataNascimento");
	$frm_estado_civil = System::_POST("FrmEstadoCivil");
	$frm_rg = System::_POST("FrmRg");
	$frm_formacao = System::_POST("FrmFormacao");
	$frm_descricao = System::_POST("FrmDescricao");
	$frm_endereco = System::_POST("FrmEndereco");
	$frm_numero = System::_POST("FrmNumero");
	$frm_complemento = System::_POST("FrmComplemento");
	$frm_bairro = System::_POST("FrmBairro");
	$frm_cep = System::_POST("FrmCep");
	$frm_telefone_fixo = System::_POST("FrmTelefoneFixo");
	$frm_telefone_celular = System::_POST("FrmTelefoneCelular");
	$frm_telefone_comercial = System::_POST("FrmTelefoneComercial");
	$frm_redes = System::_POST("FrmRedes");
	$frm_imagem_file = $_FILES["FrmImagemFile"];
	$frm_email = System::_POST("FrmEmail");
	$frm_senha = System::_POST("FrmSenha");
	$frm_empresa_nome = System::_POST("FrmEmpresaNome");
	$frm_empresa_ramo = System::_POST("FrmEmpresaRamo");
	$frm_empresa_cnpj = System::_POST("FrmEmpresaCnpj");
	$frm_empresa_natureza = System::_POST("FrmEmpresaNatureza");
	$frm_empresa_cargo = System::_POST("FrmEmpresaCargo");
	$frm_empresa_email = System::_POST("FrmEmpresaEmail");
	$frm_empresa_site = System::_POST("FrmEmpresaSite");
	$frm_empresa_telefone1 = System::_POST("FrmEmpresaTelefone1");
	$frm_empresa_telefone2 = System::_POST("FrmEmpresaTelefone2");
	$frm_empresa_telefone3 = System::_POST("FrmEmpresaTelefone3");
	$frm_empresa_endereco = System::_POST("FrmEmpresaEndereco");
	$frm_empresa_cep = System::_POST("FrmEmpresaCep");
	$frm_empresa_imagem_file = $_FILES["FrmEmpresaImagemFile"];
	$frm_contratacao_id = System::_POST("FrmContratacaoId");
	$frm_contratacao_data_inicial = System::_POST("FrmContratacaoDataInicial");
	$frm_contratacao_data_final = System::_POST("FrmContratacaoDataFinal");
	$frm_newsletter = System::_POST("FrmNewsletter");
	$frm_datahora_cadastro = System::_POST("FrmDatahoraCadastro");
	$frm_datahora_edicao = System::_POST("FrmDatahoraEdicao");
	$frm_datahora_login = System::_POST("FrmDatahoraLogin");
	$frm_status = System::_POST("FrmStatus");
	$frm_bt = System::_POST("btSubmit");

	$label_alerta_erro = null;
	$label_alerta_concluido = null;
	$label_alerta_status = null;

	$VObjAssociadoPerfil = AssociadoPerfilManage::consultarAssociadoPerfil(1, "");
	$VObjAssociadoPlano = AssociadoPlanoManage::consultarAssociadoPlano(1, "");

	if ( ! Validacao::isVazio($frm_bt) ){

		if( Validacao::isVazio($frm_id_associado_perfil) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Associado Perfil#";
		}
		if( Validacao::isVazio($frm_id_localidade) ){
			$label_alerta_erro .="Preencha/Selecione o(a) #";
		}
		if( Validacao::isVazio($frm_id_associado_plano) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Associado Plano#";
		}
		if( Validacao::isVazio($frm_apelido) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Apelido#";
		}
		if( Validacao::isVazio($frm_nome) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Nome#";
		}
		if( Validacao::isVazio($frm_cpf) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Cpf#";
		}
		if( Validacao::isVazio($frm_sexo) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Sexo#";
		}
		if( Validacao::isVazio($frm_data_nascimento) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Data Nascimento#";
		}
		if( Validacao::isVazio($frm_email) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  E-mail#";
		}
		if( Validacao::isVazio($frm_senha) ){
			$label_alerta_erro .="Preencha/Selecione o(a)  Senha#";
		}
		$frm_imagem = "";
		if( ! Validacao::isVazio($frm_imagem_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_imagem_file, "../images/associado/$prename", 2)){
				$frm_imagem = $prename.$upload->getName();
				/*$i = new Imagem();
				$i->carregarImagem("../images/associado/$frm_imagem");
				$frm_imagem = "alt_$frm_imagem";
				$i->salvarImagem(100, 100, "../images/associado/$frm_imagem");*/
			}else{
				$label_alerta_erro .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.#";
			}
		}
		$frm_empresa_imagem = "";
		if( ! Validacao::isVazio($frm_empresa_imagem_file["name"]) ){
			$upload = new Upload();
			$prename = date("YmdHis")."_";
			if($upload->SendFile($frm_empresa_imagem_file, "../images/associado/$prename", 2)){
				$frm_empresa_imagem = $prename.$upload->getName();
				/*$i = new Imagem();
				$i->carregarImagem("../images/associado/$frm_empresa_imagem");
				$frm_empresa_imagem = "alt_$frm_empresa_imagem";
				$i->salvarImagem(100, 100, "../images/associado/$frm_empresa_imagem");*/
			}else{
				$label_alerta_erro .="Problema ao enviar imagem. Verifique seu tipo ou tamanho.#";
			}
		}

		if( Validacao::isVazio($label_alerta_erro) ){

			$obj = new Associado();
			$obj->setIdAssociadoPerfil( $frm_id_associado_perfil ); 
			$obj->setIdLocalidade( $frm_id_localidade ); 
			$obj->setIdAssociadoPlano( $frm_id_associado_plano ); 
			$obj->setApelido( $frm_apelido ); 
			$obj->setNome( $frm_nome ); 
			$obj->setCpf( $frm_cpf ); 
			$obj->setSexo( $frm_sexo ); 
			$obj->setDataNascimento( System::FormatarData($frm_data_nascimento, "Y-m-d") );
			$obj->setEstadoCivil( $frm_estado_civil ); 
			$obj->setRg( $frm_rg ); 
			$obj->setFormacao( $frm_formacao ); 
			$obj->setDescricao( $frm_descricao ); 
			$obj->setEndereco( $frm_endereco ); 
			$obj->setNumero( $frm_numero ); 
			$obj->setComplemento( $frm_complemento ); 
			$obj->setBairro( $frm_bairro ); 
			$obj->setCep( $frm_cep ); 
			$obj->setTelefoneFixo( $frm_telefone_fixo ); 
			$obj->setTelefoneCelular( $frm_telefone_celular ); 
			$obj->setTelefoneComercial( $frm_telefone_comercial ); 
			$obj->setRedes( $frm_redes ); 
			$obj->setImagem( $frm_imagem ); 
			$obj->setEmail( $frm_email ); 
			$obj->setSenha( $frm_senha ); 
			$obj->setEmpresaNome( $frm_empresa_nome ); 
			$obj->setEmpresaRamo( $frm_empresa_ramo ); 
			$obj->setEmpresaCnpj( $frm_empresa_cnpj ); 
			$obj->setEmpresaNatureza( $frm_empresa_natureza ); 
			$obj->setEmpresaCargo( $frm_empresa_cargo ); 
			$obj->setEmpresaEmail( $frm_empresa_email ); 
			$obj->setEmpresaSite( $frm_empresa_site ); 
			$obj->setEmpresaTelefone1( $frm_empresa_telefone1 ); 
			$obj->setEmpresaTelefone2( $frm_empresa_telefone2 ); 
			$obj->setEmpresaTelefone3( $frm_empresa_telefone3 ); 
			$obj->setEmpresaEndereco( $frm_empresa_endereco ); 
			$obj->setEmpresaCep( $frm_empresa_cep ); 
			$obj->setEmpresaImagem( $frm_empresa_imagem ); 
			$obj->setContratacaoId( $frm_contratacao_id ); 
			$obj->setContratacaoDataInicial( System::FormatarData($frm_contratacao_data_inicial, "Y-m-d") );
			$obj->setContratacaoDataFinal( System::FormatarData($frm_contratacao_data_final, "Y-m-d") );
			$obj->setNewsletter( $frm_newsletter ); 
			$obj->setDatahoraCadastro( System::FormatarData($frm_datahora_cadastro, "Y-m-d H:i:s") );
			$obj->setDatahoraEdicao( System::FormatarData($frm_datahora_edicao, "Y-m-d H:i:s") );
			$obj->setDatahoraLogin( System::FormatarData($frm_datahora_login, "Y-m-d H:i:s") );
			$obj->setStatus( $frm_status ); 

			if($obj->inserirAssociado()){
				System::Redirect($link_list);
			}else{
				$label_alerta_erro .="Cadastro não Efetuado";
			}
		}
	}
?>