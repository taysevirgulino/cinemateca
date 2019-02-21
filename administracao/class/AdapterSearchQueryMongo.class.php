<?php

class AdapterSearchQueryMongo implements AdapterSearchQueryInterface {
	
	/**
	 * @var AdapterServiceMongo
	 */
	protected $adapterService;
	
	public function __construct(AdapterServiceMongo $adapterService){
		$this->adapterService = $adapterService;
	}
	
	/**
	 * @see AdapterSearchQueryInterface::count()
	 * @return int
	 */
	public function count($query) {
		return $this->adapterService->getCollection()->count($query);
	}

	/* (non-PHPdoc)
	 * @see AdapterSearchQueryInterface::find()
	 */
	public function find($query) {
		// TODO Auto-generated method stub
		
	}

	/* (non-PHPdoc)
	 * @see AdapterSearchQueryInterface::findOne()
	 */
	public function findOne($query) {
		// TODO Auto-generated method stub
		
	}

	/* (non-PHPdoc)
	 * @see AdapterSearchQueryInterface::remove()
	 */
	public function remove($query) {
		// TODO Auto-generated method stub
		
	}

	
}

?>