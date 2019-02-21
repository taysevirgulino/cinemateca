<?
	class EmktContatoListaAttribute{
		public static function IdEmktContatoLista($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_emkt_contato_lista" : "bigint(20)");
		}
		public static function Identificador($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "identificador" : "varchar(32)");
		}
		public static function IdEmktContato($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_emkt_contato" : "bigint(20)");
		}
		public static function IdEmktLista($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_emkt_lista" : "bigint(20)");
		}
		public static function _Table(){
			return "tb_emkt_contato_lista";
		}
		public static function _Default($FieldNameOrType = 1){
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case EmktContatoListaAttribute::IdEmktContatoLista() : { return true; } break;
				case EmktContatoListaAttribute::Identificador() : { return true; } break;
				case EmktContatoListaAttribute::IdEmktContato() : { return true; } break;
				case EmktContatoListaAttribute::IdEmktLista() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_emkt_contato_lista";
			$Attributes[0]["text"] = "Código Emkt Contato Lista";
			$Attributes[1]["value"] = "identificador";
			$Attributes[1]["text"] = "Identificador";
			$Attributes[2]["value"] = "id_emkt_contato";
			$Attributes[2]["text"] = "Código Emkt Contato";
			$Attributes[3]["value"] = "id_emkt_lista";
			$Attributes[3]["text"] = "Código Emkt Lista";
			return $Attributes;
		}
	}
?>