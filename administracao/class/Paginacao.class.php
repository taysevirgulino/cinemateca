<? 
	class Paginacao { 
		protected $myRegistrosPorPagina, $myRegistrosAfetados, $myPaginas, $myNumeroPagina, $myPaginacaoInicio, $myLabelPaginacao, $myUrl;
		 
		public function __construct($RegistrosPorPagina, $RegistrosAfetados, $NumeroPagina, $Url){
			$this->setRegistrosPorPagina($RegistrosPorPagina);
			$this->setRegistrosAfetados($RegistrosAfetados);
			$this->setNumeroPagina($NumeroPagina);
			$this->setUrl($Url);
			
			$count = floatval($RegistrosAfetados / $RegistrosPorPagina);
			$count = (($count <= 1) ? 0 : ceil($count) );
			$this->setPaginas( $count );
			
			$this->GerarPaginacao();
		} 
		public function __destruct(){} 
		
		public function GerarPaginacao(){
			$ifor = 0;
			$qpg = 10;
			$qtd_page = $this->getPaginas();
			$search_page = $this->getNumeroPagina();
			
			if( $search_page > 0){
				$this->setPaginacaoInicio( $search_page * $this->getRegistrosPorPagina() );
			}else{
				$this->setPaginacaoInicio( 0 );
			}
			
			if( $qtd_page >= $qpg){
				if( $search_page >= $qpg){
					$ifor = $search_page - ($qpg-1);
					if($ifor < 0)
						$ifor = 1;
				}
			}
			if($search_page >= 1)
				$label_paginacao .="<a href=\"".$this->getUrl()."&pg=".($search_page-1)."\" class=\"paginacao_navegacao\">Anterior</a>&nbsp;";
			else 	
				$label_paginacao .="<span class=\"paginacao_navegacao_des\">Anterior</span>&nbsp;";;
			
			$j = 0;
			
			for ($i=$ifor; ( ($i < $qtd_page) && ($j < $qpg)); $i++){
				if($i == $search_page)
					$label_paginacao .= "<span class=\"paginacao_item_atual\">".($i+1)."</span>&nbsp;";
				else 
					$label_paginacao .= "<a href=\"".$this->getUrl()."&pg=".$i."\" class=\"paginacao_item\">".($i+1)."</a>&nbsp;";
				$j++;
			}
			
			if(($search_page+1) < $qtd_page)
				$label_paginacao .= "<a href=\"".$this->getUrl()."&pg=".($search_page+1)."\" class=\"paginacao_navegacao\">Próximo</a>&nbsp;";
			else 	
				$label_paginacao .="<span class=\"paginacao_navegacao_des\">Próximo</span>";;
			
			$label_paginacao = (($qtd_page>0) ? $label_paginacao : '' );
			
			$this->setLabelPaginacao( $label_paginacao );
		}
		
		public function Result( $vobj ){
			$vresult = array();
			$h=0;
			for($i=$this->getPaginacaoInicio(), $j = 0; ( ($i < count($vobj)) && ($j < $this->getRegistrosPorPagina()) ); $i++, $j++){
				$vresult[$h++] = $vobj[$i];	
			}
			return $vresult;
		}
		 
		public function setRegistrosPorPagina( $value ){ $this->myRegistrosPorPagina = $value; } 
		public function getRegistrosPorPagina(){ return $this->myRegistrosPorPagina; } 

		public function setRegistrosAfetados( $value ){ $this->myRegistrosAfetados = $value; } 
		public function getRegistrosAfetados(){ return $this->myRegistrosAfetados; } 

		public function setPaginas( $value ){ $this->myPaginas = $value; } 
		public function getPaginas(){ return $this->myPaginas; } 

		public function setNumeroPagina( $value ){ $this->myNumeroPagina = $value; } 
		public function getNumeroPagina(){ return $this->myNumeroPagina; } 

		public function setPaginacaoInicio( $value ){ $this->myPaginacaoInicio = $value; } 
		public function getPaginacaoInicio(){ return $this->myPaginacaoInicio; } 

		public function setLabelPaginacao( $value ){ $this->myLabelPaginacao = $value; } 
		public function getLabelPaginacao(){ return $this->myLabelPaginacao; } 
		
		public function setUrl( $value ){ $this->myUrl = $value; } 
		public function getUrl(){ return $this->myUrl; } 
	} 
?>