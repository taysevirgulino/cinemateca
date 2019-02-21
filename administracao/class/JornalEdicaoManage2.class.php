<? 
	class JornalEdicaoManage2 extends JornalEdicaoManage {
		
		public static function consultarSearchQuery(array $searchQueryComparerCollection=array(), array $searchQueryOrderCollection=array(), $limitStart=0, $limitCount=0){
			$value = JornalEdicaoManage::consultarSearchQuery($searchQueryComparerCollection, $searchQueryOrderCollection, $limitStart, $limitCount);
			for ($i = 0; $i < count($value); $i++) {
				$value[$i]["url"] = Url::Jornal($value[$i]["id_jornal_edicao"], $value[$i]["identificador"], $value[$i]["numero"]);
				//$value[$i]["Pagina"] = JornalPaginaManage2::PaginaByEdicao($value[$i]["id_jornal_edicao"]);
			}
			return $value;
		}
		public static function consultar($query = null, $sort = null, $offset = null, $limit = null){
			$value = JornalEdicaoManage::consultar($query, $sort, $offset, $limit);
			for ($i = 0; $i < count($value); $i++) {
				$value[$i]["url"] = Url::Jornal($value[$i]["id_jornal_edicao"], $value[$i]["identificador"], $value[$i]["numero"]);
				$value[$i]["Pagina"] = JornalPaginaManage2::PaginaByEdicao($value[$i]["id_jornal_edicao"]);
			}
			return $value;
		}
		
		public static function buscar($query){
			$value = JornalEdicaoManage::buscar($query);
			if( !empty($value) ){
				$value["url"] = Url::Jornal($value["id_jornal_edicao"], $value["identificador"], $value["numero"]);
				$value["Pagina"] = JornalPaginaManage2::PaginaByEdicao($value["id_jornal_edicao"]);
			}
			return $value;
		}
		
		public static function Atual(){
			
			$query = SearchMounter::Query(
				JornalEdicaoAttribute::_Table(),
				array(
					new SearchQueryComparer(JornalEdicaoAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
				),
				array(
					new SearchQueryOrder(JornalEdicaoAttribute::Numero(), SearchOrder::Decrescente()),
				),
				0, 1
			);
			
			$itens = JornalEdicaoManage2::consultar($query);
			
			foreach ($itens as $value){
				return $value;
			}
			
			return null;
			
		}
		
		public static function Edicoes($Limit=10, $IdEdicaoNotIn=0){
			
			return JornalEdicaoManage2::consultarSearchQuery(
				array(
					new SearchQueryComparer(JornalEdicaoAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
					new SearchQueryComparer(JornalEdicaoAttribute::IdJornalEdicao(), SearchComparer::Diferente(), SearchCondition::E(), $IdEdicaoNotIn),
				),
				array(
					new SearchQueryOrder(JornalEdicaoAttribute::Numero(), SearchOrder::Decrescente())
				),
				0, $Limit
			);
			
		}
		
	}
?>