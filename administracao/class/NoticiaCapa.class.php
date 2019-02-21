<? 
	class NoticiaCapa { 
		
		public $myIdsNoticias, $myTimestamp;
		
		public function __construct(){
			$this->myIdsNoticias = "0";
			$this->myTimestamp = (System::SomarData(date("Y-m-d"), -30)." 00:00:00");
			return $this;
		}
		public function __destruct(){}
		
		
		public function Noticias(){
			
			$itens = array();
			
			$blocos = AreaPublicacaoBlocoManage2::Blocos();
			for ($i = 0; $i < count($blocos); $i++) {
				$itens[ "B".$blocos[$i]["id_area_publicacao_bloco"] ] = $blocos[$i];
			}
			
			$areas = AreaPublicacaoManage2::Areas_Ativas();
			for ($j = 0; $j < count($areas); $j++) {
				$id = "A".$areas[$j]["id_area_publicacao"];
				$itens[ $id ] = $areas[$j];
				$itens[ $id ]["Noticias"] = NoticiaManage2::Noticias_Area($areas[$j]["id_area_publicacao"], intval($areas[$j]["quantidade"]));
			}
			
			return $itens;
		}
		
		public function Ultimas($Limit, $IdNotIn=0){
				
			return NoticiaManage2::consultarSearchQuery(
				array(
					new SearchQueryComparer(NoticiaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), NoticiaStatus::Publicado()),
					new SearchQueryComparer(NoticiaAttribute::IdNoticia(), SearchComparer::Diferente(), SearchCondition::E(), $IdNotIn)
				),
				array(
					new SearchQueryOrder(NoticiaAttribute::Datahora(), SearchOrder::Decrescente())
				),
				0, $Limit
			);
			
		}
		
		public function MaisLidas($Limit=5){
			
			return NoticiaManage2::consultarSearchQuery(
				array(
					new SearchQueryComparer(NoticiaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), NoticiaStatus::Publicado()),
					new SearchQueryComparer(NoticiaAttribute::FotoAreaPublicacao(), SearchComparer::Diferente(), SearchCondition::E(), ''),
					//new SearchQueryComparer(NoticiaAttribute::Datahora(), SearchComparer::Maior(), SearchCondition::E(), $this->myTimestamp)
				),
				array(
					new SearchQueryOrder(NoticiaAttribute::Click(), SearchOrder::Decrescente()),
					new SearchQueryOrder(NoticiaAttribute::Datahora(), SearchOrder::Decrescente())
				),
				0, $Limit
			);
	
		}
		
		public function MaisComentadas($Limit=5){
			
			return NoticiaManage2::consultarSearchQuery(
				array(
					new SearchQueryComparer(NoticiaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), NoticiaStatus::Publicado()),
					new SearchQueryComparer(NoticiaAttribute::Datahora(), SearchComparer::Maior(), SearchCondition::E(), $this->myTimestamp)
				),
				array(
					new SearchQueryOrder(NoticiaAttribute::Comments(), SearchOrder::Decrescente()),
					new SearchQueryOrder(NoticiaAttribute::Datahora(), SearchOrder::Decrescente())
				),
				0, $Limit
			);
			
		}
		
		public function MaisCompartilhadas($Limit=5){
			
			return NoticiaManage2::consultarSearchQuery(
				array(
					new SearchQueryComparer(NoticiaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), NoticiaStatus::Publicado()),
					new SearchQueryComparer(NoticiaAttribute::Datahora(), SearchComparer::Maior(), SearchCondition::E(), $this->myTimestamp)
				),
				array(
					new SearchQueryOrder(NoticiaAttribute::Shares(), SearchOrder::Decrescente()),
					new SearchQueryOrder(NoticiaAttribute::Datahora(), SearchOrder::Decrescente())
				),
				0, $Limit
			);
			
		}
		
		public function Imagens($Limit=24){
			
			$vobj = NoticiaManage2::consultarSearchQuery(
				array(
					new SearchQueryComparer(NoticiaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), NoticiaStatus::Publicado()),
					new SearchQueryComparer(NoticiaAttribute::FotoAreaPublicacao(), SearchComparer::Diferente(), SearchCondition::E(), '')
				),
				array(
					new SearchQueryOrder(NoticiaAttribute::Datahora(), SearchOrder::Decrescente())
				),
				0, $Limit
			);
			
			for ($i = 0; $i < count($vobj); $i++) {
				$objArea = new AreaPublicacao();
				$objArea->buscarAttribute(AreaPublicacaoAttribute::IdAreaPublicacao(), $vobj[$i]["id_area_publicacao"]);
				
				$vobj[$i]["width"] = $objArea->getImgWidth();
				$vobj[$i]["height"] = $objArea->getImgHeight();
			}
			
			return $vobj;
		}
	} 
?>