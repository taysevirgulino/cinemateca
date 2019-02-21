<?
	class UsuarioAttribute{
		public static function IdUsuario(){
			return "id_usuario";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function IdUsuarioPerfil(){
			return "id_usuario_perfil";
		}
		public static function Nome(){
			return "nome";
		}
		public static function Email(){
			return "email";
		}
		public static function Imagem(){
			return "imagem";
		}
		public static function Login(){
			return "login";
		}
		public static function Senha(){
			return "senha";
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
			return "tb_usuario";
		}
		public static function _Default(){
			return UsuarioAttribute::Nome();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case UsuarioAttribute::IdUsuario() : { return true; } break;
				case UsuarioAttribute::Identificador() : { return true; } break;
				case UsuarioAttribute::IdUsuarioPerfil() : { return true; } break;
				case UsuarioAttribute::Nome() : { return true; } break;
				case UsuarioAttribute::Email() : { return true; } break;
				case UsuarioAttribute::Imagem() : { return true; } break;
				case UsuarioAttribute::Login() : { return true; } break;
				case UsuarioAttribute::Senha() : { return true; } break;
				case UsuarioAttribute::DatahoraCadastro() : { return true; } break;
				case UsuarioAttribute::DatahoraEdicao() : { return true; } break;
				case UsuarioAttribute::DatahoraLogin() : { return true; } break;
				case UsuarioAttribute::Status() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_usuario", "type"=>"bigint(20)", "text"=>"Código Usuário"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"id_usuario_perfil", "type"=>"bigint(20)", "text"=>"Código Usuário Perfil"),
				array("value"=>"nome", "type"=>"varchar(255)", "text"=>"Nome"),
				array("value"=>"email", "type"=>"varchar(255)", "text"=>"E-mail"),
				array("value"=>"imagem", "type"=>"varchar(255)", "text"=>"Imagem"),
				array("value"=>"login", "type"=>"varchar(255)", "text"=>"Login"),
				array("value"=>"senha", "type"=>"varchar(255)", "text"=>"Senha"),
				array("value"=>"datahora_cadastro", "type"=>"datetime", "text"=>"Data/Hora Cadastro"),
				array("value"=>"datahora_edicao", "type"=>"datetime", "text"=>"Data/Hora Edição"),
				array("value"=>"datahora_login", "type"=>"datetime", "text"=>"Data/Hora Login"),
				array("value"=>"status", "type"=>"int(11)", "text"=>"Status"),
			);
		}
		public static function _GetKeys(){
			return array("id_usuario","identificador","id_usuario_perfil","nome","email","imagem","login","senha","datahora_cadastro","datahora_edicao","datahora_login","status");
		}
	}
?>