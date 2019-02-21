<?
	class EmktContatoAttribute{
		public static function IdEmktContato($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_emkt_contato" : "bigint(20)");
		}
		public static function Identificador($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "identificador" : "varchar(32)");
		}
		public static function Nome($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "nome" : "varchar(255)");
		}
		public static function Email($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "email" : "varchar(255)");
		}
		public static function Status($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "status" : "int(11)");
		}
		public static function _Table(){
			return "tb_emkt_contato";
		}
		public static function _Default($FieldNameOrType = 1){
			return EmktContatoAttribute::Nome($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case EmktContatoAttribute::IdEmktContato() : { return true; } break;
				case EmktContatoAttribute::Identificador() : { return true; } break;
				case EmktContatoAttribute::Nome() : { return true; } break;
				case EmktContatoAttribute::Email() : { return true; } break;
				case EmktContatoAttribute::Status() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_emkt_contato";
			$Attributes[0]["text"] = "Código Emkt Contato";
			$Attributes[1]["value"] = "identificador";
			$Attributes[1]["text"] = "Identificador";
			$Attributes[2]["value"] = "nome";
			$Attributes[2]["text"] = "Nome";
			$Attributes[3]["value"] = "email";
			$Attributes[3]["text"] = "E-mail";
			$Attributes[4]["value"] = "status";
			$Attributes[4]["text"] = "Status";
			return $Attributes;
		}
	}
?>