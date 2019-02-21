<?
	class LojistaPessoaAttribute{
		public static function IdLojistaPessoa(){
			return "id_lojista_pessoa";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdLojista(){
			return "id_lojista";
		}
		public static function IdLojistaPessoaPerfil(){
			return "id_lojista_pessoa_perfil";
		}
		public static function IdUsuario(){
			return "id_usuario";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Email(){
			return "email";
		}
		public static function Email2(){
			return "email2";
		}
		public static function Telefone(){
			return "telefone";
		}
		public static function Telefone2(){
			return "telefone2";
		}
		public static function Endereco(){
			return "endereco";
		}
		public static function Cidade(){
			return "cidade";
		}
		public static function Estado(){
			return "estado";
		}
		public static function Cep(){
			return "cep";
		}
		public static function Observacoes(){
			return "observacoes";
		}
		public static function ReceberEmail(){
			return "receber_email";
		}
		public static function Status(){
			return "status";
		}
		public static function _Table(){
			return "tb_lojista_pessoa";
		}
		public static function _Default(){
			return LojistaPessoaAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case LojistaPessoaAttribute::IdLojistaPessoa() : { return true; } break;
				case LojistaPessoaAttribute::Identificador() : { return true; } break;
				case LojistaPessoaAttribute::IdLojista() : { return true; } break;
				case LojistaPessoaAttribute::IdLojistaPessoaPerfil() : { return true; } break;
				case LojistaPessoaAttribute::IdUsuario() : { return true; } break;
				case LojistaPessoaAttribute::Nome() : { return true; } break;
				case LojistaPessoaAttribute::Email() : { return true; } break;
				case LojistaPessoaAttribute::Email2() : { return true; } break;
				case LojistaPessoaAttribute::Telefone() : { return true; } break;
				case LojistaPessoaAttribute::Telefone2() : { return true; } break;
				case LojistaPessoaAttribute::Endereco() : { return true; } break;
				case LojistaPessoaAttribute::Cidade() : { return true; } break;
				case LojistaPessoaAttribute::Estado() : { return true; } break;
				case LojistaPessoaAttribute::Cep() : { return true; } break;
				case LojistaPessoaAttribute::Observacoes() : { return true; } break;
				case LojistaPessoaAttribute::ReceberEmail() : { return true; } break;
				case LojistaPessoaAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_lojista_pessoa", "type"=>"bigint(20)", "text"=>"Código Lojista Pessoa"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_lojista", "type"=>"bigint(20)", "text"=>"Código Lojista"),
				array("value"=>"id_lojista_pessoa_perfil", "type"=>"bigint(20)", "text"=>"Código Lojista Pessoa Perfil"),
				array("value"=>"id_usuario", "type"=>"bigint(20)", "text"=>"Código Usuário"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"email", "type"=>"varchar(255)", "text"=>"E-mail"),
				array("value"=>"email2", "type"=>"varchar(255)", "text"=>"E-mail2"),
				array("value"=>"telefone", "type"=>"varchar(20)", "text"=>"Telefone"),
				array("value"=>"telefone2", "type"=>"varchar(20)", "text"=>"Telefone2"),
				array("value"=>"endereco", "type"=>"varchar(255)", "text"=>"Endereço"),
				array("value"=>"cidade", "type"=>"varchar(255)", "text"=>"Cidade"),
				array("value"=>"estado", "type"=>"varchar(2)", "text"=>"Estado"),
				array("value"=>"cep", "type"=>"varchar(20)", "text"=>"Cep"),
				array("value"=>"observacoes", "type"=>"text", "text"=>"Observações"),
				array("value"=>"receber_email", "type"=>"int(11)", "text"=>"Receber E-mail"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_lojista_pessoa","identificador","id_lojista","id_lojista_pessoa_perfil","id_usuario","nome","email","email2","telefone","telefone2","endereco","cidade","estado","cep","observacoes","receber_email","status");
		}
	}
?>