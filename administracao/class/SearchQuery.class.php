<?php

class SearchQuery {
	
	/**
	 * @var AdapterSearchQueryInterface
	 */
	protected static $adapterSearchQueryCollection = array();
	
	/**
	 * @return AdapterSearchQueryInterface
	 */
	public static function getAdapterSearchQuery($entityName) {
		if( !array_key_exists($entityName, self::$adapterSearchQueryCollection) ){
			self::$adapterSearchQueryCollection[$entityName] = Config::getAdapterService($entityName)->getAdapterSearchQuery();
		}
		return self::$adapterSearchQueryCollection[$entityName];
	}

	/**
	 * @see AdapterSearchQueryInterface::count()
	 */
	public static function count($entityName, $query) {
		return self::getAdapterSearchQuery($entityName)->count($query);
	}

	/**
	 * @see AdapterSearchQueryInterface::find()
	 */
	public static function find($entityName, $query) {
		return self::getAdapterSearchQuery($entityName)->find($query);
	}

	/**
	 * @see AdapterSearchQueryInterface::findOne()
	 */
	public static function findOne($entityName, $query) {
		return self::getAdapterSearchQuery($entityName)->findOne($query);
	}

	/**
	 * @see AdapterSearchQueryInterface::remove()
	 */
	public static function remove($entityName, $query) {
		return self::getAdapterSearchQuery($entityName)->remove($query);
	}

	
}

?>