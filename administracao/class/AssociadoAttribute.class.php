<?
	class AssociadoAttribute{
		public static function IdAssociado(){
			return "id_associado";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdAssociadoPerfil(){
			return "id_associado_perfil";
		}
		public static function IdLocalidade(){
			return "id_localidade";
		}
		public static function IdAssociadoPlano(){
			return "id_associado_plano";
		}
		public static function Apelido(){
			return "apelido";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Cpf(){
			return "cpf";
		}
		public static function Sexo(){
			return "sexo";
		}
		public static function DataNascimento(){
			return "data_nascimento";
		}
		public static function EstadoCivil(){
			return "estado_civil";
		}
		public static function Rg(){
			return "rg";
		}
		public static function Formacao(){
			return "formacao";
		}
		public static function Descricao(){
			return "descricao";
		}
		public static function Endereco(){
			return "endereco";
		}
		public static function Numero(){
			return "numero";
		}
		public static function Complemento(){
			return "complemento";
		}
		public static function Bairro(){
			return "bairro";
		}
		public static function Cep(){
			return "cep";
		}
		public static function TelefoneFixo(){
			return "telefone_fixo";
		}
		public static function TelefoneCelular(){
			return "telefone_celular";
		}
		public static function TelefoneComercial(){
			return "telefone_comercial";
		}
		public static function Redes(){
			return "redes";
		}
		public static function Imagem(){
			return "imagem";
		}
		public static function Email(){
			return "email";
		}
		public static function Senha(){
			return "senha";
		}
		public static function EmpresaNome(){
			return "empresa_nome";
		}
		public static function EmpresaRamo(){
			return "empresa_ramo";
		}
		public static function EmpresaCnpj(){
			return "empresa_cnpj";
		}
		public static function EmpresaNatureza(){
			return "empresa_natureza";
		}
		public static function EmpresaCargo(){
			return "empresa_cargo";
		}
		public static function EmpresaEmail(){
			return "empresa_email";
		}
		public static function EmpresaSite(){
			return "empresa_site";
		}
		public static function EmpresaTelefone1(){
			return "empresa_telefone1";
		}
		public static function EmpresaTelefone2(){
			return "empresa_telefone2";
		}
		public static function EmpresaTelefone3(){
			return "empresa_telefone3";
		}
		public static function EmpresaEndereco(){
			return "empresa_endereco";
		}
		public static function EmpresaCep(){
			return "empresa_cep";
		}
		public static function EmpresaImagem(){
			return "empresa_imagem";
		}
		public static function ContratacaoId(){
			return "contratacao_id";
		}
		public static function ContratacaoDataInicial(){
			return "contratacao_data_inicial";
		}
		public static function ContratacaoDataFinal(){
			return "contratacao_data_final";
		}
		public static function Newsletter(){
			return "newsletter";
		}
		public static function DatahoraCadastro(){
			return "datahora_cadastro";
		}
		public static function DatahoraEdicao(){
			return "datahora_edicao";
		}
		public static function DatahoraLogin(){
			return "datahora_login";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_associado";
		}
		public static function _Default(){
			return AssociadoAttribute::Apelido();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AssociadoAttribute::IdAssociado() : { return true; } break;
				case AssociadoAttribute::Identificador() : { return true; } break;
				case AssociadoAttribute::IdAssociadoPerfil() : { return true; } break;
				case AssociadoAttribute::IdLocalidade() : { return true; } break;
				case AssociadoAttribute::IdAssociadoPlano() : { return true; } break;
				case AssociadoAttribute::Apelido() : { return true; } break;
				case AssociadoAttribute::Nome() : { return true; } break;
				case AssociadoAttribute::Cpf() : { return true; } break;
				case AssociadoAttribute::Sexo() : { return true; } break;
				case AssociadoAttribute::DataNascimento() : { return true; } break;
				case AssociadoAttribute::EstadoCivil() : { return true; } break;
				case AssociadoAttribute::Rg() : { return true; } break;
				case AssociadoAttribute::Formacao() : { return true; } break;
				case AssociadoAttribute::Descricao() : { return true; } break;
				case AssociadoAttribute::Endereco() : { return true; } break;
				case AssociadoAttribute::Numero() : { return true; } break;
				case AssociadoAttribute::Complemento() : { return true; } break;
				case AssociadoAttribute::Bairro() : { return true; } break;
				case AssociadoAttribute::Cep() : { return true; } break;
				case AssociadoAttribute::TelefoneFixo() : { return true; } break;
				case AssociadoAttribute::TelefoneCelular() : { return true; } break;
				case AssociadoAttribute::TelefoneComercial() : { return true; } break;
				case AssociadoAttribute::Redes() : { return true; } break;
				case AssociadoAttribute::Imagem() : { return true; } break;
				case AssociadoAttribute::Email() : { return true; } break;
				case AssociadoAttribute::Senha() : { return true; } break;
				case AssociadoAttribute::EmpresaNome() : { return true; } break;
				case AssociadoAttribute::EmpresaRamo() : { return true; } break;
				case AssociadoAttribute::EmpresaCnpj() : { return true; } break;
				case AssociadoAttribute::EmpresaNatureza() : { return true; } break;
				case AssociadoAttribute::EmpresaCargo() : { return true; } break;
				case AssociadoAttribute::EmpresaEmail() : { return true; } break;
				case AssociadoAttribute::EmpresaSite() : { return true; } break;
				case AssociadoAttribute::EmpresaTelefone1() : { return true; } break;
				case AssociadoAttribute::EmpresaTelefone2() : { return true; } break;
				case AssociadoAttribute::EmpresaTelefone3() : { return true; } break;
				case AssociadoAttribute::EmpresaEndereco() : { return true; } break;
				case AssociadoAttribute::EmpresaCep() : { return true; } break;
				case AssociadoAttribute::EmpresaImagem() : { return true; } break;
				case AssociadoAttribute::ContratacaoId() : { return true; } break;
				case AssociadoAttribute::ContratacaoDataInicial() : { return true; } break;
				case AssociadoAttribute::ContratacaoDataFinal() : { return true; } break;
				case AssociadoAttribute::Newsletter() : { return true; } break;
				case AssociadoAttribute::DatahoraCadastro() : { return true; } break;
				case AssociadoAttribute::DatahoraEdicao() : { return true; } break;
				case AssociadoAttribute::DatahoraLogin() : { return true; } break;
				case AssociadoAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_associado", "type"=>"bigint(20)", "text"=>"Código Associado"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_associado_perfil", "type"=>"bigint(20)", "text"=>"Código Associado Perfil"),
				array("value"=>"id_localidade", "type"=>"bigint(20)", "text"=>"Código Localidade"),
				array("value"=>"id_associado_plano", "type"=>"bigint(20)", "text"=>"Código Associado Plano"),
				array("value"=>"apelido", "type"=>"varchar(255)", "text"=>"Apelido"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"cpf", "type"=>"varchar(20)", "text"=>"Cpf"),
				array("value"=>"sexo", "type"=>"varchar(2)", "text"=>"Sexo"),
				array("value"=>"data_nascimento", "type"=>"date", "text"=>"Data Nascimento"),
				array("value"=>"estado_civil", "type"=>"int(11)", "text"=>"Estado Civil"),
				array("value"=>"rg", "type"=>"varchar(50)", "text"=>"Rg"),
				array("value"=>"formacao", "type"=>"varchar(255)", "text"=>"Formação"),
				array("value"=>"descricao", "type"=>"text", "text"=>"Descrição"),
				array("value"=>"endereco", "type"=>"varchar(255)", "text"=>"Endereço"),
				array("value"=>"numero", "type"=>"varchar(20)", "text"=>"Número"),
				array("value"=>"complemento", "type"=>"varchar(255)", "text"=>"Complemento"),
				array("value"=>"bairro", "type"=>"varchar(255)", "text"=>"Bairro"),
				array("value"=>"cep", "type"=>"varchar(20)", "text"=>"Cep"),
				array("value"=>"telefone_fixo", "type"=>"varchar(20)", "text"=>"Telefone Fixo"),
				array("value"=>"telefone_celular", "type"=>"varchar(20)", "text"=>"Telefone Celular"),
				array("value"=>"telefone_comercial", "type"=>"varchar(20)", "text"=>"Telefone Comercial"),
				array("value"=>"redes", "type"=>"varchar(255)", "text"=>"Redes"),
				array("value"=>"imagem", "type"=>"varchar(255)", "text"=>"Imagem"),
				array("value"=>"email", "type"=>"varchar(255)", "text"=>"E-mail"),
				array("value"=>"senha", "type"=>"varchar(255)", "text"=>"Senha"),
				array("value"=>"empresa_nome", "type"=>"varchar(255)", "text"=>"Empresa Nome"),
				array("value"=>"empresa_ramo", "type"=>"varchar(255)", "text"=>"Empresa Ramo"),
				array("value"=>"empresa_cnpj", "type"=>"varchar(20)", "text"=>"Empresa Cnpj"),
				array("value"=>"empresa_natureza", "type"=>"int(11)", "text"=>"Empresa Natureza"),
				array("value"=>"empresa_cargo", "type"=>"varchar(255)", "text"=>"Empresa Cargo"),
				array("value"=>"empresa_email", "type"=>"varchar(255)", "text"=>"Empresa E-mail"),
				array("value"=>"empresa_site", "type"=>"varchar(255)", "text"=>"Empresa Site"),
				array("value"=>"empresa_telefone1", "type"=>"varchar(20)", "text"=>"Empresa Telefone1"),
				array("value"=>"empresa_telefone2", "type"=>"varchar(20)", "text"=>"Empresa Telefone2"),
				array("value"=>"empresa_telefone3", "type"=>"varchar(20)", "text"=>"Empresa Telefone3"),
				array("value"=>"empresa_endereco", "type"=>"varchar(255)", "text"=>"Empresa Endereço"),
				array("value"=>"empresa_cep", "type"=>"varchar(20)", "text"=>"Empresa Cep"),
				array("value"=>"empresa_imagem", "type"=>"varchar(255)", "text"=>"Empresa Imagem"),
				array("value"=>"contratacao_id", "type"=>"bigint(20)", "text"=>"Contratação Id"),
				array("value"=>"contratacao_data_inicial", "type"=>"date", "text"=>"Contratação Data Inicial"),
				array("value"=>"contratacao_data_final", "type"=>"date", "text"=>"Contratação Data Final"),
				array("value"=>"newsletter", "type"=>"int(11)", "text"=>"Newsletter"),
				array("value"=>"datahora_cadastro", "type"=>"datetime", "text"=>"Data/Hora Cadastro"),
				array("value"=>"datahora_edicao", "type"=>"datetime", "text"=>"Data/Hora Edição"),
				array("value"=>"datahora_login", "type"=>"datetime", "text"=>"Data/Hora Login"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_associado","identificador","id_associado_perfil","id_localidade","id_associado_plano","apelido","nome","cpf","sexo","data_nascimento","estado_civil","rg","formacao","descricao","endereco","numero","complemento","bairro","cep","telefone_fixo","telefone_celular","telefone_comercial","redes","imagem","email","senha","empresa_nome","empresa_ramo","empresa_cnpj","empresa_natureza","empresa_cargo","empresa_email","empresa_site","empresa_telefone1","empresa_telefone2","empresa_telefone3","empresa_endereco","empresa_cep","empresa_imagem","contratacao_id","contratacao_data_inicial","contratacao_data_final","newsletter","datahora_cadastro","datahora_edicao","datahora_login","status");
		}
	}
?>