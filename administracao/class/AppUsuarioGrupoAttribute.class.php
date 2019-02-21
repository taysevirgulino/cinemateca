<?
	class AppUsuarioGrupoAttribute{
		public static function IdAppUsuarioGrupo($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_app_usuario_grupo" : "bigint(20)");
		}
		public static function Identificador($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "identificador" : "varchar(32)");
		}
		public static function Nome($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "nome" : "varchar(100)");
		}
		public static function Sigla($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "sigla" : "varchar(5)");
		}
		public static function Tipo($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "tipo" : "bigint(20)");
		}
		public static function Nivel($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "nivel" : "int(11)");
		}
		public static function _Table(){
			return "tb_app_usuario_grupo";
		}
		public static function _Default($FieldNameOrType = 1){
			return AppUsuarioGrupoAttribute::Nome($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AppUsuarioGrupoAttribute::IdAppUsuarioGrupo() : { return true; } break;
				case AppUsuarioGrupoAttribute::Identificador() : { return true; } break;
				case AppUsuarioGrupoAttribute::Nome() : { return true; } break;
				case AppUsuarioGrupoAttribute::Sigla() : { return true; } break;
				case AppUsuarioGrupoAttribute::Tipo() : { return true; } break;
				case AppUsuarioGrupoAttribute::Nivel() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_app_usuario_grupo";
			$Attributes[0]["text"] = "Código App Usuário Grupo";
			$Attributes[1]["value"] = "identificador";
			$Attributes[1]["text"] = "Identificador";
			$Attributes[2]["value"] = "nome";
			$Attributes[2]["text"] = "Nome";
			$Attributes[3]["value"] = "sigla";
			$Attributes[3]["text"] = "Sigla";
			$Attributes[4]["value"] = "tipo";
			$Attributes[4]["text"] = "Tipo";
			$Attributes[5]["value"] = "nivel";
			$Attributes[5]["text"] = "Nivel";
			return $Attributes;
		}
	}
?>