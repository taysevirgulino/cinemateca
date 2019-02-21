<? 
	class AreaPublicacaoManage2 extends AreaPublicacaoManage { 
		
		public static function Areas_Ativas(){
			
			$query = SearchMounter::MounterByQueryComparerOrder(AreaPublicacaoAttribute::_Table(), array(
				new SearchQueryComparer(AreaPublicacaoAttribute::Quantidade(), SearchComparer::Maior(), SearchCondition::E(), 0),
			), array(
				new SearchQueryOrder(AreaPublicacaoAttribute::IdAreaPublicacaoBloco(), SearchOrder::Crescente())
			));
				
			return AreaPublicacaoManage2::consultar($query);
		}
		
		public static function Areas($IdAreaPublicacaoBloco){
			
			$query = SearchMounter::MounterByQueryComparerOrder(AreaPublicacaoAttribute::_Table(), array(
							new SearchQueryComparer(AreaPublicacaoAttribute::IdAreaPublicacaoBloco(), SearchComparer::Igual(), SearchCondition::E(), $IdAreaPublicacaoBloco),
						), array(
							new SearchQueryOrder(AreaPublicacaoAttribute::Prioridade(), SearchOrder::Crescente())
						));
			
			return AreaPublicacaoManage2::consultar($query);
			
		}
		
		public static function Areas_Blocos(){
			$itens = AreaPublicacaoBlocoManage::consultarAreaPublicacaoBlocoAttribute(null, null, null, AreaPublicacaoBlocoAttribute::Prioridade());
			
			for ($i = 0; $i < count($itens); $i++) {
				$rs = AreaPublicacaoManage2::Areas( $itens[$i]["id_area_publicacao_bloco"] );
				$itens[$i]["Areas"] = array_chunk($rs, ceil(count($rs)/2));;
			}
			
			return $itens;
		}
		
	} 
?>