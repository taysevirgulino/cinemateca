<? 
	class AgendaManage2 extends AgendaManage {
		
		
		public static function consultar($query = null, $sort = null, $offset = null, $limit = null){
			$itens = AgendaManage::consultar($query, $sort, $offset, $limit);
				
			for ($i = 0; $i < count($itens); $i++) {
				$itens[$i]["url"] = Url::Agenda($itens[$i]["id_agenda"], $itens[$i]["identificador"], $itens[$i]["titulo"]);
			}
				
			return $itens;
		}
		
		public static function consultarSearchQuery(array $searchQueryComparerCollection=array(), array $searchQueryOrderCollection=array(), $limitStart=0, $limitCount=0)
		{
			$itens = AgendaManage::consultarSearchQuery($searchQueryComparerCollection, $searchQueryOrderCollection, $limitStart, $limitCount);	
			
			for ($i = 0; $i < count($itens); $i++) {
				$itens[$i]["url"] = Url::Agenda($itens[$i]["id_agenda"], $itens[$i]["identificador"], $itens[$i]["titulo"]);
			}
			
			return $itens;
		}
		
		public static function Proximas( $Limit, $NotIn = 0 ){
			return AgendaManage2::consultarSearchQuery(
				array(
					new SearchQueryComparer(AgendaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
					new SearchQueryComparer(AgendaAttribute::Data(), SearchComparer::MaiorIgual(), SearchCondition::E(), date("Y-m-d")),
					new SearchQueryComparer(AgendaAttribute::IdAgenda(), SearchComparer::Diferente(), SearchCondition::E(), $NotIn),
				),
				array(
					new SearchQueryOrder(AgendaAttribute::Data(), SearchOrder::Crescente()),
					new SearchQueryOrder(AgendaAttribute::Hora(), SearchOrder::Crescente()),
				),
				0, $Limit
			);
		}
		
		public static function AgendaByUltimos($Limit=5, $IdAgendaDiferente=0){
			return AgendaManage2::consultarSearchQuery(
				array(
					new SearchQueryComparer(AgendaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
				),
				array(
					new SearchQueryOrder(AgendaAttribute::Data(), SearchOrder::Decrescente()),
					new SearchQueryOrder(AgendaAttribute::Hora(), SearchOrder::Crescente()),
				)
			);
		}
		
		public static function Datas($ideOrigem=null, $idAgendaCategoria=0, $dataInicial='', $dataFinal='', $limit=0){
		    	
		    $comparers = array();
		    $comparers[] = new SearchQueryComparer(AgendaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1);
		    if($idAgendaCategoria>0){
		        $comparers[] = new SearchQueryComparer(AgendaAttribute::IdAgendaCategoria(), SearchComparer::Igual(), SearchCondition::E(), $idAgendaCategoria);
		    }
		    if($IdeOrigem!=null){
		        $comparers[] = new SearchQueryComparer(AgendaAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), $IdeOrigem);
		    }
		    if( Validacao::isData($dataInicial) ){
		        $SearchQueryComparerCollection[] = new SearchQueryComparer(AgendaAttribute::Data(), SearchComparer::MaiorIgual(), SearchCondition::E(), System::FormatarData($dataInicial, "Y-m-d 00:00:00"));
		    }
		    if( Validacao::isData($dataFinal) ){
		        $SearchQueryComparerCollection[] = new SearchQueryComparer(AgendaAttribute::Data(), SearchComparer::MenorIgual(), SearchCondition::E(), System::FormatarData($dataFinal, "Y-m-d 23:59:59"));
		    }
		    	
		    $limit = (($limit>0) ? $limit : 365 );
		    	
		    $itensAgenda = AgendaManage2::consultarSearchQuery(
		        $comparers,
		        array(
		            new SearchQueryOrder(AgendaAttribute::Data(), SearchOrder::Crescente())
		        ),
		        0, $limit
		    );
		    	
		    $itens = array();
		    foreach ($itensAgenda as $valueAgenda) {
		        $itens[] = $valueAgenda;
		    }
		    	
		    return array_slice($itens, 0, $limit);;
		}
		
		public static function Fullcalendar($IdeOrigem=null, $IdAgendaCategoria=0){
		    	
		    $datas = self::Datas($IdeOrigem, $IdAgendaCategoria);
		    	
		    $itens = array();
		    foreach ($datas as $data) {
		        $start = new DateTime(System::FormatarData($data["data"], "Y-m-d")." ".$data["hora"]);
		        $start = $start->format('c');
		
		        $item = array(
		            'id' => $data["id_agenda"],
		            'title' => utf8_encode($data["titulo"]),
		            'description' => utf8_encode($data["resumo"]),
		            'start' => $start,
		            'url' => $data["url"],
		        );
		
		        $data_final = System::FormatarData($data['data_final'], 'Y-m-d');
		        if( Validacao::isData($data_final) ){
		            $end = new DateTime(System::FormatarData($data_final, "Y-m-d")." ".$data["hora"]);
		            $item['end'] = $end->format('c');
		        }
		
		        $itens[] = $item;
		    }
		    	
		    return json_encode($itens);
		}
		
	}
?>