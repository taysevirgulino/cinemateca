<?php
class AdapterServiceMongo implements AdapterServiceInterface {
	
	/**
	 * @var EntityInterface
	 */
	protected $objectEntity;
	protected $stringConnnection;
	protected $optionsConnection;
	protected $databaseName;
	protected $connection = null;
	protected $db = null;
	protected $collection = array();
	protected $adapterSearchQuery = null;
	
	function __construct($stringConnnection, array $optionsConnection, $databaseName) {
		$this->stringConnnection = $stringConnnection;
		$this->optionsConnection = $optionsConnection;
		$this->databaseName = $databaseName;
	}
	
	/**
	 * @see AdapterServiceInterface::setEntity()
	 */
	public function setEntity(EntityInterface $objectEntity) {
		$this->objectEntity = $objectEntity;
	}
	
	/**
	 * @return MongoClient
	 */
	public function getConnection() {
		if( null === $this->connection )
		{
			$this->connection = new MongoClient($this->stringConnnection, $this->optionsConnection);
		}
		return $this->connection;
	}
	
	/**
	 * @return MongoDB
	 */
	public function getDb() {
		if( null === $this->db )
		{
			$this->db = $this->getConnection()->selectDB($this->databaseName);
		}
		return $this->db;
	}
	
	/**
	 * @return MongoCollection
	 */
	public function getCollection() {
		$table = $this->objectEntity->getTableName();
		if( !array_key_exists($table, $this->collection) )
		{
			$this->collection[$table] = $this->getDb()->selectCollection($table);
		}
		return $this->collection[$table];
	}
	
	/**
	 * @see AdapterServiceInterface::buscar()
	 * @return bool
	 */
	public function buscar($query = array()) {
		
		if( !is_array($query) ){
			return false;
		}
		
		try {
			
			/*
			 * SearchMounter
			*/
			if( array_key_exists('__query', $query) ){
				$query = $query['__query'];
			}
			
			$keys = $this->objectEntity->getAttributes();
			$document = $this->getCollection()->findOne($query, $keys);
				
			if(null != $document){
		
				foreach ($keys as $key){
					if( is_object($document[$key]) ){
						if( get_class($document[$key]) == "MongoDate"){
							$document[$key] = date('Y-m-d H:i:s', $document[$key]->sec);
						}
					}
					if( is_string( $document[$key] ) ){
						$document[$key] = utf8_decode( $document[$key] );
					}
				}
		
				$this->objectEntity->_setData( $document );
		
				return true;
			}
		
		} catch (MongoException $e) {
			echo $e->getMessage();
		}
		
		return false;
	}

	/**
	 * @see AdapterServiceInterface::buscar()
	 * @return bool
	 */
	public function buscarTipo($tipo, $valor) {
		
		$query = array();
		$valor = ( (is_string($valor)) ? utf8_encode($valor) : $valor );
		$attributes = $this->objectEntity->toArray();
		$keys = array_keys($attributes);
		
		switch ( $tipo ){
			case 1 : {
				if( count($keys) >=1 ){
					$query = array( 
						$keys[0] => $valor
					);
				}
			}break;
			case 2 : {
				if( count($keys) >=2 ){
					$query = array( 
						$keys[1] => $this->objectEntity->__get( $keys[1] )
					);
				}
			}break;
			case 3 : {
				for ($i = 2; $i < count($keys); $i++) {
					$value = $this->objectEntity->__get( $keys[$i] );
					$value = ((is_string($value)) ? utf8_encode($value) : $value );
					$query[] = array(
						$keys[$i] => $value
					);
				}
			}break;
			case 4 : {
				$query = $valor;
			}break;
		}
		
		return $this->buscar($query);
	}

	/**
	 * @see AdapterServiceInterface::buscarAttribute()
	 * @return bool
	 */
	public function buscarAttribute($attributeFieldNameComparer, $value, $searchComparer = null) {
		
		$document = $this->objectEntity->toArray();
		if( !array_key_exists($attributeFieldNameComparer, $document) ){
			return false;
		}
		$searchComparer = (($searchComparer==null) ? SearchComparer::Igual() : $searchComparer );
		$query = SearchComparerMongo::Mounter($attributeFieldNameComparer, $searchComparer, $value);
		
		return $this->buscar($query);
	}

	/**
	 * @param array
	 * @return array
	 */
	protected function convertSort($sort){
		if( is_array($sort) && (count($sort)>0) ){
			$keys = array_keys($sort);
			if( is_numeric($keys[0]) ){
				$new = array();
				foreach ($sort as $value) {
					$keys = array_keys($value);
					foreach ($keys as $key) {
						$new[ $key ] = $value[$key];
					}
				}
				return $new;
			}
			return $sort;
		}
		return null;
	}
	
	/**
	 * @see AdapterServiceInterface::consultar()
	 * @return array
	 */
	public function consultar($query = null, $sort = null, $offset = null, $limit = null) {
		
		if( !is_array($query) ){
			$query = array();
		}
		
		try {
			
			/*
			 * SearchMounter
			 */
			if( array_key_exists('__limit', $query) ){
				$limit = $query['__limit'];
			}
			if( array_key_exists('__offset', $query) ){
				$offset = $query['__offset'];
			}
			if( array_key_exists('__sort', $query) ){
				$sort = $query['__sort'];
			}
			if( array_key_exists('__query', $query) ){
				$query = $query['__query'];
			}
			
			$keys = $this->objectEntity->getAttributes();
			$cursor = $this->getCollection()->find($query, $keys);
			
			$sort = $this->convertSort($sort);
			if( is_array($sort) ){
				$cursor->sort($sort);
			}
			
			if(null != $offset){
				$cursor->skip( intval($offset) );
			}
			
			if(null != $limit){
				$cursor->limit( intval($limit) );
			}
			
			$objects = array();	
			foreach ($cursor as $document) {
				$keys = array_keys($document);
				foreach ($keys as $key){
					if( is_object($document[$key]) ){
						if( get_class($document[$key]) == "MongoDate"){
							$document[$key] = date('Y-m-d H:i:s', $document[$key]->sec);
						}
					}
					if( is_string( $document[$key] ) ){
						$document[$key] = utf8_decode( $document[$key] );
					}
				}
				$entity = $this->objectEntity->getEntityName();
				$object = new $entity();
				$object->_setData( $document );
		
				$objects[] = $object;
			}
				
			return $objects;
		
		} catch (MongoException $e) {
			echo $e->getMessage();
		}
		
		return array();
	}

	/**
	 * @see AdapterServiceInterface::consultar()
	 * @return array
	 */
	public function consultarTipo($tipo, $valor) {
		
		$query = array();
		$valor = ( (is_string($valor)) ? utf8_encode($valor) : $valor );
		$attributes = $this->objectEntity->toArray();
		$keys = array_keys($attributes);
		
		switch ( $tipo ){
			case 1 : {
				if( array_key_exists('ide_origem', $keys) ){
					$query = array( 
						'ide_origem' => $this->objectEntity->__get( 'ide_origem' )
					);
				}
			}break;
			case 2 : { }break;
			case 3 : {
				$query = $valor;
			}break;
		}

		return $this->consultar($query);
	}

	/**
	 * @see AdapterServiceInterface::consultarAttribute()
	 * @return array
	 */
	public function consultarAttribute($attributeFieldNameComparer = null, $value = null, $searchComparer = null, $attributeFieldNameOrder = null, $searchOrder = null) {
		
		$query = array();
		if( ($attributeFieldNameComparer != null) && ($value != null) ){
			$searchComparer = (($searchComparer==null) ? SearchComparer::Igual() : $searchComparer );
			$query = SearchComparerMongo::Mounter($attributeFieldNameComparer, $searchComparer, $value);
		}
		
		$sort = null;
		if( $attributeFieldNameOrder != null ){
			$sort = array(
				$attributeFieldNameOrder => (($searchOrder==null) ? 1 : (($searchOrder == SearchOrder::Crescente()) ? 1 : -1 ) )
			);
		}
		
		return $this->consultar($query, $sort);
	}

	/**
	 * @see AdapterServiceInterface::excluir()
	 * @return bool
	 */
	public function excluir() {
		
		$document = $this->objectEntity->toArray();
		$keys = array_keys($document);
		
		$query = array(
			$keys[0] => $this->objectEntity->__get( $keys[0] )
		);
		
		try {
				
			$result = $this->getCollection()->remove($query);
				
			return ($result["ok"] == 1);
				
		} catch (MongoException $e) {
			echo $e->getMessage();
		}
		
		return false;
	}

	/**
	 * @see AdapterServiceInterface::inserir()
	 * @return bool
	 */
	public function inserir() {
		$collection = $this->getCollection();

		/*
		 * COMPATIBILIDADE: ADICIONANDO ID AUTOINCREMENTO
		*/
		$idName = 'id_'.$this->objectEntity->getEntityName();
		$id = intval( $this->objectEntity->__get( $idName ) );
		if($id <= 0){
			$this->objectEntity->__set( $idName, time()+mt_rand(1000000, 9999999) );
		}
		
		/*
		 * ARRAY DADOS
		 */
		$document = $this->objectEntity->toArray();
		
		if( !is_array($document) ){
			return false;
		}
		
		$document = $this->convertAttributes($document);
		
		try {
			
			$result = $collection->insert($document);
			
			return ($result["ok"] == 1);
			
		} catch (MongoException $e) {
			echo $e->getMessage();
		}
		
		return false;
	}

	/**
	 * @param array
	 * @return array
	 */
	protected function convertAttributes(array $document){
		$keys = array_keys($document);
		foreach ($keys as $key){
			$value = $document[$key];
			if( Validacao::isDataHora( $value ) ){
				$value = new MongoDate( strtotime( $value ) );
			}else
			if( is_string( $value ) ){
				if( is_numeric($value) ){
					if( preg_match('/[^0-9]/', $value)){
						$value = floatval($value);
					}else{
						$value = intval($value);
					}
				}else{
					$value = utf8_encode( $value );
				}
			}
			$document[$key] = $value;
		}
		return $document;
	}
	
	/**
	 * @see AdapterServiceInterface::alterar()
	 * @return bool
	 */
	public function alterar(array $newDocument = null) {
		
		$document = ( (is_array($newDocument)) ? $newDocument : $this->objectEntity->toArray() );
		$document = $this->convertAttributes($document);
		
		$attributes = $this->objectEntity->getAttributes();
		$query = array(
			$attributes[0] => $this->objectEntity->__get( $attributes[0] )
		);
		
		try {
				
			$result = $this->getCollection()->update($query, array('$set' => $document));
				
			return ($result["ok"] == 1);
				
		} catch (MongoException $e) {
			echo $e->getMessage();
		}
		
		return false;
	}

	/**
	 * @see AdapterServiceInterface::alterarAtributo()
	 * @return bool
	 */
	public function alterarAtributo($attributeFieldName) {

		$document = array(
			$attributeFieldName => $this->objectEntity->__get( $attributeFieldName )
		);
		
		return $this->alterar( $document );
		
	}
	
	/**
	 * @see AdapterServiceInterface::count()
	 * @return int
	 */
	public function count($query) {
		
		if( array_key_exists('__count', $query) ){
			$query = $query['__count'];
		}else
		if( array_key_exists('__query', $query) ){
			$query = $query['__query'];
		}
		
		try {
				
			$result = $this->getCollection()->count($query);
			
			if( is_int($result) ){
				return $result;
			}
			
		} catch (MongoException $e) {
			echo $e->getMessage();
		}
		
		return 0;
	}



}
?>