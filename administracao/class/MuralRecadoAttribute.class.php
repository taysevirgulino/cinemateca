<?
	class MuralRecadoAttribute{
		public static function IdMuralRecado($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_mural_recado" : "bigint(20)");
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
		public static function Texto($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "texto" : "text");
		}
		public static function Ip($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "ip" : "varchar(15)");
		}
		public static function Datahora($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "datahora" : "datetime");
		}
		public static function Status($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "status" : "int(11)");
		}
		public static function _Table(){
			return "tb_mural_recado";
		}
		public static function _Default($FieldNameOrType = 1){
			return MuralRecadoAttribute::Nome($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case MuralRecadoAttribute::IdMuralRecado() : { return true; } break;
				case MuralRecadoAttribute::Identificador() : { return true; } break;
				case MuralRecadoAttribute::Nome() : { return true; } break;
				case MuralRecadoAttribute::Email() : { return true; } break;
				case MuralRecadoAttribute::Texto() : { return true; } break;
				case MuralRecadoAttribute::Ip() : { return true; } break;
				case MuralRecadoAttribute::Datahora() : { return true; } break;
				case MuralRecadoAttribute::Status() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_mural_recado";
			$Attributes[0]["text"] = "Código Mural Recado";
			$Attributes[1]["value"] = "identificador";
			$Attributes[1]["text"] = "Identificador";
			$Attributes[2]["value"] = "nome";
			$Attributes[2]["text"] = "Nome";
			$Attributes[3]["value"] = "email";
			$Attributes[3]["text"] = "E-mail";
			$Attributes[4]["value"] = "texto";
			$Attributes[4]["text"] = "Texto";
			$Attributes[5]["value"] = "ip";
			$Attributes[5]["text"] = "Ip";
			$Attributes[6]["value"] = "datahora";
			$Attributes[6]["text"] = "Data/Hora";
			$Attributes[7]["value"] = "status";
			$Attributes[7]["text"] = "Status";
			return $Attributes;
		}
	}
?>