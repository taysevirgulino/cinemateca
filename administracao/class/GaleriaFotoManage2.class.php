<? 
	class GaleriaFotoManage2 extends GaleriaFotoManage {
		
		public static function QuantidadeByAlbum( $IdAlbum ){
			$query = SearchMounter::Query(
				GaleriaFotoAttribute::_Table(),
				array(
					new SearchQueryComparer(GaleriaFotoAttribute::IdGaleriaAlbum(), SearchComparer::Igual(), SearchCondition::E(), $IdAlbum),
				)
			);
			return GaleriaFotoManage2::count($query);
		}
		
		public static function FotoByAlbum( $IdAlbum ){
			
			$itensGaleriaFoto = GaleriaFotoManage2::consultarSearchQuery(
				array(
					new SearchQueryComparer(GaleriaFotoAttribute::IdGaleriaAlbum(), SearchComparer::Igual(), SearchCondition::E(), $IdAlbum),
				),
				array(
					new SearchQueryOrder(GaleriaFotoAttribute::Prioridade(), SearchOrder::Crescente())
				),
				0, 1
			);
			foreach ($itensGaleriaFoto as $valueGaleriaFoto) {
				return $valueGaleriaFoto;
			}
			
			return array();
		}
		
		public static function FotosByAlbum($IdAlbum, $Limit){
			return GaleriaFotoManage2::consultarSearchQuery(
				array(
					new SearchQueryComparer(GaleriaFotoAttribute::IdGaleriaAlbum(), SearchComparer::Igual(), SearchCondition::E(), $IdAlbum),
				),
				array(
					new SearchQueryOrder(GaleriaFotoAttribute::Prioridade(), SearchOrder::Crescente())
				),
				0, $Limit
			);
		}
		
	}
?>