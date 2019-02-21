<? 
	class EnqueteRespostaManage2 extends EnqueteRespostaManage {
		
		public static function QuantidadeByEnquete($IdEnquete){
			
			$adapter = Config::getAdapterService('EnqueteResposta');
				
			switch (get_class($adapter)) {
				case 'AdapterServiceMongo': {
						
					$objAlternativa = new EnqueteAlternativa();
					$itens = $objAlternativa->consultar(
						SearchMounter::MounterByComparer(EnqueteAlternativaAttribute::_Table(), EnqueteAlternativaAttribute::IdEnquete(), SearchComparer::Igual(), $IdEnquete)
					);
					$in = array();
					foreach ($itens as $value) {
						$in[] = $value->getIdEnqueteAlternativa();
					}
					if( count($in) <= 0){
						return 0;
					}
					$query = array(
						EnqueteRespostaAttribute::IdEnqueteAlternativa() => array('$in' => $in)
					);
						
					return EnqueteRespostaManage::count($query);
				} break;
				default:{
					$query = "SELECT 
								  COUNT(tb_enquete_resposta.id_enquete_resposta) AS `count`
								FROM
								  tb_enquete_resposta
								  INNER JOIN tb_enquete_alternativa ON (tb_enquete_resposta.id_enquete_alternativa = tb_enquete_alternativa.id_enquete_alternativa)
								  INNER JOIN tb_enquete ON (tb_enquete_alternativa.id_enquete = tb_enquete.id_enquete)
								WHERE
								  tb_enquete.id_enquete = $IdEnquete";
						
					return SearchMysqlQuery::CountBySql($query);
				} break;
			}
			
			return 0;
		}
		
		public static function QuantidadeByAlternativa($IdEnqueteAlternativa){
			$query = SearchMounter::Count(
				EnqueteRespostaAttribute::_Table(),
				array(
					new SearchQueryComparer(EnqueteRespostaAttribute::IdEnqueteAlternativa(), SearchComparer::Igual(), SearchCondition::E(), $IdEnqueteAlternativa)
				)
			);
			return EnqueteRespostaManage::count($query);
		}
		
	}
?>