<?php

class AdapterServiceFactory {

	private static $adapterServiceCollection = array();
	
	public static function singleton($adapterClassName){
		if( !array_key_exists($adapterClassName, self::$adapterServiceCollection) ){
			self::$adapterServiceCollection[$adapterClassName] = new $adapterClassName();
		}
		return self::$adapterServiceCollection[$adapterClassName];
	}
	
	public static function registerAdapterService( $adapterClassName, $functionRegister, $forceRegister=false){
		if( !array_key_exists($adapterClassName, self::$adapterServiceCollection) || $forceRegister){
			self::$adapterServiceCollection[$adapterClassName] = $functionRegister();
		}
	}
}

?>