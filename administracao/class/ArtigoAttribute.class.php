<?
	class ArtigoAttribute{
		public static function IdArtigo($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_artigo" : "bigint(20)");
		}
		public static function Identificador($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "identificador" : "varchar(32)");
		}
		public static function IdeOrigem($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "ide_origem" : "varchar(32)");
		}
		public static function IdArtigoArticulista($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_artigo_articulista" : "bigint(20)");
		}
		public static function Titulo($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "titulo" : "varchar(255)");
		}
		public static function Resumo($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "resumo" : "text");
		}
		public static function Texto($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "texto" : "text");
		}
		public static function ArquivoAnexo($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "arquivo_anexo" : "varchar(255)");
		}
		public static function Datahora($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "datahora" : "datetime");
		}
		public static function Status($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "status" : "int(11)");
		}
		public static function _Table(){
			return "tb_artigo";
		}
		public static function _Default($FieldNameOrType = 1){
			return ArtigoAttribute::Titulo($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case ArtigoAttribute::IdArtigo() : { return true; } break;
				case ArtigoAttribute::Identificador() : { return true; } break;
				case ArtigoAttribute::IdeOrigem() : { return true; } break;
				case ArtigoAttribute::IdArtigoArticulista() : { return true; } break;
				case ArtigoAttribute::Titulo() : { return true; } break;
				case ArtigoAttribute::Resumo() : { return true; } break;
				case ArtigoAttribute::Texto() : { return true; } break;
				case ArtigoAttribute::ArquivoAnexo() : { return true; } break;
				case ArtigoAttribute::Datahora() : { return true; } break;
				case ArtigoAttribute::Status() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_artigo";
			$Attributes[0]["text"] = "Código Artigo";
			$Attributes[1]["value"] = "identificador";
			$Attributes[1]["text"] = "Identificador";
			$Attributes[2]["value"] = "id_artigo_articulista";
			$Attributes[2]["text"] = "Código Artigo Articulista";
			$Attributes[3]["value"] = "titulo";
			$Attributes[3]["text"] = "Título";
			$Attributes[4]["value"] = "resumo";
			$Attributes[4]["text"] = "Resumo";
			$Attributes[5]["value"] = "texto";
			$Attributes[5]["text"] = "Texto";
			$Attributes[6]["value"] = "arquivo_anexo";
			$Attributes[6]["text"] = "Arquivo Anexo";
			$Attributes[7]["value"] = "datahora";
			$Attributes[7]["text"] = "Data/Hora";
			$Attributes[8]["value"] = "status";
			$Attributes[8]["text"] = "Status";
			return $Attributes;
		}
	}
?>