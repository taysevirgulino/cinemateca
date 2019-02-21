<? 
	class SearchQueryComparer { 
		protected $myAttributeFieldName, $mySearchComparer, $mySearchCondition, $myValue;
		 
		public function __construct($AttributeFieldName="", $SearchComparer="", $SearchCondition="", $Value=""){
			$this->setAttributeFieldName($AttributeFieldName);
			$this->setSearchComparer($SearchComparer);
			$this->setSearchCondition($SearchCondition);
			$this->setValue($Value);
		} 
		public function __destruct(){} 
		 
		public function setAttributeFieldName( $value ){ $this->myAttributeFieldName = $value; } 
		public function getAttributeFieldName(){ return $this->myAttributeFieldName; } 

		public function setSearchComparer( $value ){ $this->mySearchComparer = $value; } 
		public function getSearchComparer(){ return $this->mySearchComparer; } 

		public function setSearchCondition( $value ){ $this->mySearchCondition = $value; } 
		public function getSearchCondition(){ return $this->mySearchCondition; } 

		public function setValue( $value ){ $this->myValue = $value; } 
		public function getValue(){ return $this->myValue; } 

	} 
?>