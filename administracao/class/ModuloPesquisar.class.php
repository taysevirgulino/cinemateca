<?
	class ModuloPesquisar {
		public $SQL, $palavra_chave; 
		/**
		 * @var ArrayObject
		 */
		private $collection;
		
		public function __construct($frm_pesquisa){
			$this->palavra_chave = $frm_pesquisa; 
			$this->collection = new ArrayObject(array());
			
			$this->Executar();
		} 
		public function __destruct(){}  
		
		private function Modulo_Noticias(){
			
			$query = SearchMounter::MounterByQueryLimitGroup(
				NoticiaAttribute::_Table(),
				array(
					new SearchQueryComparerGroup(array(
						new SearchQueryComparer(NoticiaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), NoticiaStatus::Publicado()),
					)),
					new SearchQueryComparerGroup(array(
						new SearchQueryComparer(NoticiaAttribute::Titulo(), SearchComparer::Contem(), SearchCondition::OU(), $this->palavra_chave),
						new SearchQueryComparer(NoticiaAttribute::Texto(), SearchComparer::Contem(), SearchCondition::OU(), $this->palavra_chave),
					))
				),
				array(
					new SearchQueryOrder(NoticiaAttribute::Datahora(), SearchOrder::Decrescente())
				),
				0, 10
			);
				
			$objNoticia = new Noticia();
			$objs = $objNoticia->consultar($query);
				
			foreach ($objs as $value) {
				$this->add(
					$value->getIdNoticia(),
					$value->getIdentificador(),
					$value->Datahora(),
					$value->getTitulo(),
					$value->getResumo(),
					"Notícia",
					Url::Noticia($value->getIdNoticia(), $value->getIdentificador(), $value->getTitulo())
				);
			}
			
		}
		
		private function Modulo_Cursos(){
			
			$query = SearchMounter::MounterByQueryLimitGroup(
				CursoAttribute::_Table(),
				array(
					new SearchQueryComparerGroup(array(
						new SearchQueryComparer(CursoAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
					)),
					new SearchQueryComparerGroup(array(
						new SearchQueryComparer(CursoAttribute::Titulo(), SearchComparer::Contem(), SearchCondition::OU(), $this->palavra_chave),
						new SearchQueryComparer(CursoAttribute::Descricao(), SearchComparer::Contem(), SearchCondition::OU(), $this->palavra_chave),
					))
				),
				array(
					new SearchQueryOrder(CursoAttribute::Prioridade(), SearchOrder::Decrescente())
				),
				0, 10
			);
				
			$objCurso = new Curso();
			$objs = $objCurso->consultar($query);
				
			foreach ($objs as $value) {
				$objCategoria = new CursoCategoria();
				$objCategoria->buscarAttribute(CursoCategoriaAttribute::IdCursoCategoria(), $value->getIdCursoCategoria());
				
				$this->add(
					$value->getIdCurso(),
					$value->getIdentificador(),
					$value->Datahora(),
					$value->getTitulo(),
					substr(strip_tags(System::_TextByHtml($value->getDescricao())), 0, 300),
					"Curso",
					sprintf('#/fgv/curso/curso/%1$s/%2$s/%3$s/', $objCategoria->getIdCursoInstituicao(), $objCategoria->getIdCursoCategoria(), $value->getIdCurso())
				);
			}
			
		}
		
		private function Executar(){
			
			$this->Modulo_Noticias();
			$this->Modulo_Cursos();

		}
		
		private function add( $id, $identificador, $datahora, $titulo, $descricao, $legenda, $link ){
			$value = array(
					"id" => $id,
					"identificador" => $identificador,
					"datahora" => $datahora,
					"titulo" => $titulo,
					"descricao" => $descricao,
					"legenda" => $legenda,
					"url" => $link
			);
			$this->collection->append($value);
		}
		
		public function Count(){
			return $this->collection->count();
		}
		
		public function Pesquisar($start, $limit){
			
			$result = array();
			
			$count = $this->Count();
			for ($i = $start; $i < $count; $i++) {
				if( $this->collection->offsetExists($i) ){
					$result[] = $this->collection->offsetGet($i);
					$limit--;
					if($limit <= 0){
						break;
					}
				}
			}
			
			return $result;
			
		}
	}
?>