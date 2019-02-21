<?
	class NoticiaTagPesquisar {
		public $SQL = array(), $id_tag; 
		
		public function __construct($frm_id_tag){
			$this->id_tag = intval($frm_id_tag); 
			
			$this->SQL = $this->Montar();
		} 
		public function __destruct(){} 
		
		private function Montar(){
			
			$objTagRelacao = new TagRelacao();
			$itens = $objTagRelacao->consultar(
				SearchMounter::MounterByComparer(TagRelacaoAttribute::_Table(), TagRelacaoAttribute::IdTag(), SearchComparer::Igual(), $this->id_tag)
			);
			$in = array();
			foreach ($itens as $relacao) {
				$in[] = $relacao->getIdNoticia();
			}
			if( count($in) <= 0){
				return array();
			}
			$query = array(
				NoticiaAttribute::IdNoticia() => array('$in' => $in)
			);
			
			return $query;
			
		}
		
		public function Count(){
			return NoticiaManage::count($this->SQL);
		}
		
		public function Pesquisar($LimitInicio, $LimitQtd){
			return NoticiaManage2::consultar($this->SQL, SearchOrderMongo::Mounter(NoticiaAttribute::Datahora(), SearchOrder::Decrescente()), $LimitInicio, $LimitQtd);
		}
	}
?>