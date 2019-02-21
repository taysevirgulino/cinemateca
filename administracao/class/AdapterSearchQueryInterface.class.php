<?php

interface AdapterSearchQueryInterface {
	public function __construct(AdapterServiceInterface $adapterService = null);
	public function count($query);
	public function find($query);
	public function findOne($query);
	public function remove($query);
}

?>