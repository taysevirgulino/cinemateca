<?php
class AdapterSearchMounterFactory {
	
	private static $adapterSearchMounterCollection = array();
	
	public static function singleton($adapterClassName){
		if( !array_key_exists($adapterClassName, self::$adapterSearchMounterCollection) ){
			self::$adapterSearchMounterCollection[$adapterClassName] = new $adapterClassName();
		}
		return self::$adapterSearchMounterCollection[$adapterClassName];
	}
	
}

?>