<?php

class AdapterSearchMounterSQL implements AdapterSearchMounterInterface {
	
	/**
	 * @see AdapterSearchMounterInterface::MounterByComparer()
	 */
	public function MounterByComparer($tableName, $attributeComparer, $searchComparer, $value) {
		return "SELECT * FROM $tableName WHERE ".SearchComparer::Mounter($attributeComparer, $searchComparer, $value);
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByComparerOrder()
	 */
	public function MounterByComparerOrder($tableName, $attributeComparer, $searchComparer, $value, $attributeOrder, $searchOrder) {
		return "SELECT * FROM $tableName WHERE ".SearchComparer::Mounter($attributeComparer, $searchComparer, $value)." ORDER BY ".SearchOrder::Mounter($attributeOrder, $searchOrder);
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByOrder()
	 */
	public function MounterByOrder($tableName, $attributeOrder, $searchOrder) {
		return "SELECT * FROM $tableName ORDER BY ".SearchOrder::Mounter($attributeOrder, $searchOrder);
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryComparerGroupOrder()
	 */
	public function MounterByQueryComparerGroupOrder($tableName, array $searchQueryComparerGroupCollection, array $searchQueryOrderCollection = array()) {
		$Sql = "SELECT * FROM $tableName WHERE";
			
		$QueryComparerGroup = "";
		foreach ($searchQueryComparerGroupCollection AS $SearchQueryComparerGroup){
			$QueryComparer = "";
			foreach ($SearchQueryComparerGroup->getSearchQueryComparerCollection() AS $SearchQueryComparer){
				$QueryComparer .= SearchCondition::Mounter(SearchComparer::Mounter($SearchQueryComparer->getAttributeFieldName(), $SearchQueryComparer->getSearchComparer(), $SearchQueryComparer->getValue()), $SearchQueryComparer->getSearchCondition())." ";
			}
			$QueryComparer = preg_replace("{^(AND|OR)}", "", $QueryComparer);
			if(!empty($QueryComparer)){
				$QueryComparerGroup .= $SearchQueryComparerGroup->getSearchCondition()." ($QueryComparer) ";
			}
		}
		$QueryComparerGroup = preg_replace("{^(AND|OR)}", "", $QueryComparerGroup);
		$Sql = $Sql.$QueryComparerGroup;
		$Sql = preg_replace("{(WHERE)$}", "", $Sql);
		
		$QueryOrder = "";
		foreach ($searchQueryOrderCollection AS $SearchQueryOrder){
			$QueryOrder .= SearchOrder::Mounter($SearchQueryOrder->getAttributeFieldName(), $SearchQueryOrder->getSearchOrder()).", "; 
		}
		$QueryOrder = "ORDER BY ".preg_replace("{(, )$}", "", $QueryOrder);
		$Sql = $Sql.$QueryOrder;
		$Sql = preg_replace("{(ORDER BY )$}", "", $Sql);
		
		return $Sql;
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryComparerOrder()
	 */
	public function MounterByQueryComparerOrder($tableName, array $searchQueryComparerCollection, array $searchQueryOrderCollection = array()) {
		$Sql = "SELECT * FROM $tableName WHERE";
			
		$QueryComparer = "";
		foreach ($searchQueryComparerCollection AS $SearchQueryComparer){
			$QueryComparer .= SearchCondition::Mounter(SearchComparer::Mounter($SearchQueryComparer->getAttributeFieldName(), $SearchQueryComparer->getSearchComparer(), $SearchQueryComparer->getValue()), $SearchQueryComparer->getSearchCondition())." ";
		}
		$QueryComparer = preg_replace("{^(AND|OR)}", "", $QueryComparer);
		$Sql = $Sql.$QueryComparer;
		$Sql = preg_replace("{(WHERE)$}", "", $Sql);
		
		$QueryOrder = "";
		foreach ($searchQueryOrderCollection AS $SearchQueryOrder){
			$QueryOrder .= SearchOrder::Mounter($SearchQueryOrder->getAttributeFieldName(), $SearchQueryOrder->getSearchOrder()).", "; 
		}
		$QueryOrder = "ORDER BY ".preg_replace("{(, )$}", "", $QueryOrder);
		$Sql = $Sql.$QueryOrder;
		$Sql = preg_replace("{(ORDER BY )$}", "", $Sql);
		
		return $Sql;
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryCount()
	 */
	public function MounterByQueryCount($tableName, array $searchQueryComparerCollection) {
		$Sql = "SELECT COUNT(*) AS count FROM $tableName WHERE";
			
		$QueryComparer = "";
		foreach ($searchQueryComparerCollection AS $SearchQueryComparer){
			$QueryComparer .= SearchCondition::Mounter(SearchComparer::Mounter($SearchQueryComparer->getAttributeFieldName(), $SearchQueryComparer->getSearchComparer(), $SearchQueryComparer->getValue()), $SearchQueryComparer->getSearchCondition())." ";
		}
		$QueryComparer = preg_replace("{^(AND|OR)}", "", $QueryComparer);
		$Sql = $Sql.$QueryComparer;
		$Sql = preg_replace("{(WHERE)$}", "", $Sql);
		
		return $Sql;
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryCountGroup()
	 */
	public function MounterByQueryCountGroup($tableName, array $searchQueryComparerGroupCollection) {
		$Sql = "SELECT COUNT(*) AS count FROM $tableName WHERE";
			
		$QueryComparerGroup = "";
		foreach ($searchQueryComparerGroupCollection AS $SearchQueryComparerGroup){
			$QueryComparer = "";
			foreach ($SearchQueryComparerGroup->getSearchQueryComparerCollection() AS $SearchQueryComparer){
				$QueryComparer .= SearchCondition::Mounter(SearchComparer::Mounter($SearchQueryComparer->getAttributeFieldName(), $SearchQueryComparer->getSearchComparer(), $SearchQueryComparer->getValue()), $SearchQueryComparer->getSearchCondition())." ";
			}
			$QueryComparer = preg_replace("{^(AND|OR)}", "", $QueryComparer);
			if(!empty($QueryComparer)){
				$QueryComparerGroup .= $SearchQueryComparerGroup->getSearchCondition()." ($QueryComparer) ";
			}
		}
		$QueryComparerGroup = preg_replace("{^(AND|OR)}", "", $QueryComparerGroup);
		$Sql = $Sql.$QueryComparerGroup;
		$Sql = preg_replace("{(WHERE)$}", "", $Sql);
		
		return $Sql;
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryLimit()
	 */
	public function MounterByQueryLimit($tableName, array $searchQueryComparerCollection, array $searchQueryOrderCollection, $limitStart, $limitCount) {
		$limitStart = intval($limitStart);
		$limitCount = intval($limitCount);
			
		$Sql = self::MounterByQueryComparerOrder($tableName, $searchQueryComparerCollection, $searchQueryOrderCollection);
		
		$Sql = $Sql.(($limitCount>0) ? " LIMIT $limitStart,$limitCount" : "" );
		
		return $Sql;
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryLimitGroup()
	 */
	public function MounterByQueryLimitGroup($tableName, array $searchQueryComparerGroupCollection, array $searchQueryOrderCollection, $limitStart, $limitCount) {
		$limitStart = intval($limitStart);
		$limitCount = intval($limitCount);
		
		$Sql = self::MounterByQueryComparerGroupOrder($tableName, $searchQueryComparerGroupCollection, $searchQueryOrderCollection);
		
		$Sql = $Sql.(($limitCount>0) ? " LIMIT $limitStart,$limitCount" : "" );
		
		return $Sql;
	}

	/**
	 * @see AdapterSearchMounterInterface::ValidateAndMounter()
	 */
	public function ValidateAndMounter($tableName, $attributeComparer = null, $searchComparer = null, $value = null, $attributeOrder = null, $searchOrder = null) {
		if(empty($tableName)){ die("AttributeSysTable não setado;"); }
		if( (!empty($attributeComparer)) && (!empty($value)) && (!empty($attributeOrder))){
			return self::MounterByComparerOrder($tableName, $attributeComparer, $searchComparer, $value, $attributeOrder, $searchOrder);
		}else
		if( (!empty($attributeComparer)) && (!empty($value))){
			return self::MounterByComparer($tableName, $attributeComparer, $searchComparer, $value);
		}else
		if( (!empty($attributeOrder)) ){
			return self::MounterByOrder($tableName, $attributeOrder, $searchOrder);
		}else{
			return "SELECT * FROM $tableName";
		}
	}
	
	/**
	 * @see AdapterSearchMounterInterface::Count()
	 */
	public function Count($tableName, array $searchQueryComparerCollection = array()) {
		return self::MounterByQueryCount($tableName, $searchQueryComparerCollection);
	}

	/**
	 * @see AdapterSearchMounterInterface::Query()
	 */
	public function Query($tableName, array $searchQueryComparerCollection = array(), array $searchQueryOrderCollection = array(), $limitStart = 0, $limitCount = 0) {
		return self::MounterByQueryLimit($tableName, $searchQueryComparerCollection, $searchQueryOrderCollection, $limitStart, $limitCount);
	}

}

?>