<?
	class NoticiaPesquisar {
		public $QueryGroup = array(), $QueryOrder = array(), $parametros = array();
		
		public function __construct($frm_parametros=array()){
			$this->parametros = $frm_parametros;
			
			$this->QueryGroup = $this->Montar();
		} 
		public function __destruct(){} 
		
		private function Montar(){
			
			$comparersGroup1 = array();
			$comparersGroup2 = array();
			$comparersGroup3 = array();
			
			$comparersGroup1[] = new SearchQueryComparer(NoticiaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), NoticiaStatus::Publicado());
			$comparersGroup1[] = new SearchQueryComparer(NoticiaAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), CurrentSite::IdeOrigem());
			
			if( $this->parametros["id_editoria"] > 0 ){
				$comparersGroup1[] = new SearchQueryComparer(NoticiaAttribute::IdEditoria(), SearchComparer::Igual(), SearchCondition::E(), $this->parametros["id_editoria"]);
			}
			
			if( $this->parametros["area"] > 0 ){
				$comparersGroup1[] = new SearchQueryComparer(NoticiaAttribute::IdAreaPublicacao(), SearchComparer::Igual(), SearchCondition::E(), $this->parametros["area"]);
			}
			
			if( $this->parametros["notin"] > 0 ){
				$comparersGroup1[] = new SearchQueryComparer(NoticiaAttribute::IdNoticia(), SearchComparer::Diferente(), SearchCondition::E(), $this->parametros["notin"]);
			}
			
			if( !empty($this->parametros["palavra"]) ){
				$comparersGroup2[] = new SearchQueryComparer(NoticiaAttribute::Titulo(), SearchComparer::Contem(), SearchCondition::OU(), $this->parametros["palavra"]);
				$comparersGroup2[] = new SearchQueryComparer(NoticiaAttribute::Resumo(), SearchComparer::Contem(), SearchCondition::OU(), $this->parametros["palavra"]);
				$comparersGroup2[] = new SearchQueryComparer(NoticiaAttribute::Texto(), SearchComparer::Contem(), SearchCondition::OU(), $this->parametros["palavra"]);
			}
			
			switch ($this->parametros["filtro"]){
				case "imagem" : {
					$comparersGroup3[] = new SearchQueryComparer(NoticiaAttribute::FotoArquivo(), SearchComparer::Diferente(), SearchCondition::E(), '');
					$comparersGroup3[] = new SearchQueryComparer(NoticiaAttribute::Datahora(), SearchComparer::MaiorIgual(), SearchCondition::E(), date("Y-m-d 00:00:00"));
					$comparersGroup3[] = new SearchQueryComparer(NoticiaAttribute::Datahora(), SearchComparer::MenorIgual(), SearchCondition::E(), date("Y-m-d 23:59:59"));
				}break;
				case "lidas" : {
					$comparersGroup3[] = new SearchQueryComparer(NoticiaAttribute::Datahora(), SearchComparer::MaiorIgual(), SearchCondition::E(), (System::SomarData(date("Y-m-d"), -7)." 00:00:00"));
					$this->QueryOrder = array(
						new SearchQueryOrder(NoticiaAttribute::Click(), SearchOrder::Decrescente()),
						new SearchQueryOrder(NoticiaAttribute::Datahora(), SearchOrder::Decrescente()),
					);
				}break;
				case "comentadas" : {
					$comparersGroup3[] = new SearchQueryComparer(NoticiaAttribute::Datahora(), SearchComparer::MaiorIgual(), SearchCondition::E(), (System::SomarData(date("Y-m-d"), -7)." 00:00:00"));
					$this->QueryOrder = array(
						new SearchQueryOrder(NoticiaAttribute::Comments(), SearchOrder::Decrescente()),
						new SearchQueryOrder(NoticiaAttribute::Datahora(), SearchOrder::Decrescente()),
					);
				}break;
			}
			
			return array(
				new SearchQueryComparerGroup( $comparersGroup1 ),
				new SearchQueryComparerGroup( $comparersGroup2 ),
				new SearchQueryComparerGroup( $comparersGroup3 )
			);
	
		}
		
		public function Count(){

			$query = SearchMounter::MounterByQueryCountGroup(
				NoticiaAttribute::_Table(),
				$this->QueryGroup
			);
			
			return NoticiaManage::count($query);
		}
		
		public function Pesquisar($LimitInicio, $LimitQtd){
			
			if( count($this->QueryOrder) <= 0 ){
				$this->QueryOrder = array(
					new SearchQueryOrder(NoticiaAttribute::Datahora(), SearchOrder::Decrescente())
				);
			}
			
			$query = SearchMounter::MounterByQueryLimitGroup(
				NoticiaAttribute::_Table(),
				$this->QueryGroup,
				$this->QueryOrder, 
				$LimitInicio, $LimitQtd
			);
			
			return NoticiaManage2::consultar($query);
			
		}
	}
?>