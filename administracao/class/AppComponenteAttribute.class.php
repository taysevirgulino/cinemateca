<?
	class AppComponenteAttribute{
		public static function IdAppComponente($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_app_componente" : "bigint(20)");
		}
		public static function Data($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "data" : "datetime");
		}
		public static function _Table(){
			return "tb_app_componente";
		}
		public static function _Default($FieldNameOrType = 1){
			return AppComponenteAttribute::Data($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AppComponenteAttribute::IdAppComponente() : { return true; } break;
				case AppComponenteAttribute::Data() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_app_componente";
			$Attributes[0]["text"] = "Codigo App Componente";
			$Attributes[1]["value"] = "data";
			$Attributes[1]["text"] = "Data";
			return $Attributes;
		}
	}
?>