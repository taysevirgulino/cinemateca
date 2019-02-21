<?
	class LinkAttribute{
		public static function IdLink($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_link" : "bigint(20)");
		}
		public static function Identificador($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "identificador" : "varchar(32)");
		}
		public static function IdeOrigem($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "ide_origem" : "varchar(32)");
		}
		public static function Nome($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "nome" : "varchar(100)");
		}
		public static function Descricao($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "descricao" : "varchar(255)");
		}
		public static function Url($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "url" : "varchar(255)");
		}
		public static function Target($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "target" : "varchar(20)");
		}
		public static function Prioridade($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "prioridade" : "int(11)");
		}
		public static function Datahora($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "datahora" : "datetime");
		}
		public static function Status($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "status" : "int(11)");
		}
		public static function _Table(){
			return "tb_link";
		}
		public static function _Default($FieldNameOrType = 1){
			return LinkAttribute::Nome($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case LinkAttribute::IdLink() : { return true; } break;
				case LinkAttribute::Identificador() : { return true; } break;
				case LinkAttribute::IdeOrigem() : { return true; } break;
				case LinkAttribute::Nome() : { return true; } break;
				case LinkAttribute::Descricao() : { return true; } break;
				case LinkAttribute::Url() : { return true; } break;
				case LinkAttribute::Target() : { return true; } break;
				case LinkAttribute::Prioridade() : { return true; } break;
				case LinkAttribute::Datahora() : { return true; } break;
				case LinkAttribute::Status() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_link";
			$Attributes[0]["text"] = "Código Link";
			$Attributes[1]["value"] = "identificador";
			$Attributes[1]["text"] = "Identificador";
			$Attributes[2]["value"] = "nome";
			$Attributes[2]["text"] = "Nome";
			$Attributes[3]["value"] = "descricao";
			$Attributes[3]["text"] = "Descrição";
			$Attributes[4]["value"] = "url";
			$Attributes[4]["text"] = "Url (Endereço)";
			$Attributes[5]["value"] = "target";
			$Attributes[5]["text"] = "Abrir";
			$Attributes[6]["value"] = "prioridade";
			$Attributes[6]["text"] = "Prioridade";
			$Attributes[7]["value"] = "datahora";
			$Attributes[7]["text"] = "Data/Hora";
			$Attributes[8]["value"] = "status";
			$Attributes[8]["text"] = "Status";
			return $Attributes;
		}
	}
?>