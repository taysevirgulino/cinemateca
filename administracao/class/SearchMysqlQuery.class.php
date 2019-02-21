<?
	class SearchMysqlQuery{
		public static function CountBySql($sql){
			if( empty($sql) ){ return 0;} 
			
			$dbq = new dbQuery(); 
			$dbq->consultar($sql); 
			$result = 0;
			if( $dbq->registro() ){ 
				$result = intval($dbq->valor("count"));
			} 
			 
			$dbq->desconectar(); unset($dbq); 
			
			return $result;
		}
	}
?>