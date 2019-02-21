<?php

abstract class AbstractEntity {
	
	/**
	 * @var AdapterServiceInterface
	 */
	protected $adapterService;
	protected $entityName;
	protected $entityAttributeName;
	protected $tableName = null;
	protected $attributes = null;
	
	/**
	 * @param array $data
	 * @param AdapterServiceInterface $adapterService
	 * @return AbstractEntity
	 */
	function __construct(AdapterServiceInterface $adapterService = null, array $data = null) 
	{
		$this->setEntityName( get_called_class() );
		$this->setEntityAttributeName( $this->entityName.'Attribute' );
				
		if(null == $adapterService)
		{
			$this->setAdapterService( Config::getAdapterService( $this->entityName ) );
		}
		
		if(null != $data){
			$this->_setData( $data );
		}
		
		return $this;
	}
	
	/**
	 * @param string $name
	 * @param array $arguments
	 */
	public function __call($name, array $arguments)
	{
		if( preg_match(sprintf('/^(buscar%1$s)$/', $this->entityName), $name))
		{
			return $this->buscarTipo( $arguments[0], $arguments[1] );
		}else
		if( preg_match(sprintf('/^(buscar%1$sAttribute)$/', $this->entityName), $name))
		{
			return $this->buscarAttribute( $arguments[0], $arguments[1], $arguments[3] );
		}else
		if( preg_match(sprintf('/^(consultar%1$s)$/', $this->entityName), $name))
		{
			return $this->consultarTipo( $arguments[0], $arguments[1] );
		}else
		if( preg_match(sprintf('/^(consultar%1$sAttribute)$/', $this->entityName), $name))
		{
			return $this->consultarAttribute( $arguments[0], $arguments[1], $arguments[2], $arguments[3], $arguments[4] );
		}else
		if( preg_match(sprintf('/^(inserir%1$s)$/', $this->entityName), $name))
		{
			return $this->inserir();
		}else
		if( preg_match(sprintf('/^(alterar%1$s)$/', $this->entityName), $name))
		{
			return $this->alterar();
		}else
		if( preg_match('/^(alterarAtributo)/', $name))
		{
			$name = preg_replace('/^(alterarAtributo)+/', '', $name);
			
			if( method_exists($this->entityAttributeName, $name))
			{
				$attributeFieldName = "";
				eval(sprintf('$attributeFieldName = %1$s::%2$s();', $this->entityAttributeName, $name));
				return $this->alterarAtributo( $attributeFieldName );
			}
		}else
		if( preg_match(sprintf('/^(excluir%1$s)$/', $this->entityName), $name))
		{
			return $this->excluir();
		}else
		if( preg_match(sprintf('/^(get%1$s)$/', $this->entityName), $name))
		{
			return $this;
		}else
		if( preg_match('/^(tratarString)$/', $name))
		{
			return str_ireplace("'", "''", $arguments[0]); 
		}
		return;
	}
	
	/**
	 * @param unknown $data
	 * @return void
	 */
	public function _setData(array $data)
	{
		foreach ($data as $key => $value) {
			$this->__set($key, $value);
		}
	}
	
	/**
	 * @param unknown $name
	 * @param unknown $value
	 * @return void
	 */
	public function __set($name, $value)
	{
		$aux = explode("_", $name);
		$nameMethod = "";
		for ($i = 0; $i < count($aux); $i++){
			$nameMethod = $nameMethod."".ucfirst( $aux[$i] );
		}
		$setMethod = 'set' . $nameMethod;
		if (method_exists($this, $setMethod)) {
			$this->$setMethod($value);
		} else {
			if(property_exists($this, $name)){
				$this->$name = $value;
			}
		}
	}
	
	/**
	 * @param unknown $name
	 * @return unknown
	 */
	public function __get($name)
	{
		$aux = explode("_", $name);
		$nameMethod = "";
		for ($i = 0; $i < count($aux); $i++){
			$nameMethod = $nameMethod."".ucfirst( $aux[$i] );
		}
		$getMethod = 'get' . $nameMethod;
		if (method_exists($this, $getMethod)) {
			return $this->$getMethod();
		}
		if(property_exists($this, $name)){
			return $this->$name;
		}
		return null;
	}
	
	/**
	 * @return the $entityName
	 */
	public function getEntityName() {
		return $this->entityName;
	}

	/**
	 * @param string $entityName
	 */
	public function setEntityName($entityName) {
		$this->entityName = $entityName;
	}

	/**
	 * @return the $entityAttributeName
	 */
	public function getEntityAttributeName() {
		return $this->entityAttributeName;
	}

	/**
	 * @param string $entityAttributeName
	 */
	public function setEntityAttributeName($entityAttributeName) {
		$this->entityAttributeName = $entityAttributeName;
	}
	
	/**
	 * metodo nao implementado
	 * @param EntityInterface $objectEntity
	 */
	public function setEntity(EntityInterface $objectEntity) {}
	
	/**
	 * @return string
	 */
	public function __toString()
	{
		return json_encode($this->toArray());
	}
	
	/**
	 * @return array
	 */
	public function getAttributes(){
		if(null === $this->attributes){
			$attributes = array();
			if( method_exists($this->getEntityAttributeName(), '_GetKeys'))
			{
				eval(sprintf('$attributes = %1$s::_GetKeys();', $this->getEntityAttributeName()));
			}else
			if( method_exists($this->getEntityAttributeName(), '_GetAllAttributes'))
			{
				$aux = array();
				eval(sprintf('$aux = %1$s::_GetAllAttributes();', $this->getEntityAttributeName()));
				foreach ($aux as $item) {
					$attributes[] = $item["value"];
				}
			}
			$this->attributes = $attributes;	
		}
		return $this->attributes;
	}
	
	/**
	 * @return string
	 */
	public function getTableName(){
		if(null === $this->tableName){
			$tableName = '';
			if( method_exists($this->getEntityAttributeName(), '_Table'))
			{
				eval(sprintf('$tableName = %1$s::_Table();', $this->getEntityAttributeName()));
			}else{
				$tableName = $this->getEntityName();
			}
			$this->tableName = $tableName;	
		}
		return $this->tableName;
	}
	
	/**
	 * @return array
	 */
	public function toArray()
	{
		$attributes = $this->getAttributes();
		if( count($attributes) > 0 )
		{
			$dados = array();
			foreach ($attributes as $attribute) {
				$dados[ $attribute ] = $this->__get( $attribute );
			}
			return $dados;
		}
		
		$dados = get_object_vars($this);
        foreach ($dados as $k => $item) {
            if (is_object($item) && isset($item->id)) {
                $dados[$k] = $item->id;
            } else {
                $dados[$k] = $item;
            }

        }
        return $dados;
	}
	
	/**
	 * @return AdapterServiceInterface
	 */
	public function getAdapterService() {
		$this->adapterService->setEntity($this);
		return $this->adapterService;
	}

	/**
	 * @param AdapterServiceInterface $adapterService
	 */
	public function setAdapterService(AdapterServiceInterface $adapterService) {
		$this->adapterService = $adapterService;
		$this->adapterService->setEntity($this);
	}

	/**
	 * @see AdapterServiceInterface::alterar()
	 * @return bool
	 */
	public function alterar() {
		return $this->getAdapterService()->alterar();
	}

	/**
	 * @see AdapterServiceInterface::alterarAtributo()
	 * @return bool
	 */
	public function alterarAtributo($attributeFieldName) {
		return $this->getAdapterService()->alterarAtributo($attributeFieldName);
	}

	/**
	 * @see AdapterServiceInterface::buscar()
	 * @return bool
	 */
	public function buscar($query) {
		return $this->getAdapterService()->buscar($query);
	}
	
	/**
	 * @see AdapterServiceInterface::buscarTipo()
	 * @return bool
	 */
	public function buscarTipo($tipo, $valor) {
		return $this->getAdapterService()->buscarTipo($tipo, $valor);
	}

	/**
	 * @see AdapterServiceInterface::buscarAttribute()
	 * @return bool
	 */
	public function buscarAttribute($attributeFieldNameComparer, $value, $searchComparer = null) {
		return $this->getAdapterService()->buscarAttribute($attributeFieldNameComparer, $value, $searchComparer);
	}

	/**
	 * @see AdapterServiceInterface::consultar()
	 * @return array
	 */
	public function consultar($query = null, $sort = null, $offset = null, $limit = null) {
		return $this->getAdapterService()->consultar($query, $sort, $offset, $limit);
	}
	
	/**
	 * @see AdapterServiceInterface::consultarTipo()
	 * @return array
	 */
	public function consultarTipo($tipo, $valor) {
		return $this->getAdapterService()->consultarTipo($tipo, $valor);
	}

	/**
	 * @see AdapterServiceInterface::consultarAttribute()
	 * @return array
	 */
	public function consultarAttribute($attributeFieldNameComparer = null, $value = null, $searchComparer = null, $attributeFieldNameOrder = null, $searchOrder = null) {
		return $this->getAdapterService()->consultarAttribute($attributeFieldNameComparer, $value, $searchComparer, $attributeFieldNameOrder, $searchOrder);
	}
	
	/**
	 * @see AdapterServiceInterface::consultarAttribute()
	 * @return array
	 */
	public function consultarSearchQuery(array $searchQueryComparerCollection=array(), array $searchQueryOrderCollection=array(), $limitStart=0, $limitCount=0) {
		return $this->getAdapterService()->consultar(
			SearchMounter::Query($this->getTableName(), $searchQueryComparerCollection, $searchQueryOrderCollection, $limitStart, $limitCount)
		);
	}

	/**
	 * @see AdapterServiceInterface::excluir()
	 * @return bool
	 */
	public function excluir() {
		return $this->getAdapterService()->excluir();
	}

	/**
	 * @see AdapterServiceInterface::inserir()
	 * @return bool
	 */
	public function inserir() {
		return $this->getAdapterService()->inserir();
	}
	
	/**
	 * @see AdapterServiceInterface::count()
	 * @return int
	 */
	public function count($query) {
		return $this->getAdapterService()->count($query);
	}
	
}

?>