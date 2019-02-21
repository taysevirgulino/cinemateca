<?
	class MultimidiaAttribute{
		public static function IdMultimidia($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "id_multimidia" : "bigint(20)");
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
		public static function Descricao($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "descricao" : "text");
		}
		public static function Arquivo($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "arquivo" : "varchar(255)");
		}
		public static function Embed($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "embed" : "text");
		}
		public static function Width($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "width" : "int(11)");
		}
		public static function Height($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "height" : "int(11)");
		}
		public static function Destaque($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "destaque" : "int(11)");
		}
		public static function Imagem($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "imagem" : "varchar(255)");
		}
		public static function Tipo($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "tipo" : "int(11)");
		}
		public static function Datahora($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "datahora" : "datetime");
		}
		public static function Status($FieldNameOrType = 1){
			return (($FieldNameOrType == 1) ? "status" : "int(11)");
		}
		public static function _Table(){
			return "tb_multimidia";
		}
		public static function _Default($FieldNameOrType = 1){
			return MultimidiaAttribute::Nome($FieldNameOrType);
		}
		public static function _IsValid($Attribute){
			switch ($Attribute){
				case MultimidiaAttribute::IdMultimidia() : { return true; } break;
				case MultimidiaAttribute::Identificador() : { return true; } break;
				case MultimidiaAttribute::IdeOrigem() : { return true; } break;
				case MultimidiaAttribute::Nome() : { return true; } break;
				case MultimidiaAttribute::Descricao() : { return true; } break;
				case MultimidiaAttribute::Arquivo() : { return true; } break;
				case MultimidiaAttribute::Embed() : { return true; } break;
				case MultimidiaAttribute::Width() : { return true; } break;
				case MultimidiaAttribute::Height() : { return true; } break;
				case MultimidiaAttribute::Destaque() : { return true; } break;
				case MultimidiaAttribute::Imagem() : { return true; } break;
				case MultimidiaAttribute::Tipo() : { return true; } break;
				case MultimidiaAttribute::Datahora() : { return true; } break;
				case MultimidiaAttribute::Status() : { return true; } break;
				default : { return false; } break;
			}
			return false;
		}
		public static function _GetAllAttributes(){
			$Attributes = array();
			$Attributes[0]["value"] = "id_multimidia";
			$Attributes[0]["text"] = "Cуdigo Multimнdia";
			$Attributes[1]["value"] = "identificador";
			$Attributes[1]["text"] = "Identificador";
			$Attributes[2]["value"] = "nome";
			$Attributes[2]["text"] = "Nome";
			$Attributes[3]["value"] = "descricao";
			$Attributes[3]["text"] = "Descriзгo";
			$Attributes[4]["value"] = "arquivo";
			$Attributes[4]["text"] = "Arquivo";
			$Attributes[5]["value"] = "embed";
			$Attributes[5]["text"] = "Embed";
			$Attributes[6]["value"] = "width";
			$Attributes[6]["text"] = "Largura (Width)";
			$Attributes[7]["value"] = "height";
			$Attributes[7]["text"] = "Altura (Height)";
			$Attributes[8]["value"] = "destaque";
			$Attributes[8]["text"] = "Destaque";
			$Attributes[9]["value"] = "imagem";
			$Attributes[9]["text"] = "Imagem";
			$Attributes[10]["value"] = "tipo";
			$Attributes[10]["text"] = "Tipo";
			$Attributes[11]["value"] = "datahora";
			$Attributes[11]["text"] = "Data/Hora";
			$Attributes[12]["value"] = "status";
			$Attributes[12]["text"] = "Status";
			return $Attributes;
		}
	}
?>