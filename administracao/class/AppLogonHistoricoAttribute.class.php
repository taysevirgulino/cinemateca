<?
	class AppLogonHistoricoAttribute{
		public static function IdAppLogonHistorico($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_app_logon_historico" : "bigint(20)");
		}
		public static function Identificador($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "identificador" : "varchar(32)");
		}
		public static function IdAppLogon($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_app_logon" : "bigint(20)");
		}
		public static function IdeObjeto($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "ide_objeto" : "varchar(32)");
		}
		public static function Objeto($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "objeto" : "varchar(100)");
		}
		public static function Acao($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "acao" : "varchar(100)");
		}
		public static function Ip($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "ip" : "varchar(15)");
		}
		public static function Sessao($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "sessao" : "varchar(32)");
		}
		public static function Datahora($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "datahora" : "datetime");
		}
		public static function _Table(){
			return "tb_app_logon_historico";
		}
		public static function _Default($FieldNameOrType = 1){
			return AppLogonHistoricoAttribute::IdeObjeto($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AppLogonHistoricoAttribute::IdAppLogonHistorico() : { return true; } break;
				case AppLogonHistoricoAttribute::Identificador() : { return true; } break;
				case AppLogonHistoricoAttribute::IdAppLogon() : { return true; } break;
				case AppLogonHistoricoAttribute::IdeObjeto() : { return true; } break;
				case AppLogonHistoricoAttribute::Objeto() : { return true; } break;
				case AppLogonHistoricoAttribute::Acao() : { return true; } break;
				case AppLogonHistoricoAttribute::Ip() : { return true; } break;
				case AppLogonHistoricoAttribute::Sessao() : { return true; } break;
				case AppLogonHistoricoAttribute::Datahora() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_app_logon_historico";
			$Attributes[0]["text"] = "Cуdigo App Logon Histуrico";
			$Attributes[1]["value"] = "identificador";
			$Attributes[1]["text"] = "Identificador";
			$Attributes[2]["value"] = "id_app_logon";
			$Attributes[2]["text"] = "Cуdigo App Logon";
			$Attributes[3]["value"] = "ide_objeto";
			$Attributes[3]["text"] = "Ide Objeto";
			$Attributes[4]["value"] = "objeto";
			$Attributes[4]["text"] = "Objeto";
			$Attributes[5]["value"] = "acao";
			$Attributes[5]["text"] = "Aзгo";
			$Attributes[6]["value"] = "ip";
			$Attributes[6]["text"] = "Ip";
			$Attributes[7]["value"] = "sessao";
			$Attributes[7]["text"] = "Sessгo";
			$Attributes[8]["value"] = "datahora";
			$Attributes[8]["text"] = "Data/Hora";
			return $Attributes;
		}
	}
?>