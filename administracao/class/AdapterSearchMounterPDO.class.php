<?php

class AdapterSearchMounterPDO implements AdapterSearchMounterInterface {
	
	/**
	 * @see AdapterSearchMounterInterface::MounterByComparer()
	 */
	public function MounterByComparer($tableName, $attributeComparer, $searchComparer, $value) {
		return self::ValidateAndMounter($tableName, $attributeComparer, $searchComparer, $value, null, null);
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByComparerOrder()
	 */
	public function MounterByComparerOrder($tableName, $attributeComparer, $searchComparer, $value, $attributeOrder, $searchOrder) {
		return self::ValidateAndMounter($tableName, $attributeComparer, $searchComparer, $value, $attributeOrder, $searchOrder);
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByOrder()
	 */
	public function MounterByOrder($tableName, $attributeOrder, $searchOrder) {
		return self::ValidateAndMounter($tableName, null, null, null, $attributeOrder, $searchOrder);
	}

	/**
	 * @see AdapterSearchMounterInterface::ValidateAndMounter()
	 */
	public function ValidateAndMounter($tableName, $attributeComparer = null, $searchComparer = null, $value = null, $attributeOrder = null, $searchOrder = null) {
		
		$query = null;
		if( ($attributeComparer != null) && ($value != null) ){
			$searchComparer = (($searchComparer==null) ? SearchComparer::Igual() : $searchComparer );
			$query = SearchComparerPDO::Mounter($attributeComparer, $searchComparer, $value);
		}
		
		$sort = null;
		if( $attributeOrder != null ){
			$searchOrder = (($searchOrder==null) ? SearchOrder::Crescente() : $searchOrder );
			$sort = SearchOrderPDO::Mounter($attributeOrder, $searchOrder);
		}
		
		return array(
			'__collection' => $tableName,
			'__query' => $query,
			'__sort' => $sort
		);
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryComparerOrder()
	 */
	public function MounterByQueryComparerOrder($tableName, array $searchQueryComparerCollection, array $searchQueryOrderCollection = array()) {
		return self::MounterByQueryLimit($tableName, $searchQueryComparerCollection, $searchQueryOrderCollection, 0, 0);
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryLimit()
	 */
	public function MounterByQueryLimit($tableName, array $searchQueryComparerCollection, array $searchQueryOrderCollection, $limitStart, $limitCount) {
		
	    $adapterSQL = new AdapterSearchMounterSQL();
	    $sql = $adapterSQL->MounterByQueryLimit($tableName, $searchQueryComparerCollection, $searchQueryOrderCollection, $limitStart, $limitCount);
	    
	    return array(
	        "__sql" => $sql
	    );
	    
	}
	
	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryCount()
	 */
	public function MounterByQueryCount($tableName, array $searchQueryComparerCollection) {
		
	    $adapterSQL = new AdapterSearchMounterSQL();
	    $sql = $adapterSQL->MounterByQueryCount($tableName, $searchQueryComparerCollection);
	     
	    return array(
	        "__sql" => $sql
	    );
	    
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryComparerGroupOrder()
	 */
	public function MounterByQueryComparerGroupOrder($tableName, array $searchQueryComparerGroupCollection, array $searchQueryOrderCollection = array()) {
		return self::MounterByQueryLimitGroup($tableName, $searchQueryComparerGroupCollection, $searchQueryOrderCollection, 0, 0);
	}
	
	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryLimitGroup()
	 */
	public function MounterByQueryLimitGroup($tableName, array $searchQueryComparerGroupCollection, array $searchQueryOrderCollection, $limitStart, $limitCount) {
		
	    $adapterSQL = new AdapterSearchMounterSQL();
	    $sql = $adapterSQL->MounterByQueryLimitGroup($tableName, $searchQueryComparerGroupCollection, $searchQueryOrderCollection, $limitStart, $limitCount);
	    
	    return array(
	        "__sql" => $sql
	    );
	    
	}
	
	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryCountGroup()
	 */
	public function MounterByQueryCountGroup($tableName, array $searchQueryComparerGroupCollection) {
		
	    $adapterSQL = new AdapterSearchMounterSQL();
	    $sql = $adapterSQL->MounterByQueryCountGroup($tableName, $searchQueryComparerGroupCollection);
	     
	    return array(
	        "__sql" => $sql
	    );
	    
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