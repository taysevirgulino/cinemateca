<? 
	class PaginaManage2 extends PaginaManage { 
		
		public static function resultConsultar($value){
			
			for ($i = 0; $i < count($value); $i++) {
				$value[$i]["url"] = Url::Pagina($value[$i]["id_pagina"], $value[$i]["identificador"], $value[$i]["slug"]);;
			}
			
			return $value;
		}
		
		public static function consultarSearchQuery(array $searchQueryComparerCollection=array(), array $searchQueryOrderCollection=array(), $limitStart=0, $limitCount=0){
			return PaginaManage2::resultConsultar(PaginaManage::consultarSearchQuery($searchQueryComparerCollection, $searchQueryOrderCollection, $limitStart, $limitCount));
		}
		
		
		public static function Pagina_Obj($Slug, $IdeOrigem){
			$query = SearchMounter::Query(
				PaginaAttribute::_Table(),
				array(
					new SearchQueryComparer(PaginaAttribute::Slug(), SearchComparer::Igual(), SearchCondition::E(), $Slug),
					new SearchQueryComparer(PaginaAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), $IdeOrigem),
				)
			);
			
			$obj = new Pagina();
			if(!$obj->buscar($query)){
				return null;
			}
			
			return $obj;
		}
		
		public static function HerancaByArray($IdPagina){
			
			if($IdPagina > 0){
				$Pagina = new Pagina();
				if(!$Pagina->buscarPagina(1, $IdPagina)){ return array();}
				
				if($Pagina->getIdPagina() == $Pagina->getIdPaginaPai()){
					return PaginaManage2::MontarArray($Pagina->getTitulo(), $Pagina->getIdPagina(), $Pagina->getIdentificador());
				}
				if($Pagina->getIdPaginaPai() > 0){
					return array_merge(PaginaManage2::HerancaByArray($Pagina->getIdPaginaPai()), PaginaManage2::MontarArray($Pagina->getTitulo(), $Pagina->getIdPagina(), $Pagina->getIdentificador(), $Pagina->getSlug()));
				}else{
					return PaginaManage2::MontarArray($Pagina->getTitulo(), $Pagina->getIdPagina(), $Pagina->getIdentificador(), $Pagina->getSlug());
				}
			}
			
			return array();
		}
		
		private static function MontarArray($Nome, $IdPagina, $Identificador, $Slug){
			return array(array($Nome, Url::Pagina($IdPagina, $Identificador, $Slug)));
		}
		
		public static function FilhosCount($IdPagina){
			$query = SearchMounter::Query(
				PaginaAttribute::_Table(),
				array(
					new SearchQueryComparer(PaginaAttribute::IdPaginaPai(), SearchComparer::Igual(), SearchCondition::E(), $IdPagina),
				)
			);
			return PaginaManage::count($query);
		}
		
		public static function Filhos($IdPagina, $Limit=0){
			$Limit = (($Limit==0) ? 1000 : $Limit );
			
			return PaginaManage2::consultarSearchQuery(
				array(
					new SearchQueryComparer(PaginaAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), CurrentSite::IdeOrigem()),
					new SearchQueryComparer(PaginaAttribute::IdPaginaPai(), SearchComparer::Igual(), SearchCondition::E(), $IdPagina),
					new SearchQueryComparer(PaginaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
				),
				array(
					new SearchQueryOrder(PaginaAttribute::Prioridade(), SearchOrder::Crescente())
				),
				0, $Limit
			);
		}

		public static function Paginas($IdPaginaPai=0, $Limit=0, $IdNotIn=0){
			$Limit = (($Limit==0) ? 1000 : $Limit );
				
			return PaginaManage2::consultarSearchQuery(
				array(
					new SearchQueryComparer(PaginaAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), CurrentSite::IdeOrigem()),
					new SearchQueryComparer(PaginaAttribute::IdPaginaPai(), SearchComparer::Igual(), SearchCondition::E(), $IdPaginaPai),
					new SearchQueryComparer(PaginaAttribute::IdPagina(), SearchComparer::Diferente(), SearchCondition::E(), $IdNotIn),
					new SearchQueryComparer(PaginaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
				),
				array(
					new SearchQueryOrder(PaginaAttribute::Prioridade(), SearchOrder::Crescente())
				),
				0, $Limit
			);
			
		}
		
		public static function PaginaAndSubs($IdPagina, $LimitSubs=0){
			$Pagina = PaginaManage2::buscarPagina(1, intval($IdPagina));
			
			$Pagina["Paginas"] = PaginaManage2::Filhos($IdPagina, $LimitSubs);

			return $Pagina;
		}
	} 
?>