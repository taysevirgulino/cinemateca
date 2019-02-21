<?php
interface EntityInterface extends AdapterServiceInterface {
	public function toArray();
	public function getAttributes();
	public function _setData(array $data);
	public function getEntityName();
	public function getEntityAttributeName();
	public function getTableName();
}
?>