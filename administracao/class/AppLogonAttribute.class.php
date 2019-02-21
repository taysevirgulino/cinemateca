<?
	class AppLogonAttribute{
		public static function IdAppLogon($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_app_logon" : "bigint(20)");
		}
		public static function IdAppUsuario($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_app_usuario" : "bigint(20)");
		}
		public static function DatahoraLogin($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "datahora_login" : "datetime");
		}
		public static function DatahoraLogout($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "datahora_logout" : "datetime");
		}
		public static function Ip($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "ip" : "varchar(20)");
		}
		public static function _Table(){
			return "tb_app_logon";
		}
		public static function _Default($FieldNameOrType = 1){
			return AppLogonAttribute::DatahoraLogin($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AppLogonAttribute::IdAppLogon() : { return true; } break;
				case AppLogonAttribute::IdAppUsuario() : { return true; } break;
				case AppLogonAttribute::DatahoraLogin() : { return true; } break;
				case AppLogonAttribute::DatahoraLogout() : { return true; } break;
				case AppLogonAttribute::Ip() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_app_logon";
			$Attributes[0]["text"] = "Codigo App Logon";
			$Attributes[1]["value"] = "id_app_usuario";
			$Attributes[1]["text"] = "Codigo App Usuario";
			$Attributes[2]["value"] = "datahora_login";
			$Attributes[2]["text"] = "Datahora Login";
			$Attributes[3]["value"] = "datahora_logout";
			$Attributes[3]["text"] = "Datahora Logout";
			$Attributes[4]["value"] = "ip";
			$Attributes[4]["text"] = "Ip";
			return $Attributes;
		}
	}
?>