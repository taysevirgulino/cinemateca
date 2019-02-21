<?
	class TagPesquisar {
		public $SQL, $id_tag; 
		
		public function __construct($frm_id_tag){
			$this->id_tag = $frm_id_tag; 
			
			$this->SQL = $this->Montar();
		} 
		public function __destruct(){} 
		
		private function Montar(){
			
			$expTag= "";
			if(!empty($this->id_tag)){
				$expTag = "(tb_tag_relacao.id_tag = ".$this->id_tag.") AND ";
			}
			
			$sql = "SELECT DISTINCT 
					  #SELECT#
					FROM
						tb_noticia
						INNER JOIN tb_tag_relacao ON (tb_noticia.id_noticia = tb_tag_relacao.id_noticia)
					WHERE
					  $expTag
					  (tb_noticia.`status` = 1)
	 				#WHERE#
					#ORDER# 
					#LIMIT#";
			
			return $sql;
		}
		
		public function Count(){
			$sql = $this->SQL;
			$sql = str_ireplace("#SELECT#", "COUNT(tb_noticia.id_noticia) AS `count`", $sql);
			$sql = str_ireplace("#WHERE#", "", $sql);
			$sql = str_ireplace("#ORDER#", "", $sql);
			$sql = str_ireplace("#LIMIT#", "", $sql);
			
			return SearchMysqlQuery::CountBySql($sql);
		}
		
		public function Pesquisar($LimitInicio, $LimitQtd){
			
			$sql = $this->SQL;
			$sql = str_ireplace("#SELECT#", "tb_noticia.*", $sql);
			$sql = str_ireplace("#WHERE#", "", $sql);
			$sql = str_ireplace("#ORDER#", " ORDER BY tb_noticia.datahora DESC ", $sql);
			$sql = str_ireplace("#LIMIT#", " LIMIT $LimitInicio,$LimitQtd ", $sql);
				
			return NoticiaManage::consultarNoticia(3, $sql);
		}
	}
?>