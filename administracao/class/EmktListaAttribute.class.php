<?
	class EmktListaAttribute{
		public static function IdEmktLista($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_emkt_lista" : "bigint(20)");
		}
		public static function Identificador($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "identificador" : "varchar(32)");
		}
		public static function Nome($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "nome" : "varchar(255)");
		}
		public static function _Table(){
			return "tb_emkt_lista";
		}
		public static function _Default($FieldNameOrType = 1){
			return EmktListaAttribute::Nome($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case EmktListaAttribute::IdEmktLista() : { return true; } break;
				case EmktListaAttribute::Identificador() : { return true; } break;
				case EmktListaAttribute::Nome() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_emkt_lista";
			$Attributes[0]["text"] = "Código Emkt Lista";
			$Attributes[1]["value"] = "identificador";
			$Attributes[1]["text"] = "Identificador";
			$Attributes[2]["value"] = "nome";
			$Attributes[2]["text"] = "Nome";
			return $Attributes;
		}
	}
?>