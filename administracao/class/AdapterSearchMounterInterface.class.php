<?php
interface AdapterSearchMounterInterface {
	
	public function MounterByQueryCount($tableName, array $searchQueryComparerCollection);
	public function MounterByQueryCountGroup($tableName, array $searchQueryComparerGroupCollection);
	
	public function MounterByQueryLimit($tableName, array $searchQueryComparerCollection, array $searchQueryOrderCollection, $limitStart, $limitCount);
	public function MounterByQueryLimitGroup($tableName, array $searchQueryComparerGroupCollection, array $searchQueryOrderCollection, $limitStart, $limitCount);
	
	public function MounterByQueryComparerOrder($tableName, array $searchQueryComparerCollection, array $searchQueryOrderCollection=array());
	public function MounterByQueryComparerGroupOrder($tableName, array $searchQueryComparerGroupCollection, array $searchQueryOrderCollection=array());
	
	public function MounterByComparer($tableName, $attributeComparer, $searchComparer, $value);
	public function MounterByOrder($tableName, $attributeOrder, $searchOrder);
	public function MounterByComparerOrder($tableName, $attributeComparer, $searchComparer, $value, $attributeOrder, $searchOrder);
	
	public function ValidateAndMounter($tableName, $attributeComparer=null, $searchComparer=null, $value=null, $attributeOrder=null, $searchOrder=null);
	
	public function Query($tableName, array $searchQueryComparerCollection=array(), array $searchQueryOrderCollection=array(), $limitStart=0, $limitCount=0);
	public function Count($tableName, array $searchQueryComparerCollection=array());

}
?>