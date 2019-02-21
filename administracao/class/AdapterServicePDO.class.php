<?php
class AdapterServicePDO implements AdapterServiceInterface {
	
	/**
	 * @var EntityInterface
	 */
	protected $objectEntity;
	protected $stringConnnection;
	protected $optionsConnection;
	protected $username;
	protected $password;
	protected $connection = null;
	protected $db = null;
	protected $collection = array();
	protected $adapterSearchQuery = null;
	
	function __construct($stringConnnection, $username, $password, array $optionsConnection) {
		$this->stringConnnection = $stringConnnection;
		$this->username = $username;
		$this->password = $password;
		$this->optionsConnection = $optionsConnection;
	}
	
	/**
	 * @see AdapterServiceInterface::setEntity()
	 */
	public function setEntity(EntityInterface $objectEntity) {
		$this->objectEntity = $objectEntity;
	}
	
	/**
	 * @return PDO
	 */
	public function getConnection() {
		if( null === $this->connection )
		{
			$this->connection = new PDO($this->stringConnnection, $this->username, $this->password, $this->optionsConnection);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		return $this->connection;
	}
	
	/**
	 * @see AdapterServiceInterface::buscar()
	 * @return bool
	 * AdapterServiceInterface::buscar( array("statement" => string, "parameters" => array) )
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
			
		    if( array_key_exists('__sql', $query) ){
		        $sql = $query['__sql'];
		    }else{
    			if( (!array_key_exists("statement", $query)) || (!array_key_exists("parameters", $query)) ){
    			    return false;
    			}
    						 
    			$sql = sprintf(
    			    "SELECT * FROM %s WHERE %s",
    			    $this->objectEntity->getTableName(),
    			    $query["statement"]
    			);
		    }
		    
			$prepare = $this->getConnection()->prepare($sql);
			
			$result = $prepare->execute( $query["parameters"] );
			
			$document = $prepare->fetch(PDO::FETCH_ASSOC);
			
			if(null != $document){
		
				$this->objectEntity->_setData( $document );
		
				return true;
			}
		
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		
		return false;
	}

	/**
	 * @see AdapterServiceInterface::buscar()
	 * @return bool
	 */
	public function buscarTipo($tipo, $valor) {
		
		$query = array("statement" => '', "parameters" => array());
		$document = $this->objectEntity->toArray();
		$keys = array_keys($document);
		
		switch ( $tipo ){
			case 1 : {
				if( count($keys) >=1 ){
				    $query = SearchComparerPDO::Mounter($keys[0], SearchComparer::Igual(), $valor);
				}
			}break;
			case 2 : {
				if( count($keys) >=2 ){
				    $query = SearchComparerPDO::Mounter($keys[1], SearchComparer::Igual(),  $this->objectEntity->__get( $keys[1] ));
				}
			}break;
			case 3 : {
			    $statement = "";
			    $parameters = array();
			    
				for ($i = 2; $i < count($keys); $i++) {
				    $aux = SearchComparerPDO::Mounter($keys[$i], SearchComparer::Igual(), $this->objectEntity->__get( $keys[$i] ));
				    $statement .= $aux['statement']." AND ";
				    $parameters = array_merge($parameters, $aux['parameters']);
				}
				$statement = preg_replace("/(.AND.)+$/", "", $statement);
				
				$query = array("statement" => $statement, "parameters" => $parameters);
				
			}break;
			case 4 : {
				$query = array("statement" => $valor, "parameters" => array());
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
		$query = SearchComparerPDO::Mounter($attributeFieldNameComparer, $searchComparer, $value);
		
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
			
			$parameters = array();
			if( array_key_exists('__sql', $query) ){
				$sql = $query['__sql'];
			}else{
			
    			$sqlWhere = "";
    		    if( array_key_exists("statement", $query) && array_key_exists("parameters", $query) ){
    			   $sqlWhere = sprintf(
                        "WHERE %s",
                        $query["statement"]
                   );
    			   $parameters = $query["parameters"];
    			}
    			
    			$sqlSort = "";
    			if( is_array($sort) ){
    			    if( count($sort) > 0 ){
    			        $sqlSort = "ORDER BY ";
    			        foreach ($sort as $key => $value) {
    			            $sqlSort .= "$key $value,";
    			        }
    			        $sqlSort = preg_replace("/(,)+$/", "", $sqlSort);
    			    }
    			}
    			
    			$sqlLimit = "";
    			if(null != $limit){
    			    $sqlLimit = sprintf(
                        "LIMIT %s,%s",
                        intval($offset),
    			        intval($limit)
                   );
    			}
    			
    			$sql = trim(sprintf(
    			    "SELECT * FROM %s %s %s %s",
    			    $this->objectEntity->getTableName(),
    			    $sqlWhere,
    			    $sqlSort,
    			    $sqlLimit
    			));
			
			}
			
			$prepare = $this->getConnection()->prepare($sql);
				
			$result = $prepare->execute( $parameters );
				
			$cursor = $prepare->fetchAll(PDO::FETCH_ASSOC);
			
			$objects = array();	
			foreach ($cursor as $document) {
				
				$entity = $this->objectEntity->getEntityName();
				$object = new $entity();
				$object->_setData( $document );
		
				$objects[] = $object;
			}
				
			return $objects;
		
		} catch (PDOException $e) {
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
		$attributes = $this->objectEntity->toArray();
		$keys = array_keys($attributes);
		
		switch ( $tipo ){
			case 1 : {
				if( array_key_exists('ide_origem', $keys) ){
				    $query = SearchComparerPDO::Mounter('ide_origem', SearchComparer::Igual(), $this->objectEntity->__get( 'ide_origem'));
				}
			}break;
			case 2 : { }break;
			case 3 : {
				$query = array("statement" => $valor, "parameters" => array());
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
			$query = SearchComparerPDO::Mounter($attributeFieldNameComparer, $searchComparer, $value);
		}
		
		$sort = null;
		if( $attributeFieldNameOrder != null ){
			$sort = array(
				$attributeFieldNameOrder => (($searchOrder==null) ? SearchOrder::Crescente() : $searchOrder )
			);
		}
		
		return $this->consultar($query, $sort);
	}

	/**
	 * @see AdapterServiceInterface::excluir()
	 * @return bool
	 */
	public function excluir() {
		
	    $attributes = $this->objectEntity->getAttributes();
	     
	    $sqlWhere =  $attributes[0]."=:".$attributes[0];
	    
	    $sql = sprintf(
	        "DELETE FROM %s WHERE %s",
	        $this->objectEntity->getTableName(),
	        $sqlWhere
	    );
	    
	    $document = $this->objectEntity->toArray();
	    if( !is_array($document) ){
	        return false;
	    }
	    $document = $this->convertAttributes($document);
	     
	    try {
	    
	        $prepare = $this->getConnection()->prepare($sql);
	         
	        $prepare->bindValue(":".$attributes[0], $document[ $attributes[0] ]);
	         
	        return $prepare->execute();
	         
	    } catch (PDOException $e) {
	        echo $e->getMessage();
	    }
	     
	    return false;
	    
	}

	/**
	 * @see AdapterServiceInterface::inserir()
	 * @return bool
	 */
	public function inserir() {
	    
	    $sqlAttributes = "";
	    $sqlValues = "";
	    $attributes = $this->objectEntity->getAttributes();
	    
	    /*
	     * COMPATIBILIDADE: ADICIONANDO ID AUTOINCREMENTO = IGNORADO ITEM 0
	     */
	    for ($i = 1; $i < count($attributes); $i++) {
	        $sqlAttributes .= $attributes[$i].",";
	        $sqlValues .= ":".$attributes[$i].",";
	    }
	    $sqlAttributes = preg_replace("/(,)+$/", "", $sqlAttributes);
	    $sqlValues = preg_replace("/(,)+$/", "", $sqlValues);
	    
	    $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)", 
	        $this->objectEntity->getTableName(), 
	        $sqlAttributes, 
	        $sqlValues
        );
	    
		/*
		 * ARRAY DADOS
		 */
		$document = $this->objectEntity->toArray();
		if( !is_array($document) ){
			return false;
		}		
		$document = $this->convertAttributes($document);
		
		try {
		    
			$prepare = $this->getConnection()->prepare($sql);
		    
			for ($i = 1; $i < count($attributes); $i++) {
			    $prepare->bindValue(":".$attributes[$i], $document[ $attributes[$i] ]);
			}
			
			if( $prepare->execute() ){
			    $id = intval($this->getConnection()->lastInsertId());
			    if($id>0){
			        $this->objectEntity->__set($attributes[0], $id);
			    }
			    return true;
			}
			
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		
		return false;
	}

	/**
	 * @param array
	 * @return array
	 */
	protected function convertAttributes(array $document){
		/*$keys = array_keys($document);
		foreach ($keys as $key){
			$value = $document[$key];
			if( Validacao::isDataHora( $value ) ){
				$value = new PDODate( strtotime( $value ) );
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
		}*/
		return $document;
	}
	
	/**
	 * @see AdapterServiceInterface::alterar()
	 * @return bool
	 */
	public function alterar(array $newDocument = null) {
		
	    $sqlSet = "";
	    $attributes = $this->objectEntity->getAttributes();
	    for ($i = 1; $i < count($attributes); $i++) {
	        $sqlSet .= $attributes[$i]."=:".$attributes[$i].",";
	    }
	    $sqlSet = preg_replace("/(,)+$/", "", $sqlSet);
	    $sqlWhere =  $attributes[0]."=:".$attributes[0];
	    
	    $sql = sprintf(
	        "UPDATE %s SET %s WHERE %s",
	        $this->objectEntity->getTableName(),
	        $sqlSet,
	        $sqlWhere
	    );
	    
		$document = ( (is_array($newDocument)) ? $newDocument : $this->objectEntity->toArray() );
		if( !is_array($document) ){
			return false;
		}
		$document = $this->convertAttributes($document);
		
		try {
			
		    $prepare = $this->getConnection()->prepare($sql);
		    
		    for ($i = 0; $i < count($attributes); $i++) {
		        $prepare->bindValue(":".$attributes[$i], $document[ $attributes[$i] ]);
		    }
		    
		    return $prepare->execute();
				
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		
		return false;
	}

	/**
	 * @see AdapterServiceInterface::alterarAtributo()
	 * @return bool
	 */
	public function alterarAtributo($attributeFieldName) {
        
	    $attributes = $this->objectEntity->getAttributes();
	    
	    $sqlSet = $attributeFieldName."=:".$attributeFieldName;
	    $sqlWhere =  $attributes[0]."=:".$attributes[0];
	     
	    $sql = sprintf(
	        "UPDATE %s SET %s WHERE %s",
	        $this->objectEntity->getTableName(),
	        $sqlSet,
	        $sqlWhere
	    );
	     
	    $document = $this->objectEntity->toArray();
		if( !is_array($document) ){
			return false;
		}		
		$document = $this->convertAttributes($document);
	    
	    try {
	        	
	        $prepare = $this->getConnection()->prepare($sql);
	    
	        $prepare->bindValue(":".$attributes[0], $document[ $attributes[0] ]);
	        $prepare->bindValue(":".$attributeFieldName, $document[ $attributeFieldName ]);
	    
	        return $prepare->execute();
	    
	    } catch (PDOException $e) {
	        echo $e->getMessage();
	    }
	    
	    return false;
		
	}
	
	/**
	 * @see AdapterServiceInterface::count()
	 * @return int
	 */
	public function count($query=array()) {
		
		if( array_key_exists('__count', $query) ){
			$query = $query['__count'];
		}else
		if( array_key_exists('__query', $query) ){
			$query = $query['__query'];
		}
		
		if( array_key_exists('__sql', $query) ){
			$sql = $query['__sql'];
		}else{
		
    		$sqlWhere = "";
    		$parameters = array();
    	    if( array_key_exists("statement", $query) && array_key_exists("parameters", $query) ){
    		   $sqlWhere = sprintf(
                    "WHERE %s",
                    $query["statement"]
               );
    		   $parameters = $query["parameters"];
    		}
    		
    		$sql = trim(sprintf(
    		    "SELECT COUNT(*) AS count FROM %s %s",
    		    $this->objectEntity->getTableName(),
    		    $sqlWhere
    		));
    		
		}
		
		try {
	
		    $prepare = $this->getConnection()->prepare($sql);
		    	
		    $result = $prepare->execute( $parameters );
		    	
		    $document = $prepare->fetch(PDO::FETCH_ASSOC);
		    	
		    if(null != $document){
		    
		        return intval($document["count"]);
		        
		    }
			
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		
		return 0;
	}

}
?>