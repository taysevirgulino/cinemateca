<? 
	class EnqueteAlternativaManage2 extends EnqueteAlternativaManage {
		
		public static function QuantidadeByEnquete( $IdEnquete ){
			
			$query = SearchMounter::Query(
				EnqueteAlternativaAttribute::_Table(),
				array(
					new SearchQueryComparer(EnqueteAlternativaAttribute::IdEnquete(), SearchComparer::Igual(), SearchCondition::E(), $IdEnquete),
				)
			);
			
			return EnqueteAlternativaManage::count($query);
		}
		
		public static function AlternativasByEnquete($IdEnquete){
			
			$respota_total = EnqueteRespostaManage2::QuantidadeByEnquete($IdEnquete);
			if($respota_total==0){ $respota_total=1; }
			
			$alternativas = EnqueteAlternativaManage::consultarSearchQuery(
				array(
					new SearchQueryComparer(EnqueteAlternativaAttribute::IdEnquete(), SearchComparer::Igual(), SearchCondition::E(), $IdEnquete),
				),
				array(
					new SearchQueryOrder(EnqueteAlternativaAttribute::Prioridade(), SearchOrder::Crescente())
				)
			);
				
			for($i=0; $i < count($alternativas); $i++){
				$resposta = EnqueteRespostaManage2::QuantidadeByAlternativa($alternativas[$i]["id_enquete_alternativa"]);
				$alternativas[$i]["resposta_qtd"] = $resposta;
				$alternativas[$i]["resposta_porcentagem_barra"] = intval(($resposta*100)/$respota_total);
				$alternativas[$i]["resposta_porcentagem"] = number_format((($resposta*100)/$respota_total), 2,',',',');
			}
		
			return $alternativas;
		}
		
	}
?>