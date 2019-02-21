<?
	class SearchComparerPDO extends SearchComparer {
	    
		public static function Mounter($AttributeFieldName, $SearchComparer, $Value){
			switch ($SearchComparer){
				case SearchComparer::Igual() : { 
				    return array(
				        "statement" => "$AttributeFieldName = :$AttributeFieldName",
				        "parameters" => array(":$AttributeFieldName" => $Value)
				    );
				} break;
				case SearchComparer::Diferente() : {  
				    return array(
				        "statement" => "$AttributeFieldName <> :$AttributeFieldName",
				        "parameters" => array(":$AttributeFieldName" => $Value)
				    );
				} break;
				case SearchComparer::Contem() : {  
				    return array(
				        "statement" => "$AttributeFieldName LIKE :$AttributeFieldName",
				        "parameters" => array(":$AttributeFieldName" => "%$Value%")
				    );
				} break;
				case SearchComparer::NaoContem() : { 
				    return array(
				        "statement" => "$AttributeFieldName NOT LIKE :$AttributeFieldName",
				        "parameters" => array(":$AttributeFieldName" => "%$Value%")
				    );
				} break;
				case SearchComparer::IniciaCom() : { 
				    return array(
				        "statement" => "$AttributeFieldName LIKE :$AttributeFieldName",
				        "parameters" => array(":$AttributeFieldName" => "$Value%")
				    );
				} break;
				case SearchComparer::TerminaCom() : { 
				    return array(
				        "statement" => "$AttributeFieldName LIKE :$AttributeFieldName",
				        "parameters" => array(":$AttributeFieldName" => "%$Value")
				    );
				} break;
				case SearchComparer::Maior() : { 
				    return array(
				        "statement" => "$AttributeFieldName > :$AttributeFieldName",
				        "parameters" => array(":$AttributeFieldName" => $Value)
				    );
				} break;
				case SearchComparer::Menor() : {
				    return array(
				        "statement" => "$AttributeFieldName < :$AttributeFieldName",
				        "parameters" => array(":$AttributeFieldName" => $Value)
				    );
				} break;
				case SearchComparer::MaiorIgual() : {
				    return array(
				        "statement" => "$AttributeFieldName >= :$AttributeFieldName",
				        "parameters" => array(":$AttributeFieldName" => $Value)
				    );
				} break;
				case SearchComparer::MenorIgual() : {
				    return array(
				        "statement" => "$AttributeFieldName <= :$AttributeFieldName",
				        "parameters" => array(":$AttributeFieldName" => $Value)
				    );
				} break;
				case SearchComparer::In() : {
				    return array(
				        "statement" => "$AttributeFieldName IN (:$AttributeFieldName)",
				        "parameters" => array(":$AttributeFieldName" => $Value)
				    );
				} break;
				case SearchComparer::NotIn() : {
				    return array(
				        "statement" => "$AttributeFieldName NOT IN (:$AttributeFieldName)",
				        "parameters" => array(":$AttributeFieldName" => $Value)
				    );
				 return "$AttributeFieldName NOT IN ($Value)"; } break;
				default : {
				    return array(
				        "statement" => "$AttributeFieldName = :$AttributeFieldName",
				        "parameters" => array(":$AttributeFieldName" => $Value)
				    );
				} break;
			}
		}
		
	}
?>