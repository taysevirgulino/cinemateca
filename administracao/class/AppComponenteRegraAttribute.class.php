<?
	class AppComponenteRegraAttribute{
		public static function IdAppComponenteRegra($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_app_componente_regra" : "bigint(20)");
		}
		public static function Identificador($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "identificador" : "varchar(50)");
		}
		public static function Descricao($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "descricao" : "varchar(50)");
		}
		public static function _Table(){
			return "tb_app_componente_regra";
		}
		public static function _Default($FieldNameOrType = 1){
			return AppComponenteRegraAttribute::Descricao($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AppComponenteRegraAttribute::IdAppComponenteRegra() : { return true; } break;
				case AppComponenteRegraAttribute::Identificador() : { return true; } break;
				case AppComponenteRegraAttribute::Descricao() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_app_componente_regra";
			$Attributes[0]["text"] = "Codigo App Componente Regra";
			$Attributes[2]["value"] = "descricao";
			$Attributes[2]["text"] = "Descricao";
			return $Attributes;
		}
	}
?>