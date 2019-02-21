<?php

class AdapterSearchMounterMongo implements AdapterSearchMounterInterface {
	
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
			$query = SearchComparerMongo::Mounter($attributeComparer, $searchComparer, $value);
		}
		
		$sort = null;
		if( $attributeOrder != null ){
			$searchOrder = (($searchOrder==null) ? SearchOrder::Crescente() : $searchOrder );
			$sort = SearchOrderMongo::Mounter($attributeOrder, $searchOrder);
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
		
		$query = array();
		$comparers = array();
		$orCount = 0;
		foreach ($searchQueryComparerCollection AS $searchQueryComparer){
			$comparers[] = SearchComparerMongo::Mounter($searchQueryComparer->getAttributeFieldName(), $searchQueryComparer->getSearchComparer(), $searchQueryComparer->getValue());
			if( $searchQueryComparer->getSearchCondition() == SearchCondition::OU() ){
				$orCount++;
			}
		}
		if( count($comparers) > 0 ){
			if( $orCount > 0 ){
				$query['$or'] = $comparers;
			}else{
				$query['$and'] = $comparers;
			}
		}
		
		$sort = array();
		foreach ($searchQueryOrderCollection AS $searchQueryOrder){
			$sort[] = SearchOrderMongo::Mounter($searchQueryOrder->getAttributeFieldName(), $searchQueryOrder->getSearchOrder());
		}
		
		$result = array(
			'__collection' => $tableName,
			'__query' => $query,
			'__sort' => $sort
		);
		
		$limitStart = intval($limitStart);
		$limitCount = intval($limitCount);
		if($limitCount > 0){
			$result['__offset'] = $limitStart;
			$result['__limit'] = $limitCount;
		}
		
		return $result;
	}
	
	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryCount()
	 */
	public function MounterByQueryCount($tableName, array $searchQueryComparerCollection) {
		$result = self::MounterByQueryLimit($tableName, $searchQueryComparerCollection, array(), 0, 0);
		return array(
			'__collection' => $tableName,
			'__count' => $result['__query']
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
		
		$query = array();
		$queryGroup = array();
		$orCountGroup = 0;
		foreach ($searchQueryComparerGroupCollection AS $searchQueryComparerGroup){
			$searchQueryComparerCollection = $searchQueryComparerGroup->getSearchQueryComparerCollection();
			
			$comparers = array();
			$orCount = 0;
			foreach ($searchQueryComparerCollection AS $searchQueryComparer){
				$comparers[] = SearchComparerMongo::Mounter($searchQueryComparer->getAttributeFieldName(), $searchQueryComparer->getSearchComparer(), $searchQueryComparer->getValue());
				if( $searchQueryComparer->getSearchCondition() == SearchCondition::OU() ){
					$orCount++;
				}
			}
			if( count($comparers) > 0 ){
				if( $orCount > 0 ){
					$queryGroup[]['$or'] = $comparers;
				}else{
					$queryGroup[]['$and'] = $comparers;
				}
			}
			
			if( $searchQueryComparerGroup->getSearchCondition() == SearchCondition::OU() ){
				$orCountGroup++;
			}
		}
		if( count($queryGroup) > 0 ){
			if( $orCountGroup > 0 ){
				$query['$or'] = $queryGroup;
			}else{
				$query['$and'] = $queryGroup;
			}
		}
		
		$sort = array();
		foreach ($searchQueryOrderCollection AS $searchQueryOrder){
			$sort[] = SearchOrderMongo::Mounter($searchQueryOrder->getAttributeFieldName(), $searchQueryOrder->getSearchOrder());
		}
		
		$result = array(
				'__collection' => $tableName,
				'__query' => $query,
				'__sort' => $sort
		);
		
		$limitStart = intval($limitStart);
		$limitCount = intval($limitCount);
		if($limitCount > 0){
			$result['__offset'] = $limitStart;
			$result['__limit'] = $limitCount;
		}
		
		return $result;
	}
	
	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryCountGroup()
	 */
	public function MounterByQueryCountGroup($tableName, array $searchQueryComparerGroupCollection) {
		$result = self::MounterByQueryLimitGroup($tableName, $searchQueryComparerGroupCollection, array(), 0, 0);
		return array(
			'__collection' => $tableName,
			'__count' => $result['__query']
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