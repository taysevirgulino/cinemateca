<?
	class SearchComparer{
		public static function Igual(){
			return "igual";
		}
		public static function Diferente(){
			return "diferente";
		}
		public static function Contem(){
			return "contem";
		}
		public static function NaoContem(){
			return "naocontem";
		}
		public static function IniciaCom(){
			return "iniciacom";
		}
		public static function TerminaCom(){
			return "terminacom";
		}
		public static function Maior(){
			return "maior";
		}
		public static function Menor(){
			return "menor";
		}
		public static function MaiorIgual(){
			return "maiorigual";
		}
		public static function MenorIgual(){
			return "menorigual";
		}
		public static function In(){
			return "in";
		}
		public static function NotIn(){
			return "notin";
		}
		public static function _GetAllComparers(){
			$Comparers = array();
			$Comparers[0]["value"] = SearchComparer::Contem();
			$Comparers[0]["text"] = "Contem";
			$Comparers[1]["value"] = SearchComparer::Igual();
			$Comparers[1]["text"] = "Igual";
			$Comparers[2]["value"] = SearchComparer::Diferente();
			$Comparers[2]["text"] = "Diferente";
			$Comparers[3]["value"] = SearchComparer::NaoContem();
			$Comparers[3]["text"] = "Não Contem";
			$Comparers[4]["value"] = SearchComparer::IniciaCom();
			$Comparers[4]["text"] = "Inicia com";
			$Comparers[5]["value"] = SearchComparer::TerminaCom();
			$Comparers[5]["text"] = "Termina com";
			$Comparers[6]["value"] = SearchComparer::Maior();
			$Comparers[6]["text"] = "Maior";
			$Comparers[7]["value"] = SearchComparer::Menor();
			$Comparers[7]["text"] = "Menor";
			$Comparers[8]["value"] = SearchComparer::MaiorIgual();
			$Comparers[8]["text"] = "Mairo Igual";
			$Comparers[9]["value"] = SearchComparer::MenorIgual();
			$Comparers[9]["text"] = "Menor Igual";
			return $Comparers;
		}
		public static function Mounter($AttributeFieldName, $SearchComparer, $Value){
			$Value = str_ireplace("'", "''", $Value);
			switch ($SearchComparer){
				case SearchComparer::Igual() : { return "$AttributeFieldName = '$Value'"; } break;
				case SearchComparer::Diferente() : { return "$AttributeFieldName <> '$Value'"; } break;
				case SearchComparer::Contem() : { return "$AttributeFieldName LIKE '%$Value%'"; } break;
				case SearchComparer::NaoContem() : { return "$AttributeFieldName NOT LIKE '%$Value%'"; } break;
				case SearchComparer::IniciaCom() : { return "$AttributeFieldName LIKE '$Value%'"; } break;
				case SearchComparer::TerminaCom() : { return "$AttributeFieldName LIKE '%$Value'"; } break;
				case SearchComparer::Maior() : { return "$AttributeFieldName > '$Value'"; } break;
				case SearchComparer::Menor() : { return "$AttributeFieldName < '$Value'"; } break;
				case SearchComparer::MaiorIgual() : { return "$AttributeFieldName >= '$Value'"; } break;
				case SearchComparer::MenorIgual() : { return "$AttributeFieldName <= '$Value'"; } break;
				case SearchComparer::In() : { return "$AttributeFieldName IN ($Value)"; } break;
				case SearchComparer::NotIn() : { return "$AttributeFieldName NOT IN ($Value)"; } break;
				default : { return "$AttributeFieldName = '$Value'"; } break;
			}
		}
		public static function IsValid($SearchComparer){
			switch ($SearchComparer){
				case SearchComparer::Igual() : { return true; } break;
				case SearchComparer::Diferente() : { return true; } break;
				case SearchComparer::Contem() : { return true; } break;
				case SearchComparer::NaoContem() : { return true; } break;
				case SearchComparer::IniciaCom() : { return true; } break;
				case SearchComparer::TerminaCom() : { return true; } break;
				case SearchComparer::Maior() : { return true; } break;
				case SearchComparer::Menor() : { return true; } break;
				case SearchComparer::MaiorIgual() : { return true; } break;
				case SearchComparer::MenorIgual() : { return true; } break;
				case SearchComparer::In() : { return true; } break;
				case SearchComparer::NotIn() : { return true; } break;
				default : { return false; } break;
			}
			return false;			
		}
		private static function AttributeFieldTypeIsString( $AttributeFieldType ){
			return eregi("^(.)?(var|char|date|time|text|xml)+(.?)$", $AttributeFieldType);
		}
	}
?>