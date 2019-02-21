<?php

class AdapterSearchQueryPDO implements AdapterSearchQueryInterface {
	
	/**
	 * @var AdapterServicePDO
	 */
	protected $adapterService;
	
	public function __construct(AdapterServicePDO $adapterService){
		$this->adapterService = $adapterService;
	}
	
	/**
	 * @see AdapterSearchQueryInterface::count()
	 * @return int
	 */
	public function count($query) {
		return $this->adapterService->count($query);
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