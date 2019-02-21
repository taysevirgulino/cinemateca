<?
	class AppComponenteMenuAttribute{
		public static function IdAppComponenteMenu($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_app_componente_menu" : "bigint(20)");
		}
		public static function IdAppComponenteMenuPai($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_app_componente_menu_pai" : "bigint(20)");
		}
		public static function Url($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "url" : "varchar(100)");
		}
		public static function Descricao($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "descricao" : "varchar(100)");
		}
		public static function Imagem($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "imagem" : "varchar(100)");
		}
		public static function Prioridade($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "prioridade" : "bigint(20)");
		}
		public static function Tipo($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "tipo" : "bigint(20)");
		}
		public static function Status($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "status" : "bigint(20)");
		}
		public static function _Table(){
			return "tb_app_componente_menu";
		}
		public static function _Default($FieldNameOrType = 1){
			return AppComponenteMenuAttribute::Url($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AppComponenteMenuAttribute::IdAppComponenteMenu() : { return true; } break;
				case AppComponenteMenuAttribute::IdAppComponenteMenuPai() : { return true; } break;
				case AppComponenteMenuAttribute::Url() : { return true; } break;
				case AppComponenteMenuAttribute::Descricao() : { return true; } break;
				case AppComponenteMenuAttribute::Imagem() : { return true; } break;
				case AppComponenteMenuAttribute::Prioridade() : { return true; } break;
				case AppComponenteMenuAttribute::Tipo() : { return true; } break;
				case AppComponenteMenuAttribute::Status() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_app_componente_menu";
			$Attributes[0]["text"] = "Codigo App Componente Menu";
			$Attributes[1]["value"] = "id_app_componente_menu_pai";
			$Attributes[1]["text"] = "Codigo App Componente Menu Pai";
			$Attributes[2]["value"] = "url";
			$Attributes[2]["text"] = "Url";
			$Attributes[3]["value"] = "descricao";
			$Attributes[3]["text"] = "Descricao";
			$Attributes[4]["value"] = "imagem";
			$Attributes[4]["text"] = "Imagem";
			$Attributes[5]["value"] = "prioridade";
			$Attributes[5]["text"] = "Prioridade";
			$Attributes[6]["value"] = "tipo";
			$Attributes[6]["text"] = "Tipo";
			$Attributes[7]["value"] = "status";
			$Attributes[7]["text"] = "Status";
			return $Attributes;
		}
	}
?>