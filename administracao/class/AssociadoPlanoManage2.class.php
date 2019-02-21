<? 
	class AssociadoPlanoManage2 extends AssociadoPlanoManage {
		
		public static function Planos(){
			$itensAssociadoPlano = AssociadoPlanoManage::consultarSearchQuery(
				array(
					new SearchQueryComparer(AssociadoPlanoAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
				),
				array(
					new SearchQueryOrder(AssociadoPlanoAttribute::Prioridade(), SearchOrder::Crescente())
				)
			);
			foreach ($itensAssociadoPlano as $i => $valueAssociadoPlano) {
				$itensAssociadoPlano[$i]['valor_corrigido'] = self::Valor_Corrigido($valueAssociadoPlano);
			}
			
			return $itensAssociadoPlano;
		}
		
		public static function Valor_Corrigido(array $valueAssociadoPlano){
			$objPlano = new AssociadoPlano();
			if( $objPlano->buscarAttribute(AssociadoPlanoAttribute::IdAssociadoPlano(), $valueAssociadoPlano['id_associado_plano'])){
				$correcao = self::Correcao($objPlano);
				return $correcao['valor_final'];
			}
			return $valueAssociadoPlano['valor'];
		}
		
		public static function Correcao( AssociadoPlano $objPlano ){
			$ValorBruto = $objPlano->getValor();
			$ValorDesconto = 0;
			$PlanoDataInicial = $PlanoDataFinal = date("Y-m-d");
			$ValorFinal = $ValorBruto - $ValorDesconto;
				
			if( $objPlano->getProrata() == 1 ){
				switch ($objPlano->getRecorrencia()) {
					case 1 :{ // ANUAL
						$unidade = $ValorBruto / 12;
						$fator = 1; //define se o mês atual será cobrado: 1 sim, 0 não
						$meses = 12 - ( intval(date("m")) - $fator );
						$ValorFinal = $unidade * $meses;
						$ValorDesconto = $ValorBruto - $ValorFinal;
			
						$PlanoDataInicial = date("Y-m-d");
						$PlanoDataFinal = date("Y-12-31");
					};
				}
			}else{
			    $PlanoDataInicial = date("Y-01-01");
			    $PlanoDataFinal = date("Y-12-31");
			}
			
			return array(
				'valor_bruto' => $ValorBruto,
				'valor_desconto' => $ValorDesconto,
				'valor_final' => $ValorFinal,
				'plano_data_inicial' => $PlanoDataInicial,
				'plano_data_final' => $PlanoDataFinal
			);
		}
		
	}
?>