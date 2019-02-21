<?
	class BlocoMenuAttribute{
		public static function IdBlocoMenu($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_bloco_menu" : "bigint(20)");
		}
		public static function Identificador($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "identificador" : "varchar(32)");
		}
		public static function IdeOrigem($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "ide_origem" : "varchar(32)");
		}
		public static function IdBlocoMenuPai($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_bloco_menu_pai" : "bigint(20)");
		}
		public static function Nome($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "nome" : "varchar(255)");
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
		public static function Status($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "status" : "int(11)");
		}
		public static function _Table(){
			return "tb_bloco_menu";
		}
		public static function _Default($FieldNameOrType = 1){
			return BlocoMenuAttribute::Nome($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case BlocoMenuAttribute::IdBlocoMenu() : { return true; } break;
				case BlocoMenuAttribute::Identificador() : { return true; } break;
				case BlocoMenuAttribute::IdeOrigem() : { return true; } break;
				case BlocoMenuAttribute::IdBlocoMenuPai() : { return true; } break;
				case BlocoMenuAttribute::Nome() : { return true; } break;
				case BlocoMenuAttribute::Url() : { return true; } break;
				case BlocoMenuAttribute::Target() : { return true; } break;
				case BlocoMenuAttribute::Prioridade() : { return true; } break;
				case BlocoMenuAttribute::Status() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_bloco_menu";
			$Attributes[0]["text"] = "Código Bloco Menu";
			$Attributes[1]["value"] = "identificador";
			$Attributes[1]["text"] = "Identificador";
			$Attributes[2]["value"] = "id_bloco_menu_pai";
			$Attributes[2]["text"] = "Código Bloco Menu Pai";
			$Attributes[3]["value"] = "nome";
			$Attributes[3]["text"] = "Nome";
			$Attributes[4]["value"] = "url";
			$Attributes[4]["text"] = "Url (Endereço)";
			$Attributes[5]["value"] = "target";
			$Attributes[5]["text"] = "Abrir";
			$Attributes[6]["value"] = "prioridade";
			$Attributes[6]["text"] = "Prioridade";
			$Attributes[7]["value"] = "status";
			$Attributes[7]["text"] = "Status";
			return $Attributes;
		}
	}
?>