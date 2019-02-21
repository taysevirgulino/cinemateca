<?
	class SearchOrder{
		public static function Crescente(){
			return "ASC";
		}
		public static function Decrescente(){
			return "DESC";
		}
		public static function Mounter($AttributeFieldName, $SearchOrder){
			switch ($SearchOrder){
				case SearchOrder::Crescente() : { return "$AttributeFieldName ASC"; } break;
				case SearchOrder::Decrescente() : { return "$AttributeFieldName DESC"; } break;
				default: { return "$AttributeFieldName ASC"; } break;
			}
		}
		public static function IsValid($SearchOrder){
			switch ($SearchOrder){
				case SearchOrder::Crescente() : { return true; } break;
				case SearchOrder::Decrescente() : { return true; } break;
				default: { return false; } break;
			}	
			return false;		
		}
		public static function _GetAllOrders(){
			$Orders = array();
			$Orders[0]["value"] = SearchOrder::Crescente();
			$Orders[0]["text"] = "Crescente";
			$Orders[1]["value"] = SearchOrder::Decrescente();
			$Orders[1]["text"] = "Decrescente";
			return $Orders;
		}
		public static function _Inverso( $SearchOrder ){
			switch ($SearchOrder){
				case SearchOrder::Crescente() : { return SearchOrder::Decrescente(); } break;
				case SearchOrder::Decrescente() : { return SearchOrder::Crescente(); } break;
			}
			return SearchOrder::Crescente();
		}
	}
?>