<?
	class SearchOrderPDO extends SearchOrder {
		
		public static function Mounter($AttributeFieldName, $SearchOrder){
		    return array(
		        $AttributeFieldName => $SearchOrder
		    );
		}
		
	}
?>