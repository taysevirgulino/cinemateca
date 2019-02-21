<?php

class AbstractEntityCollection extends ArrayObject {
	
	protected $valueType;
	
	/**
	 * @see ArrayObject::__construct()
	 */
	public function __construct($itensCollection=array()) {
		$this->valueType = preg_replace('/(Collection)$/', '', get_called_class());
		if(!class_exists($this->valueType)){
			throw new InvalidArgumentException('Classe nao existe: '.$this->valueType);
		}
		return parent::__construct($itensCollection);
	}
	
	/**
	 * @param EntityInterface
	 * @return boolean
	 */
	public function isValidType(EntityInterface $value){
		return $value instanceof $this->valueType;
	}
	
	/**
	 * @param EntityInterface
	 * @see ArrayObject::append()
	 */
	public function append(EntityInterface $value) {
		if(!$this->isValidType($value)){
			throw new InvalidArgumentException('Trying to add a value of wrong type');
		}
		return parent::append($value);
	}

	/**
	 * @see ArrayObject::asort()
	 */
	public function asort() {
		return parent::asort();
	}

	/**
	 * @see ArrayObject::count()
	 */
	public function count() {
		return parent::count();
	}

	/**
	 * @see ArrayObject::exchangeArray()
	 */
	public function exchangeArray($input) {
		return parent::exchangeArray($input);
	}

	/**
	 * @see ArrayObject::getArrayCopy()
	 */
	public function getArrayCopy() {
		return parent::getArrayCopy();
	}

	/**
	 * @see ArrayObject::getFlags()
	 */
	public function getFlags() {
		return parent::getFlags();
	}

	/**
	 * @see ArrayObject::getIterator()
	 */
	public function getIterator() {
		return parent::getIterator();
	}

	/**
	 * @see ArrayObject::getIteratorClass()
	 */
	public function getIteratorClass() {
		return parent::getIteratorClass();
	}

	/**
	 * @see ArrayObject::ksort()
	 */
	public function ksort() {
		return parent::ksort();
	}

	/**
	 * @see ArrayObject::natcasesort()
	 */
	public function natcasesort() {
		return parent::natcasesort();
	}

	/**
	 * @see ArrayObject::natsort()
	 */
	public function natsort() {
		return parent::natsort();
	}

	/**
	 * @see ArrayObject::offsetExists()
	 */
	public function offsetExists($index) {
		return parent::offsetExists($index);
	}

	/**
	 * @see ArrayObject::offsetGet()
	 */
	public function offsetGet($index) {
		return parent::offsetGet($index);
	}

	/**
	 * @see ArrayObject::offsetSet()
	 */
	public function offsetSet($index, $newval) {
		return parent::offsetSet($index, $newval);
	}

	/**
	 * @see ArrayObject::offsetUnset()
	 */
	public function offsetUnset($index) {
		return parent::offsetUnset($index);
	}

	/**
	 * @see ArrayObject::serialize()
	 */
	public function serialize() {
		return parent::serialize();
	}

	/**
	 * @see ArrayObject::setFlags()
	 */
	public function setFlags($flags) {
		return parent::setFlags($flags);
	}

	/**
	 * @see ArrayObject::setIteratorClass()
	 */
	public function setIteratorClass($iterator_class) {
		return parent::setIteratorClass($iterator_class);
	}

	/**
	 * @see ArrayObject::uasort()
	 */
	public function uasort($cmp_function) {
		return parent::uasort($cmp_function);
	}

	/**
	 * @see ArrayObject::uksort()
	 */
	public function uksort($cmp_function) {
		return parent::uksort($cmp_function);
	}

	/**
	 * @see ArrayObject::unserialize()
	 */
	public function unserialize($serialized) {
		return parent::unserialize($serialized);
	}

}

?>