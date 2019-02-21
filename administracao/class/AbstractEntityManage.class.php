<?php

class AbstractEntityManage implements EntityManageInterface {
	
	protected static $objectEntityCollection = array();
	
	/**
	 * @param string $name
	 * @param array $arguments
	 */
	public static function __callStatic($name, array $arguments){
		$entity = self::getObjectEntity();
		$entityName = $entity->getEntityName();
		$attributes = $entity->getAttributes();
		
		if( preg_match(sprintf('/^(buscar%1$s)$/', $entityName), $name))
		{
			return self::buscarTipo( $arguments[0], $arguments[1] );
		}else
		if( preg_match(sprintf('/^(buscar%1$sAttribute)$/', $entityName), $name))
		{
			return self::buscarAttribute( $arguments[0], $arguments[1], $arguments[3] );
		}else
		if( preg_match(sprintf('/^(consultar%1$s)$/', $entityName), $name))
		{
			return self::consultarTipo( $arguments[0], $arguments[1] );
		}else
		if( preg_match(sprintf('/^(consultar%1$sAttribute)$/', $entityName), $name))
		{
			return self::consultarAttribute( $arguments[0], $arguments[1], $arguments[2], $arguments[3], $arguments[4] );
		}else
		if( preg_match(sprintf('/^(inserir%1$s)$/', $entityName), $name))
		{
			$data = array();
			for ($i = 0; $i < count($arguments); $i++) {
				$data[ $attributes[$i] ] = $arguments[$i];
			}
			return self::inserir($data);
		}else
		if( preg_match(sprintf('/^(alterar%1$s)$/', $entityName), $name))
		{
			$data = array();
			for ($i = 0; $i < count($arguments); $i++) {
				$data[ $attributes[$i] ] = $arguments[$i];
			}
			return self::alterar($data);
		}else
		if( preg_match('/^(alterarAtributo)/', $name))
		{
			$name = preg_replace('/^(alterarAtributo)+/', '', $name);
			if( method_exists($entity->getEntityAttributeName(), $name))
			{
				$attributeFieldName = "";
				eval(sprintf('$attributeFieldName = %1$s::%2$s();', $entity->getEntityAttributeName(), $name));
				return self::alterarAtributo( $attributeFieldName, $arguments[0], $arguments[1] );
			}
		}else
		if( preg_match(sprintf('/^(excluir%1$s)$/', $entityName), $name))
		{
			return self::excluir($arguments[0]);
		}
		return;
	}

	/**
	 * @return int
	 */
	public static function ultimaPrioridade(){
		$entity = self::getObjectEntity();
		$attributes = $entity->getAttributes();
		if( array_search('prioridade', $attributes) ){
			$orders = array(
				new SearchQueryOrder('prioridade', SearchOrder::Decrescente())
			);
			$itens = self::consultar(
				SearchMounter::MounterByQueryLimit($entity->getTableName(), array(), $orders, 0, 1)
			);
			if( null != $itens ){
				return (intval( $itens[0]['prioridade'] ) + 1);
			}
			return 1;
		}
		$count = self::count(array());
		
		return (intval($count) + 1);
	}
	
	/**
	 * @see AdapterServiceInterface::alterar()
	 * @return bool
	 */
	public static function alterar(array $data) {
		$entity = self::getObjectEntity();
		$entity->_setData($data);
		return $entity->alterar();
	}

	/**
	 * @see AdapterServiceInterface::alterarAtributo()
	 * @return bool
	 */
	public static function alterarAtributo($attributeFieldName, $id, $value) {
		$entity = self::getObjectEntity();
		$attributes = $entity->getAttributes();
		$entity->__set($attributes[0], $id);
		$entity->__set($attributeFieldName, $value);
		return $entity->alterarAtributo($attributeFieldName);
	}

	/**
	 * @see AdapterServiceInterface::buscar()
	 * @return array
	 */
	public static function buscar($query) {
		$entity = self::getObjectEntity();
		if( $entity->buscar($query) ){
			return $entity->toArray();
		}
		return null;
	}

	/**
	 * @see AdapterServiceInterface::buscarAttribute()
	 * @return array
	 */
	public static function buscarAttribute($attributeFieldNameComparer, $value, $searchComparer = null) {
		$entity = self::getObjectEntity();
		if( $entity->buscarAttribute($attributeFieldNameComparer, $value, $searchComparer) ){
			return $entity->toArray();
		}
		return null;
	}

	/**
	 * @see AdapterServiceInterface::buscarTipo()
	 * @return array
	 */
	public static function buscarTipo($tipo, $valor) {
		$entity = self::getObjectEntity();
		if( $entity->buscarTipo($tipo, $valor) ){
			return $entity->toArray();
		}
		return null;
	}

	/**
	 * @see AdapterServiceInterface::consultar()
	 * @return array
	 */
	public static function consultar($query = null, $sort = null, $offset = null, $limit = null) {
		$entity = self::getObjectEntity();
		$objects = $entity->consultar($query, $sort, $offset, $limit);
		if( is_array($objects) ){
			$itens = array();
			foreach ($objects as $object) {
				$itens[] = $object->toArray();
			}
			return $itens;
		}
		return array();
	}

	/**
	 * @see AdapterServiceInterface::consultarAttribute()
	 * @return array
	 */
	public static function consultarAttribute($attributeFieldNameComparer = null, $value = null, $searchComparer = null, $attributeFieldNameOrder = null, $searchOrder = null) {
		$entity = self::getObjectEntity();
		$objects = $entity->consultarAttribute($attributeFieldNameComparer, $value, $searchComparer, $attributeFieldNameOrder, $searchOrder);
		if( is_array($objects) ){
			$itens = array();
			foreach ($objects as $object) {
				$itens[] = $object->toArray();
			}
			return $itens;
		}
		return array();
	}
	
	/**
	 * @see AdapterServiceInterface::consultar()
	 * @return array
	 */
	public static function consultarSearchQuery(array $searchQueryComparerCollection=array(), array $searchQueryOrderCollection=array(), $limitStart=0, $limitCount=0) {
		$entity = self::getObjectEntity();
		$objects = $entity->consultarSearchQuery($searchQueryComparerCollection, $searchQueryOrderCollection, $limitStart, $limitCount);
		if( is_array($objects) ){
			$itens = array();
			foreach ($objects as $object) {
				$itens[] = $object->toArray();
			}
			return $itens;
		}
		return array();
	}

	/**
	 * @see AdapterServiceInterface::consultarTipo()
	 * @return array
	 */
	public static function consultarTipo($tipo, $valor) {
		$entity = self::getObjectEntity();
		$objects = $entity->consultarTipo($tipo, $valor);
		if( is_array($objects) ){
			$itens = array();
			foreach ($objects as $object) {
				$itens[] = $object->toArray();
			}
			return $itens;
		}
		return array();
	}

	/**
	 * @see AdapterServiceInterface::excluir()
	 * @return bool
	 */
	public static function excluir($id) {
		$entity = self::getObjectEntity();
		$attributes = $entity->getAttributes();
		$entity->__set($attributes[0], $id);
		return $entity->excluir();
	}

	/**
	 * @see AdapterServiceInterface::inserir()
	 * @return bool
	 */
	public static function inserir(array $data) {
		$entity = self::getObjectEntity();
		$entity->_setData($data);
		return $entity->inserir();
	}
	
	/**
	 * @see AdapterServiceInterface::count()
	 * @return bool
	 */
	public static function count($query) {
		$entity = self::getObjectEntity();
		return $entity->count($query);
	}

	/**
	 * @return EntityInterface
	 */
	public static function getObjectEntity() {
		$className = self::getEntityName();
		if( !array_key_exists($className, self::$objectEntityCollection) ){
			self::$objectEntityCollection[$className]= new $className();
		}
		return self::$objectEntityCollection[$className];
	}
	
	/**
	 * @return the $entityName
	 */
	public static function getEntityName() {
		return preg_replace('/(Manage[0-9]?(Partial)?)$/', '', get_called_class());
	}
	
}

?>