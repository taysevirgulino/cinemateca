<?
	class UsuarioPerfilAttribute{
		public static function IdUsuarioPerfil(){
			return "id_usuario_perfil";
		}
		public static function Identificador(){
			return "identificador";
		}
		public static function Titulo(){
			return "titulo";
		}
		public static function Nivel(){
			return "nivel";
		}
		public static function _Table(){
			return "tb_usuario_perfil";
		}
		public static function _Default(){
			return UsuarioPerfilAttribute::Titulo();
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case UsuarioPerfilAttribute::IdUsuarioPerfil() : { return true; } break;
				case UsuarioPerfilAttribute::Identificador() : { return true; } break;
				case UsuarioPerfilAttribute::Titulo() : { return true; } break;
				case UsuarioPerfilAttribute::Nivel() : { return true; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			return array(
				array("value"=>"id_usuario_perfil", "type"=>"bigint(20)", "text"=>"Código Usuário Perfil"),
				array("value"=>"identificador", "type"=>"varchar(32)", "text"=>"Identificador"),
				array("value"=>"titulo", "type"=>"varchar(255)", "text"=>"Título"),
				array("value"=>"nivel", "type"=>"int(11)", "text"=>"Nivel"),
			);
		}
		public static function _GetKeys(){
			return array("id_usuario_perfil","identificador","titulo","nivel");
		}
	}
?>