<?
	class SearchCondition{
		public static function E(){
			return "AND";
		}
		public static function OU(){
			return "OR";
		}
		public static function Mounter($MounterSearchComparer, $SearchCondition){
			switch ($SearchCondition){
				case SearchCondition::E() : { return "AND $MounterSearchComparer"; } break;
				case SearchCondition::OU() : { return "OR $MounterSearchComparer"; } break;
				default: { return "AND $MounterSearchComparer"; } break;
			}
		}
		public static function IsValid($SearchCondition){
			switch ($SearchCondition){
				case SearchCondition::E() : { return true; } break;
				case SearchCondition::OU() : { return true; } break;
				default: { return false; } break;
			}	
			return false;		
		}
		public static function _GetAllOrders(){
			$Conditions = array();
			$Conditions[0]["value"] = SearchCondition::E();
			$Conditions[0]["text"] = "E (AND)";
			$Conditions[1]["value"] = SearchCondition::OU();
			$Conditions[1]["text"] = "OU (OR)";
			return $Conditions;
		}
	}
?>