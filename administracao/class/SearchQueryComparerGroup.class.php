<? 
	class SearchQueryComparerGroup { 
		protected $mySearchQueryComparerCollection, $mySearchCondition;
		 
		public function __construct($SearchQueryComparerCollection=array(), $SearchCondition=""){
			$this->setSearchQueryComparerCollection($SearchQueryComparerCollection);
			$this->setSearchCondition($SearchCondition);
		} 
		public function __destruct(){} 
		 
		public function setSearchQueryComparerCollection( $value ){ $this->mySearchQueryComparerCollection = $value; } 
		public function getSearchQueryComparerCollection(){ return $this->mySearchQueryComparerCollection; } 

		public function setSearchCondition( $value ){ $this->mySearchCondition = $value; } 
		public function getSearchCondition(){ return $this->mySearchCondition; } 

	} 
?>