<? 
	class TempoPrevisaoManage2 extends TempoPrevisaoManage { 
		
		public static function Previsao($IdCidade, $Data){
			
			$query = SearchMounter::Query(TempoPrevisaoAttribute::_Table(), array(
				new SearchQueryComparer(TempoPrevisaoAttribute::IdTempoCidade(), SearchComparer::Igual(), SearchCondition::E(), $IdCidade),
				new SearchQueryComparer(TempoPrevisaoAttribute::Dia(), SearchComparer::Igual(), SearchCondition::E(), $Data)
			), array(), 0, 1);
			
			$obj = new TempoPrevisao();
			if(!$obj->buscar($query)){
				return null;
			}
			
			return $obj;
		}
		
		public static function Previsoes_Hoje(){
			return TempoPrevisaoManage2::Previsoes_Dia( date("Y-m-d") );
		}
		
		public static function Previsoes_Dia($Data){
			
			$objCidade = new TempoCidade();
			$cidades = $objCidade->consultarSearchQuery(
				array(
					new SearchQueryComparer(TempoCidadeAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1)
				),
				array(
					new SearchQueryOrder(TempoCidadeAttribute::Prioridade(), SearchOrder::Crescente())
				)
			);
			
			$objPrevisao = new TempoPrevisao();
			$objs = array();
			
			foreach ($cidades as $cidade) {
				$query = SearchMounter::Query(
					TempoPrevisaoAttribute::_Table(),
					array(
						new SearchQueryComparer(TempoPrevisaoAttribute::IdTempoCidade(), SearchComparer::Igual(), SearchCondition::E(), $cidade->getIdTempoCidade()),
						new SearchQueryComparer(TempoPrevisaoAttribute::Dia(), SearchComparer::Igual(), SearchCondition::E(), System::FormatarData($Data, "Y-m-d"))
					)
				);
				
				$previsoes = $objPrevisao->consultar($query);
				
				foreach ($previsoes as $previsao) {
					$legenda = "Previsão do tempo";
					$objLegenda = new TempoLegenda();
					if($objLegenda->buscarAttribute(TempoLegendaAttribute::Codigo(), $previsao->getTempo())){
						$legenda = $objLegenda->getTitulo();
					}
					
					$objs[] = array(
						"cidade" => $cidade->getNome(),
						"uf" => $cidade->getUf(),
						"dia" => $previsao->getDia(),
						"tempo" => $previsao->getTempo(),
						"maxima" => $previsao->getMaxima(),
						"minima" => $previsao->getMinima(),
						"iuv" => $previsao->getIuv(),
						"legenda" => $legenda
					);
				}
			}
			
			return $objs;
		}

	} 
?>