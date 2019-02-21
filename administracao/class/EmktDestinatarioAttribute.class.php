<?
	class EmktDestinatarioAttribute{
		public static function IdEmktDestinatario($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_emkt_destinatario" : "bigint(20)");
		}
		public static function Identificador($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "identificador" : "varchar(32)");
		}
		public static function IdEmktDisparo($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_emkt_disparo" : "bigint(20)");
		}
		public static function IdEmktLista($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_emkt_lista" : "bigint(20)");
		}
		public static function _Table(){
			return "tb_emkt_destinatario";
		}
		public static function _Default($FieldNameOrType = 1){
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case EmktDestinatarioAttribute::IdEmktDestinatario() : { return true; } break;
				case EmktDestinatarioAttribute::Identificador() : { return true; } break;
				case EmktDestinatarioAttribute::IdEmktDisparo() : { return true; } break;
				case EmktDestinatarioAttribute::IdEmktLista() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_emkt_destinatario";
			$Attributes[0]["text"] = "Código Emkt Destinatário";
			$Attributes[1]["value"] = "identificador";
			$Attributes[1]["text"] = "Identificador";
			$Attributes[2]["value"] = "id_emkt_disparo";
			$Attributes[2]["text"] = "Código Emkt Disparo";
			$Attributes[3]["value"] = "id_emkt_lista";
			$Attributes[3]["text"] = "Código Emkt Lista";
			return $Attributes;
		}
	}
?>