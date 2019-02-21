<? 
	class EnqueteManage2 extends EnqueteManage { 
		
		public static function consultarSearchQuery(array $searchQueryComparerCollection=array(), array $searchQueryOrderCollection=array(), $limitStart=0, $limitCount=0){
			$value = EnqueteManage::consultarSearchQuery($searchQueryComparerCollection, $searchQueryOrderCollection, $limitStart, $limitCount);
				
			for ($i = 0; $i < count($value); $i++) {
				$value[$i]["url"] = Url::Enquete($value[$i]["id_enquete"], $value[$i]["identificador"], $value[$i]["pergunta"]);
			}
				
			return $value;
		}
		
		public static function consultar($query = null, $sort = null, $offset = null, $limit = null){
			$value = EnqueteManage::consultar($query, $sort, $offset, $limit);
			
			for ($i = 0; $i < count($value); $i++) {
				$value[$i]["url"] = Url::Enquete($value[$i]["id_enquete"], $value[$i]["identificador"], $value[$i]["pergunta"]);
			}
			
			return $value;
		}
		public static function Ativa(){
			$query = SearchMounter::Query(
				EnqueteAttribute::_Table(),
				array(
					//new SearchQueryComparer(EnqueteAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), CurrentSite::IdeOrigem()),
					new SearchQueryComparer(EnqueteAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
					new SearchQueryComparer(EnqueteAttribute::DataInicial(), SearchComparer::MenorIgual(), SearchCondition::E(), date("Y-m-d")),
					new SearchQueryComparer(EnqueteAttribute::DataFinal(), SearchComparer::MaiorIgual(), SearchCondition::E(), date("Y-m-d")),
				),
				array(
					new SearchQueryOrder(EnqueteAttribute::IdEnquete(), SearchOrder::Decrescente())
				),
				0, 1
			);
			
			$enquetes = EnqueteManage2::consultar($query);
			
			if( count($enquetes) <= 0){
				return null;
			}
			
			$enquete = $enquetes[0];
			if(!empty($enquete)){
				$enquete["alternativas"] = EnqueteAlternativaManage::consultarAttribute(EnqueteAlternativaAttribute::IdEnquete(), $enquete["id_enquete"], SearchComparer::Igual(), EnqueteAlternativaAttribute::Prioridade());
				$enquete["url"] = Url::Enquete($enquete["id_enquete"], $enquete["identificador"], $enquete["pergunta"]);
				
				return $enquete;
			}
			
			return null;
		}
		
		public static function Votar($IdEnquete, $IdAlternativa){
			
			$rs = array();
			$rs["status"] = 0;
			
			$Ip = $_SERVER["REMOTE_ADDR"];
			
			$enquete = new Enquete();
			if(!$enquete->buscarEnquete(1, $IdEnquete)){
				$rs["status"] = 0;
				$rs["aviso"] = utf8_encode("Enquete não pode ser Localizada... Tente novamente daqui alguns minutos!");
				return $rs;
			}

			$jaVotou = false;
			$objAlterantiva = new EnqueteAlternativa();
			$itensALternativa = $objAlterantiva->consultarAttribute(EnqueteAlternativaAttribute::IdEnquete(), $IdEnquete);
			foreach ($itensALternativa as $alternativa) {
				$objResposta = new EnqueteResposta();
				$respostas = $objResposta->consultarSearchQuery(
					array(
						new SearchQueryComparer(EnqueteRespostaAttribute::IdEnqueteAlternativa(), SearchComparer::Igual(), SearchCondition::E(), $alternativa->getIdEnqueteAlternativa()),
						new SearchQueryComparer(EnqueteRespostaAttribute::Ip(), SearchComparer::Igual(), SearchCondition::E(), $Ip),
					)
				);
				if( count($respostas) > 0 ){
					$jaVotou = true;
					break;
				}
			}
			
			if( $jaVotou ){
				$rs["status"] = 0;
				$rs["aviso"] = utf8_encode("O seu Voto ja foi contabilizado... Obrigado!");
				return $rs;
			}else{
				$objResposta = new EnqueteResposta();
				$objResposta->setEnqueteResposta(null, null, null, $IdAlternativa, $Ip, date("Y-m-d H:i:s"));
				if($objResposta->inserir()){
					$rs["status"] = 1;
					$rs["aviso"] = utf8_encode("Você acaba de Votar... Obrigado(a)");
					return $rs;
				}else{
					$rs["status"] = 0;
					$rs["aviso"] = utf8_encode("Problema ao Votar... Por favor, tente novamente daqui alguns minutos!");
					return $rs;
				}
			}
			
			$rs["aviso"] = utf8_encode($rs["aviso"]);
				
			return $rs;
		}
		
		public static function EnquetesByUltimas($Limit=5, $IdEnqueteDiferente=0){
			return EnqueteManage2::consultarSearchQuery(
				array(
					new SearchQueryComparer(EnqueteAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
					new SearchQueryComparer(EnqueteAttribute::IdEnquete(), SearchComparer::Diferente(), SearchCondition::E(), $IdEnqueteDiferente)
				),
				array(
					new SearchQueryOrder(EnqueteAttribute::DataInicial(), SearchOrder::Decrescente())
				),
				0, $Limit
			);
		}

	} 
?>