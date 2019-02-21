<?
	class AppUsuarioAttribute{
		public static function IdAppUsuario($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_app_usuario" : "bigint");
		}
		public static function Identificador($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "identificador" : "varchar");
		}
		public static function IdAppUsuarioGrupo($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_app_usuario_grupo" : "bigint");
		}
		public static function Nome($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "nome" : "varchar");
		}
		public static function Email($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "email" : "varchar");
		}
		public static function Login($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "login" : "varchar");
		}
		public static function Senha($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "senha" : "varchar");
		}
		public static function Status($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "status" : "bigint");
		}
		public static function _Table(){
			return "tb_app_usuario";
		}
		public static function _Default($FieldNameOrType = 1){
			return AppUsuarioAttribute::Nome($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AppUsuarioAttribute::IdAppUsuario() : { return true; } break;
				case AppUsuarioAttribute::Identificador() : { return true; } break;
				case AppUsuarioAttribute::IdAppUsuarioGrupo() : { return true; } break;
				case AppUsuarioAttribute::Nome() : { return true; } break;
				case AppUsuarioAttribute::Email() : { return true; } break;
				case AppUsuarioAttribute::Login() : { return true; } break;
				case AppUsuarioAttribute::Senha() : { return true; } break;
				case AppUsuarioAttribute::Status() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_app_usuario";
			$Attributes[0]["text"] = "Codigo App Usuario";
			$Attributes[2]["value"] = "id_app_usuario_grupo";
			$Attributes[2]["text"] = "Codigo App Usuario Grupo";
			$Attributes[3]["value"] = "nome";
			$Attributes[3]["text"] = "Nome";
			$Attributes[4]["value"] = "email";
			$Attributes[4]["text"] = "Email";
			$Attributes[5]["value"] = "login";
			$Attributes[5]["text"] = "Login";
			$Attributes[6]["value"] = "senha";
			$Attributes[6]["text"] = "Senha";
			$Attributes[7]["value"] = "status";
			$Attributes[7]["text"] = "Status";
			return $Attributes;
		}
	}
?>