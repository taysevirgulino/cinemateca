<?
	class TagManage2 extends TagManage { 
		
		public static function consultar($query = null, $sort = null, $offset = null, $limit = null){
			$value = TagManage::consultar($query, $sort, $offset, $limit);
			for ($i=0; $i < count($value); $i++){
				$value[$i]["url"] = Url::Tag($value[$i]["slug"]);
			}
			return $value;
		}
		
		public static function consultarTag( $tipo, $valor ){
			$value = TagManage::consultarTag( $tipo, $valor );
			
			for ($i=0; $i < count($value); $i++){
				$value[$i]["url"] = Url::Tag($value[$i]["slug"]);
			}
				
			return $value;
		}
		
		public static function Autocomplete( $Chave ){
			
			$query = SearchMounter::MounterByComparerOrder(TagAttribute::_Table(), TagAttribute::Nome(), SearchComparer::Contem(), $Chave, TagAttribute::Nome(), SearchOrder::Crescente());
			
			return TagManage2::consultar($query);
		}
		
		public static function Gerenciar($IdNoticia, $vTagStr){
			if($IdNoticia <= 0){
				return false;
			}
			
			$obj = new TagRelacao();
			$objects = $obj->consultar(
				SearchMounter::MounterByComparer(TagRelacaoAttribute::_Table(), TagRelacaoAttribute::IdNoticia(), SearchComparer::Igual(), $IdNoticia)
			);
			foreach ($objects as $relacao) {
				$relacao->excluir();
			}
				
			for ($i=0; $i < count($vTagStr); $i++){
				$id_tag = 0;
				$slug = Url::_RewriteString($vTagStr[$i]);
				$Tag = new Tag();
				$query = SearchMounter::MounterByQueryLimit(TagAttribute::_Table(), array( new SearchQueryComparer(TagAttribute::Slug(), SearchComparer::Igual(), SearchCondition::E(), $slug) ), array(), 0, 1);
				if($Tag->buscar($query)){
					$id_tag = $Tag->getIdTag();
				}else{
					$Tag->setIdTag( -1 );
					$Tag->setIdentificador( null );
					$Tag->setNome( $vTagStr[$i] );
					$Tag->setSlug( $slug );
					$Tag->setQuantidade( 0 );
						
					if($Tag->inserirTag()){
						$id_tag = $Tag->getIdTag();
					}
				}
				if($id_tag > 0){
					TagRelacaoManage::inserirTagRelacao(null, null, $id_tag, $IdNoticia);
				}
			}
				
			return true;
		}
		
		public static function Tags_Noticia($IdNoticia, $Limit=100){
			
			$adapter = Config::getAdapterService('Tag');
			
			switch (get_class($adapter)) {
				case 'AdapterServiceMongo': {
					
					$objTagRelacao = new TagRelacao();
					$itens = $objTagRelacao->consultar( 
						SearchMounter::MounterByComparer(TagRelacaoAttribute::_Table(), TagRelacaoAttribute::IdNoticia(), SearchComparer::Igual(), $IdNoticia)
					);
					$in = array();
					foreach ($itens as $relacao) {
						$in[] = $relacao->getIdTag();
					}
					if( count($in) <= 0){
						return array();
					}
					$query = array(
						TagAttribute::IdTag() => array('$in' => $in)
					);
					$sort = SearchOrderMongo::Mounter(TagAttribute::Nome(), SearchOrder::Crescente());
					
					return TagManage2::consultar($query, $sort, 0, $Limit);
				} break;
				default:{
					$query = "SELECT DISTINCT 
							  tb_tag.*
							FROM
							  tb_tag
							  INNER JOIN tb_tag_relacao ON (tb_tag.id_tag = tb_tag_relacao.id_tag)
							WHERE
							  tb_tag_relacao.id_noticia = $IdNoticia
							ORDER BY
							  tb_tag.nome
							LIMIT $Limit";
					
					return TagManage2::consultar($query);
				} break;
			}
			
			return array();
		}
		
		public static function TagsByNoticia( $IdNoticia ){
			
			$Tags = self::Tags_Noticia($IdNoticia);
				
			for($i=0; $i < count($Tags); $i++){
				$Tags[$i][5] = base64_encode($Tags[$i]["nome"]);
			}
				
			return $Tags;
		}
		
	} 
?>