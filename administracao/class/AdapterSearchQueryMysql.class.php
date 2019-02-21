<?php

class AdapterSearchQueryMysql implements AdapterSearchQueryInterface {
	
	/**
	 * @var AdapterServiceMysql
	 */
	protected $adapterService;
	
	public function __construct(AdapterServiceMysql $adapterService){
		$this->adapterService = $adapterService;
	}
	
	/**
	 * @see AdapterSearchQueryInterface::count()
	 * @return int 
	 */
	public function count($query) {
		if( empty($query) ){ return 0;} 
			
		$dbq = new dbQuery(); 
		$dbq->consultar($query); 
		$result = 0;
		if( $dbq->registro() ){ 
			$result = intval($dbq->valor("count"));
		}
		$dbq->desconectar();
		
		return $result;
	}

	/**
	 * @see AdapterSearchQueryInterface::find()
	 */
	public function find($query) {
		// TODO Auto-generated method stub
		
	}

	/**
	 * @see AdapterSearchQueryInterface::findOne()
	 */
	public function findOne($query) {
		// TODO Auto-generated method stub
		
	}

	/**
	 * @see AdapterSearchQueryInterface::remove()
	 */
	public function remove($query) {
		// TODO Auto-generated method stub
		
	}

	
}

?>