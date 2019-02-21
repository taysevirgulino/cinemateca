<? 
	class LocalidadeManage2 extends LocalidadeManage { 

		public static function buscarLocalidade( $tipo, $valor ){ 
			$value = LocalidadeManage::buscarLocalidade( $tipo, $valor );
			
			$value["label"] = $value["cidade"]." / ".$value["uf"];
			
			return $value;
		}
		
		public static function CidadesByUf ($UF) {
			
			return LocalidadeManage::consultarSearchQuery(
				array(
					new SearchQueryComparer(LocalidadeAttribute::Uf(), SearchComparer::Igual(), SearchCondition::E(), $UF),
				),
				array(
					new SearchQueryOrder(LocalidadeAttribute::Cidade(), SearchOrder::Crescente())
				)
			);
			
		}
		
		public static function IdLocalidade($uf, $cidade){
			$IdLocalidade = 5411; //PALMAS
			
			$query = SearchMounter::Query(
				LocalidadeAttribute::_Table(),
				array(
					new SearchQueryComparer(LocalidadeAttribute::Uf(), SearchComparer::Igual(), SearchCondition::E(), $uf),
					new SearchQueryComparer(LocalidadeAttribute::Cidade(), SearchComparer::Igual(), SearchCondition::E(), $cidade),
				),
				array(),
				0, 1
			);
			
			$obj = new Localidade();
			if($obj->buscar($query)){
				$IdLocalidade = intval($obj->getIdLocalidade());
			}
			
			return $IdLocalidade;
		}
		
		public static function IdLocalidade_CEP($cep){
			
			$id_localidade = 5411; //PALMAS
			 
			$cep = preg_replace("/[^0-9]+/", "", $cep);
			
			if(strlen($cep) < 8){
				return $id_localidade;
			}
			
			$host = "http://cep.correiocontrol.com.br/$cep.json";
			$rs = file($host);
				
			$result = json_decode($rs[0], true);
			if(is_array($result)){
				if(!empty($result["bairro"])){
					$id_localidade = LocalidadeManage2::IdLocalidade($result["uf"], utf8_decode($result["localidade"]));
				}
			}
			
			return $id_localidade;
		}
		
		public static function Itens_Filtro(){
			
			$objLocalidade = new Localidade();
			$itensLocalidade = $objLocalidade->consultarSearchQuery(
				array(
					new SearchQueryComparer(LocalidadeAttribute::Uf(), SearchComparer::Igual(), SearchCondition::E(), 'TO'),
				),
				array(
					new SearchQueryOrder(LocalidadeAttribute::Cidade(), SearchOrder::Crescente())
				)
			);
			
			$objs = array();
			
			foreach ($itensLocalidade as $valueLocalidade) {
				$query = SearchMounter::Query(
					VagaAttribute::_Table(),
					array(
						new SearchQueryComparer(VagaAttribute::IdLocalidade(), SearchComparer::Igual(), SearchCondition::E(), $valueLocalidade->getIdLocalidade()),
						new SearchQueryComparer(VagaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), VagaStatus::Publicado()),
					)
				);
				$count = VagaManage::count($query);
					
				if( $count > 0 ){
					$objs[] = array(
						"id" => $valueLocalidade->getIdLocalidade(),
						"titulo" => sprintf("%s / %s", $valueLocalidade->getCidade(), $valueLocalidade->getUf()),
						"count" =>$count
					);
				}
			}
			
			return $objs;
		}
		
		public static function Itens_Filtro_Curriculo(){
			
			$objLocalidade = new Localidade();
			$itensLocalidade = $objLocalidade->consultarSearchQuery(
				array(
					new SearchQueryComparer(LocalidadeAttribute::Uf(), SearchComparer::Igual(), SearchCondition::E(), 'TO'),
				),
				array(
					new SearchQueryOrder(LocalidadeAttribute::Cidade(), SearchOrder::Crescente())
				)
			);
				
			$objs = array();
				
			foreach ($itensLocalidade as $valueLocalidade) {
				$query = SearchMounter::Query(
					PessoaAttribute::_Table(),
					array(
						new SearchQueryComparer(PessoaAttribute::IdLocalidade(), SearchComparer::Igual(), SearchCondition::E(), $valueLocalidade->getIdLocalidade()),
						new SearchQueryComparer(PessoaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), PessoaStatus::Ativo()),
					)
				);
				$count = PessoaManage::count($query);
					
				if( $count > 0 ){
					$objs[] = array(
						"id" => $valueLocalidade->getIdLocalidade(),
						"titulo" => sprintf("%s / %s", $valueLocalidade->getCidade(), $valueLocalidade->getUf()),
						"count" =>$count
					);
				}
			}
				
			return $objs;
		}
	} 
?>