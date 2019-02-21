<? 
	class JornalPaginaManage2 extends JornalPaginaManage {
		
		public static function PaginaByEdicaoEstrutura($IdEdicao, $IdEstrutura){
			
			$query = SearchMounter::Query(
				JornalPaginaAttribute::_Table(),
				array(
					new SearchQueryComparer(JornalPaginaAttribute::IdJornalEdicao(), SearchComparer::Igual(), SearchCondition::E(), $IdEdicao),
					new SearchQueryComparer(JornalPaginaAttribute::IdJornalEstrutura(), SearchComparer::Igual(), SearchCondition::E(), $IdEstrutura),
				),
				array(),
				0, 1
			);
			
			return JornalPaginaManage2::buscar($query);
		}

		public static function PaginaByEdicao($IdEdicao){
			
			$objEstrutura = new JornalEstrutura();
			$itensEstrutura = $objEstrutura->consultarSearchQuery(
				array(),
				array(
					new SearchQueryOrder(JornalEstruturaAttribute::Prioridade(), SearchOrder::Crescente())
				)
			);
			
			foreach ($itensEstrutura as $estrutura) {
				$itensJornalPagina = JornalPaginaManage2::consultarSearchQuery(
					array(
						new SearchQueryComparer(JornalPaginaAttribute::IdJornalEstrutura(), SearchComparer::Igual(), SearchCondition::E(), $estrutura->getIdJornalEstrutura()),
						new SearchQueryComparer(JornalPaginaAttribute::IdJornalEdicao(), SearchComparer::Igual(), SearchCondition::E(), $IdEdicao),
					),
					array(),
					0, 1
				);
				foreach ($itensJornalPagina as $valueJornalPagina) {
					return $valueJornalPagina;
				}
			}
			
		}
		
		public static function PaginasByEdicao($IdEdicao){
			
			$objEstrutura = new JornalEstrutura();
			$itensEstrutura = $objEstrutura->consultarSearchQuery(
				array(),
				array(
					new SearchQueryOrder(JornalEstruturaAttribute::Prioridade(), SearchOrder::Crescente())
				)
			);
			
			$result = array();
			foreach ($itensEstrutura as $estrutura) {
				$itensJornalPagina = JornalPaginaManage2::consultarSearchQuery(
					array(
						new SearchQueryComparer(JornalPaginaAttribute::IdJornalEstrutura(), SearchComparer::Igual(), SearchCondition::E(), $estrutura->getIdJornalEstrutura()),
						new SearchQueryComparer(JornalPaginaAttribute::IdJornalEdicao(), SearchComparer::Igual(), SearchCondition::E(), $IdEdicao),
					),
					array(),
					0, 1
				);
				foreach ($itensJornalPagina as $valueJornalPagina) {
					$result[] = $valueJornalPagina;
				}
			}
			
			return $result;
			
		}
		
	}
?>