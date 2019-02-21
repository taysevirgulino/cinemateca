<?
	class EmktDisparoAttribute{
		public static function IdEmktDisparo($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_emkt_disparo" : "bigint(20)");
		}
		public static function Identificador($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "identificador" : "varchar(32)");
		}
		public static function IdEmkt($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_emkt" : "bigint(20)");
		}
		public static function Agendamento($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "agendamento" : "datetime");
		}
		public static function Resultado($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "resultado" : "text");
		}
		public static function Status($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "status" : "int(11)");
		}
		public static function _Table(){
			return "tb_emkt_disparo";
		}
		public static function _Default($FieldNameOrType = 1){
			return EmktDisparoAttribute::Agendamento($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case EmktDisparoAttribute::IdEmktDisparo() : { return true; } break;
				case EmktDisparoAttribute::Identificador() : { return true; } break;
				case EmktDisparoAttribute::IdEmkt() : { return true; } break;
				case EmktDisparoAttribute::Agendamento() : { return true; } break;
				case EmktDisparoAttribute::Resultado() : { return true; } break;
				case EmktDisparoAttribute::Status() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_emkt_disparo";
			$Attributes[0]["text"] = "Código Emkt Disparo";
			$Attributes[1]["value"] = "identificador";
			$Attributes[1]["text"] = "Identificador";
			$Attributes[2]["value"] = "id_emkt";
			$Attributes[2]["text"] = "Código Emkt";
			$Attributes[3]["value"] = "agendamento";
			$Attributes[3]["text"] = "Agendamento";
			$Attributes[4]["value"] = "resultado";
			$Attributes[4]["text"] = "Resultado";
			$Attributes[5]["value"] = "status";
			$Attributes[5]["text"] = "Status";
			return $Attributes;
		}
	}
?>