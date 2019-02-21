<? 
	class SearchQueryOrder { 
		protected $myAttributeFieldName, $mySearchOrder;
		 
		public function __construct($AttributeFieldName="", $SearchOrder=""){
			$this->setAttributeFieldName($AttributeFieldName);
			$this->setSearchOrder($SearchOrder);
		} 
		public function __destruct(){} 
		 
		public function setAttributeFieldName( $value ){ $this->myAttributeFieldName = $value; } 
		public function getAttributeFieldName(){ return $this->myAttributeFieldName; } 

		public function setSearchOrder( $value ){ $this->mySearchOrder = $value; } 
		public function getSearchOrder(){ return $this->mySearchOrder; } 
		
	} 
?>