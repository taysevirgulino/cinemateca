<?
	class SearchOrderMongo extends SearchOrder {
		
		public static function Mounter($AttributeFieldName, $SearchOrder){
			switch ($SearchOrder){
				case SearchOrder::Crescente() : { 
					return array(
						$AttributeFieldName => 1
					); 
				} break;
				case SearchOrder::Decrescente() : { 
					return array(
						$AttributeFieldName => -1
					);
				} break;
				default: { 
					return array(
						$AttributeFieldName => 1
					);
				} break;
			}
		}
		
	}
?>