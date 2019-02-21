<?
	class SearchComparerMongo extends SearchComparer {
		
		public static function Mounter($AttributeFieldName, $SearchComparer, $Value){
			
			switch ($SearchComparer){
				case SearchComparer::Igual() : { 		
					return array(
						$AttributeFieldName => SearchComparerMongo::convertValue($Value)
					); 
				} break;
				case SearchComparer::Diferente() : { 	
					return array(
						$AttributeFieldName => array(
							'$ne' => SearchComparerMongo::convertValue($Value)
						)
					);
				} break;
				case SearchComparer::Contem() : { 		
					return array(
						$AttributeFieldName => array(
							'$regex' => new MongoRegex("/".SearchComparerMongo::convertValue($Value, false)."/i")
						)
					);
				} break;
				case SearchComparer::NaoContem() : { 	
					return array(
						$AttributeFieldName => array(
							'$nin' => array(
								new MongoRegex("/".SearchComparerMongo::convertValue($Value, false)."/i")
							)
						)
					);
				} break;
				case SearchComparer::IniciaCom() : { 	
					return array(
						$AttributeFieldName => array(
							'$regex' => new MongoRegex("/^".SearchComparerMongo::convertValue($Value, false)."/i")
						)
					);
				} break;
				case SearchComparer::TerminaCom() : { 	
					return array(
						$AttributeFieldName => array(
							'$regex' => new MongoRegex("/".SearchComparerMongo::convertValue($Value, false)."$/i")
						)
					);
				} break;
				case SearchComparer::Maior() : { 		
					return array(
						$AttributeFieldName => array(
							'$gt' => SearchComparerMongo::convertValue($Value)
						)
					);
				} break;
				case SearchComparer::Menor() : { 		
					return array(
						$AttributeFieldName => array(
							'$lt' => SearchComparerMongo::convertValue($Value)
						)
					);
				} break;
				case SearchComparer::MaiorIgual() : {	
					return array(
						$AttributeFieldName => array(
							'$gte' => SearchComparerMongo::convertValue($Value)
						)
					);
				} break;
				case SearchComparer::MenorIgual() : { 	
					return array(
						$AttributeFieldName => array(
							'$lte' => SearchComparerMongo::convertValue($Value)
						)
					);
				} break;
				default : { 							
					return array(
						$AttributeFieldName => SearchComparerMongo::convertValue($Value)
					); 
				} break;
			}
		}
		
		private static function convertValue( $Value, $convertMongoDate = true){
			
			if( $convertMongoDate && Validacao::isDataHora( $Value ) ){
				$Value = new MongoDate(strtotime( $Value ));
			}else
			if( is_string( $Value ) ){
				if( is_numeric($Value) ){
					if( preg_match('/[^0-9]/', $Value)){
						$Value = floatval($Value);
					}else{
						$Value = intval($Value);
					}
				}else{
					$Value = utf8_encode( $Value );
				}
			}
			
			return $Value;
		}
		
	}
?>