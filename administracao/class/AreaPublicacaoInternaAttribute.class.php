<?
	class AreaPublicacaoInternaAttribute{
		public static function IdAreaPublicacaoInterna($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_area_publicacao_interna" : "bigint(20)");
		}
		public static function Identificador($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "identificador" : "varchar(32)");
		}
		public static function Nome($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "nome" : "varchar(255)");
		}
		public static function Quantidade($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "quantidade" : "int(11)");
		}
		public static function Prioridade($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "prioridade" : "int(11)");
		}
		public static function _Table(){
			return "tb_area_publicacao_interna";
		}
		public static function _Default($FieldNameOrType = 1){
			return AreaPublicacaoInternaAttribute::Nome($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case AreaPublicacaoInternaAttribute::IdAreaPublicacaoInterna() : { return true; } break;
				case AreaPublicacaoInternaAttribute::Identificador() : { return true; } break;
				case AreaPublicacaoInternaAttribute::Nome() : { return true; } break;
				case AreaPublicacaoInternaAttribute::Quantidade() : { return true; } break;
				case AreaPublicacaoInternaAttribute::Prioridade() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_area_publicacao_interna";
			$Attributes[0]["text"] = "Cуdigo Бrea Publicaзгo Interna";
			$Attributes[1]["value"] = "identificador";
			$Attributes[1]["text"] = "Identificador";
			$Attributes[2]["value"] = "nome";
			$Attributes[2]["text"] = "Nome";
			$Attributes[3]["value"] = "quantidade";
			$Attributes[3]["text"] = "Quantidade";
			$Attributes[4]["value"] = "prioridade";
			$Attributes[4]["text"] = "Prioridade";
			return $Attributes;
		}
	}
?>