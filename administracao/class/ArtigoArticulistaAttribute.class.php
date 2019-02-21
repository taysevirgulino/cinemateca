<?
	class ArtigoArticulistaAttribute{
		public static function IdArtigoArticulista($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_artigo_articulista" : "bigint(20)");
		}
		public static function Identificador($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "identificador" : "varchar(32)");
		}
		public static function IdeOrigem($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "ide_origem" : "varchar(32)");
		}
		public static function Nome($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "nome" : "varchar(255)");
		}
		public static function Perfil($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "perfil" : "text");
		}
		public static function Email($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "email" : "varchar(255)");
		}
		public static function Telefone($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "telefone" : "varchar(20)");
		}
		public static function Foto($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "foto" : "varchar(255)");
		}
		public static function _Table(){
			return "tb_artigo_articulista";
		}
		public static function _Default($FieldNameOrType = 1){
			return ArtigoArticulistaAttribute::Nome($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case ArtigoArticulistaAttribute::IdArtigoArticulista() : { return true; } break;
				case ArtigoArticulistaAttribute::Identificador() : { return true; } break;
				case ArtigoArticulistaAttribute::IdeOrigem() : { return true; } break;
				case ArtigoArticulistaAttribute::Nome() : { return true; } break;
				case ArtigoArticulistaAttribute::Perfil() : { return true; } break;
				case ArtigoArticulistaAttribute::Email() : { return true; } break;
				case ArtigoArticulistaAttribute::Telefone() : { return true; } break;
				case ArtigoArticulistaAttribute::Foto() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_artigo_articulista";
			$Attributes[0]["text"] = "Código Artigo Articulista";
			$Attributes[1]["value"] = "identificador";
			$Attributes[1]["text"] = "Identificador";
			$Attributes[2]["value"] = "nome";
			$Attributes[2]["text"] = "Nome";
			$Attributes[3]["value"] = "perfil";
			$Attributes[3]["text"] = "Perfil";
			$Attributes[4]["value"] = "email";
			$Attributes[4]["text"] = "E-mail";
			$Attributes[5]["value"] = "telefone";
			$Attributes[5]["text"] = "Telefone";
			$Attributes[6]["value"] = "foto";
			$Attributes[6]["text"] = "Foto";
			return $Attributes;
		}
	}
?>