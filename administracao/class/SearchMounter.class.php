<?
class SearchMounter {
	
	private static $entityNameCollection = array();
	private static $adapterCollection = array();
	
	/**
	 * @return AdapterSearchMounterInterface
	 */
	public static function getAdapter($tableName){
		if( !array_key_exists($tableName, self::$adapterCollection) ){				
			self::$adapterCollection[$tableName] = Config::getAdapterSearchMounter( self::getEntityName($tableName) );
		}
		return self::$adapterCollection[$tableName];
	}
	
	public static function getEntityName($tableName){
		if( !array_key_exists($tableName, self::$entityNameCollection) ){
			
			$nameClass = preg_replace('/^(tb_)/', '', $tableName);
			$nameClass = preg_replace('/(_)+/', ' ', $nameClass);
			$nameClass = ucwords($nameClass);
			$nameClass = preg_replace('/( )+/', '', $nameClass);
			
			self::$entityNameCollection[$tableName] = $nameClass;
		}
		return self::$entityNameCollection[$tableName];
	}
	
	/**
	 * @see AdapterSearchMounterInterface::MounterByComparer()
	 */
	public static function MounterByComparer($tableName, $attributeComparer, $searchComparer, $value) {
		return self::getAdapter($tableName)->MounterByComparer($tableName, $attributeComparer, $searchComparer, $value);
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByComparerOrder()
	 */
	public static function MounterByComparerOrder($tableName, $attributeComparer, $searchComparer, $value, $attributeOrder, $searchOrder) {
		return self::getAdapter($tableName)->MounterByComparerOrder($tableName, $attributeComparer, $searchComparer, $value, $attributeOrder, $searchOrder);
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByOrder()
	 */
	public static function MounterByOrder($tableName, $attributeOrder, $searchOrder) {
		return self::getAdapter($tableName)->MounterByOrder($tableName, $attributeOrder, $searchOrder);
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryComparerGroupOrder()
	 */
	public static function MounterByQueryComparerGroupOrder($tableName, array $searchQueryComparerGroupCollection, array $searchQueryOrderCollection = array()) {
		return self::getAdapter($tableName)->MounterByQueryComparerGroupOrder($tableName, $searchQueryComparerGroupCollection, $searchQueryOrderCollection);
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryComparerOrder()
	 */
	public static function MounterByQueryComparerOrder($tableName, array $searchQueryComparerCollection, array $searchQueryOrderCollection = array()) {
		return self::getAdapter($tableName)->MounterByQueryComparerOrder($tableName, $searchQueryComparerCollection, $searchQueryOrderCollection);
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryCount()
	 */
	public static function MounterByQueryCount($tableName, array $searchQueryComparerCollection) {
		return self::getAdapter($tableName)->MounterByQueryCount($tableName, $searchQueryComparerCollection);
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryCountGroup()
	 */
	public static function MounterByQueryCountGroup($tableName, array $searchQueryComparerGroupCollection) {
		return self::getAdapter($tableName)->MounterByQueryCountGroup($tableName, $searchQueryComparerGroupCollection);
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryLimit()
	 */
	public static function MounterByQueryLimit($tableName, array $searchQueryComparerCollection, array $searchQueryOrderCollection, $limitStart, $limitCount) {
		return self::getAdapter($tableName)->MounterByQueryLimit($tableName, $searchQueryComparerCollection, $searchQueryOrderCollection, $limitStart, $limitCount);
	}

	/**
	 * @see AdapterSearchMounterInterface::MounterByQueryLimitGroup()
	 */
	public static function MounterByQueryLimitGroup($tableName, array $searchQueryComparerGroupCollection, array $searchQueryOrderCollection, $limitStart, $limitCount) {
		return self::getAdapter($tableName)->MounterByQueryLimitGroup($tableName, $searchQueryComparerGroupCollection, $searchQueryOrderCollection, $limitStart, $limitCount);
	}

	/**
	 * @see AdapterSearchMounterInterface::ValidateAndMounter()
	 */
	public static function ValidateAndMounter($tableName, $attributeComparer = null, $searchComparer = null, $value = null, $attributeOrder = null, $searchOrder = null) {
		return self::getAdapter($tableName)->ValidateAndMounter($tableName, $attributeComparer, $searchComparer, $value, $attributeOrder, $searchOrder);
	}
	
	/**
	 * @see AdapterSearchMounterInterface::Query()
	 */
	public static function Query($tableName, array $searchQueryComparerCollection=array(), array $searchQueryOrderCollection=array(), $limitStart=0, $limitCount=0) {
		return self::getAdapter($tableName)->Query($tableName, $searchQueryComparerCollection, $searchQueryOrderCollection, $limitStart, $limitCount);
	}
	
	/**
	 * @see AdapterSearchMounterInterface::Count()
	 */
	public static function Count($tableName, array $searchQueryComparerCollection=array()) {
		return self::getAdapter($tableName)->Count($tableName, $searchQueryComparerCollection);
	}
	
}
?>