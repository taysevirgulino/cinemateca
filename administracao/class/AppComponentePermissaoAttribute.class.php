<?
	class AppComponentePermissaoAttribute{
		public static function IdAppPermissao($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_app_permissao" : "bigint(20)");
		}
		public static function IdAppUsuarioGrupo($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_app_usuario_grupo" : "bigint(20)");
		}
		public static function IdAppComponente($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_app_componente" : "bigint(20)");
		}
		public static function Permissao($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "permissao" : "bigint(20)");
		}
		public static function _Table(){
			return "tb_app_componente_permissao";
		}
		public static function _Default($FieldNameOrType = 1){
			return AppComponentePermissaoAttribute::Permissao($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AppComponentePermissaoAttribute::IdAppPermissao() : { return true; } break;
				case AppComponentePermissaoAttribute::IdAppUsuarioGrupo() : { return true; } break;
				case AppComponentePermissaoAttribute::IdAppComponente() : { return true; } break;
				case AppComponentePermissaoAttribute::Permissao() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_app_permissao";
			$Attributes[0]["text"] = "Codigo App Permissao";
			$Attributes[1]["value"] = "id_app_usuario_grupo";
			$Attributes[1]["text"] = "Codigo App Usuario Grupo";
			$Attributes[2]["value"] = "id_app_componente";
			$Attributes[2]["text"] = "Codigo App Componente";
			$Attributes[3]["value"] = "permissao";
			$Attributes[3]["text"] = "Permissao";
			return $Attributes;
		}
	}
?>