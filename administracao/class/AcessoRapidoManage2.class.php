<? 
	class AcessoRapidoManage2 extends AcessoRapidoManage { 
		
		public static function consultarSearchQuery(array $searchQueryComparerCollection=array(), array $searchQueryOrderCollection=array(), $limitStart=0, $limitCount=0){
			$value = AcessoRapidoManage::consultarSearchQuery($searchQueryComparerCollection, $searchQueryOrderCollection, $limitStart, $limitCount);
				
			for ($i=0; $i < count($value); $i++){
				$value[$i]["url"] = str_replace("$", Url::_Path(), $value[$i]["url"]);
			}
			
			return $value;
		}
		
		public static function Menu(){
			$Blocos = AcessoRapidoBlocoManage::consultarAcessoRapidoBlocoAttribute("", "", "", AcessoRapidoBlocoAttribute::Prioridade());
			
			$Menu = array();
			
			for($i=0; $i < count($Blocos); $i++){
				$Itens = AcessoRapidoManage2::FilhosByAcessoRapidoAndBloco($Blocos[$i]["id_acesso_rapido_bloco"], 0);
				for ($j = 0; $j < count($Itens); $j++) {
					$aux = AcessoRapidoManage2::FilhosByAcessoRapidoAndBloco($Blocos[$i]["id_acesso_rapido_bloco"], $Itens[$j]["id_acesso_rapido"]);
					$Itens[$j]["Itens"] = $aux;
					$Itens[$j]["Itens_Count"] = count($aux);
				}
				
				$Menu["Bloco_".$Blocos[$i]["id_acesso_rapido_bloco"]] = $Blocos[$i];
				$Menu["Bloco_".$Blocos[$i]["id_acesso_rapido_bloco"]]["Itens"] = $Itens;
				$Menu["Bloco_".$Blocos[$i]["id_acesso_rapido_bloco"]]["Itens_Count"] = count($Itens);
			}
			
			return $Menu;
		}
		
		public static function ItensByBloco($IdBloco){
			return AcessoRapidoManage::consultarSearchQuery(
				array(
					new SearchQueryComparer(AcessoRapidoAttribute::IdAcessoRapidoBloco(), SearchComparer::Igual(), SearchCondition::E(), $IdBloco),
					new SearchQueryComparer(AcessoRapidoAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1)
				),
				array(
					new SearchQueryOrder(AcessoRapidoAttribute::Prioridade(), SearchOrder::Crescente())
				)
			);
		}
		
		public static function Menu_Blocos(){
			$Blocos = AcessoRapidoBlocoManage::consultarAcessoRapidoBlocoAttribute("", "", "", AcessoRapidoBlocoAttribute::Prioridade());
					
			for($i=0; $i < count($Blocos); $i++){
				$Blocos[$i]["Itens"] = AcessoRapidoManage::ItensByBloco($Blocos[$i]["id_acesso_rapido_bloco"]);
			}
				
			return $Blocos;
		}
		
		public static function Ordenar($IdAcessoRapido, $Ordem=1){
			$obj_atual = new AcessoRapido();
			if(!$obj_atual->buscarAcessoRapido(1, $IdAcessoRapido)){ return false; }			
			
			$sql = "";
			switch ($Ordem){
				case 1 : { //subir
					$query = SearchMounter::MounterByQueryLimit(AcessoRapidoAttribute::_Table(), array(
							new SearchComparer(AcessoRapidoAttribute::IdAcessoRapidoPai(), SearchComparer::Igual(), SearchCondition::E(), intval($obj_atual->getIdAcessoRapidoPai())),
							new SearchComparer(AcessoRapidoAttribute::Prioridade(), SearchComparer::Menor(), SearchCondition::E(), intval($obj_atual->getPrioridade())),
					), array(), 0, 1);
				}break;
				case 0 : { //descer
					$query = SearchMounter::MounterByQueryLimit(AcessoRapidoAttribute::_Table(), array(
							new SearchComparer(AcessoRapidoAttribute::IdAcessoRapidoPai(), SearchComparer::Igual(), SearchCondition::E(), intval($obj_atual->getIdAcessoRapidoPai())),
							new SearchComparer(AcessoRapidoAttribute::Prioridade(), SearchComparer::Maior(), SearchCondition::E(), intval($obj_atual->getPrioridade())),
					), array(), 0, 1);
				}break;
			}
			if(!empty($sql)){
				$obj_alterar = new AcessoRapido();
				if(!$obj_alterar->buscarAcessoRapido(4, $sql)){ return false; }

				$aux = $obj_atual->getPrioridade();
				$obj_atual->setPrioridade( $obj_alterar->getPrioridade() );
				$obj_alterar->setPrioridade( $aux );

				$obj_atual->alterarAtributoPrioridade();
				$obj_alterar->alterarAtributoPrioridade();
				
				return true;
			}
			
			return false;
		}
		
		public static function Reordenar($IdAcessoRapido=0, $Ordem=0){
			
			$Filhos = AcessoRapidoManage2::AcessoRapidosByPaiFull($IdAcessoRapido);

			for($i=0; $i < count($Filhos); $i++){
				$Ordem++;
				
				if($Filhos[$i]["prioridade"] != $Ordem){
					AcessoRapidoManage2::alterarAtributoPrioridade($Filhos[$i]["id_acesso_rapido"], $Ordem);
				}
				
				$Ordem = AcessoRapidoManage2::Reordenar($Filhos[$i]["id_acesso_rapido"], $Ordem);
			}
			
			return $Ordem;			
		}
		
		public static function HerancaByString($IdAcessoRapido){
			
			if($IdAcessoRapido > 0){
				$AcessoRapido = new AcessoRapido();
				if(!$AcessoRapido->buscarAcessoRapido(1, $IdAcessoRapido)){ return "";}
				
				if($AcessoRapido->getIdAcessoRapido() == $AcessoRapido->getIdAcessoRapidoPai()){
					return $AcessoRapido->getNome();
				}
				
				if($AcessoRapido->getIdAcessoRapidoPai() > 0){
					return AcessoRapidoManage2::HerancaByString($AcessoRapido->getIdAcessoRapidoPai())." &raquo; ".$AcessoRapido->getNome();
				}else{
					return $AcessoRapido->getNome();
				}
			}
			
			return "";
		}
		
		public static function PaiRootByAcessoRapido($IdAcessoRapido){
			
			if($IdAcessoRapido > 0){
				
				$AcessoRapido = AcessoRapidoManage2::buscarAcessoRapido(1, $IdAcessoRapido);
				$IdPai = intval($AcessoRapido["id_acesso_rapido_pai"]);
				
				if($IdPai > 0){
					return AcessoRapidoManage2::PaiRootByAcessoRapido($IdPai);
				}
			}
			
			return $IdAcessoRapido;
		}
		
		public static function FilhosByStringIn($IdAcessoRapido){
			
			if(AcessoRapidoManage2::FilhosCount($IdAcessoRapido) > 0){
				
				$Filhos = AcessoRapidoManage2::FilhosByAcessoRapido($IdAcessoRapido);
				$strFilhos = "";
				for ($i=0; $i < count($Filhos); $i++){
					$strFilhos .= ", ".AcessoRapidoManage2::FilhosByStringIn($Filhos[$i]["id_acesso_rapido"]);
				}
				
				return $IdAcessoRapido.$strFilhos;
			}
			
			return $IdAcessoRapido;
		}
		
		public static function AcessoRapidosByPai($IdAcessoRapidoPai, $Limit=0){
			$Limit = (($Limit==0) ? 1000 : $Limit );
			
			return AcessoRapidoManage::consultarSearchQuery(
				array(
					new SearchQueryComparer(AcessoRapidoAttribute::IdAcessoRapidoPai(), SearchComparer::Igual(), SearchCondition::E(), $IdAcessoRapidoPai)
				),
				array(
					new SearchQueryOrder(AcessoRapidoAttribute::Prioridade(), SearchOrder::Crescente())
				),
				0, $Limit
			);
		}
		
		public static function AcessoRapidosByPaiFull($IdAcessoRapidoPai){
			return self::AcessoRapidosByPai($IdAcessoRapidoPai);
		}
		
		public static function FilhosCount($IdAcessoRapido){
			return AcessoRapidoManage::count(SearchMounter::Count(AcessoRapidoAttribute::_Table(), array(
				new SearchQueryComparer(AcessoRapidoAttribute::IdAcessoRapidoPai(), SearchComparer::Igual(), SearchCondition::E(), $IdAcessoRapido)
			)));
		}

		public static function FilhosByAcessoRapido($IdAcessoRapido){
			return self::AcessoRapidosByPai($IdAcessoRapido);
		}
		
		public static function FilhosByAcessoRapidoAndBloco($IdAcessoRapidoBloco, $IdAcessoRapidoPai){
			return AcessoRapidoManage2::consultarSearchQuery(
				array(
					new SearchQueryComparer(AcessoRapidoAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), CurrentSite::IdeOrigem()),
					new SearchQueryComparer(AcessoRapidoAttribute::IdAcessoRapidoPai(), SearchComparer::Igual(), SearchCondition::E(), $IdAcessoRapidoPai),
					new SearchQueryComparer(AcessoRapidoAttribute::IdAcessoRapidoBloco(), SearchComparer::Igual(), SearchCondition::E(), $IdAcessoRapidoBloco),
					new SearchQueryComparer(AcessoRapidoAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
				),
				array(
					new SearchQueryOrder(AcessoRapidoAttribute::Prioridade(), SearchOrder::Crescente())
				)
			);
		}
		
		public static function AcessoRapidosBySelect($IdAcessoRapido=0){
				
			$comparers = array();
			$comparers[] = new SearchQueryComparer(AcessoRapidoAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1);
			if( $IdAcessoRapido > 0 ){
				$comparers[] = new SearchQueryComparer(AcessoRapidoAttribute::IdAcessoRapido(), SearchComparer::Diferente(), SearchCondition::E(), $IdAcessoRapido);
				$comparers[] = new SearchQueryComparer(AcessoRapidoAttribute::IdAcessoRapidoPai(), SearchComparer::Diferente(), SearchCondition::E(), $IdAcessoRapido);
			}
				
			$orders = array(
					new SearchQueryOrder(AcessoRapidoAttribute::Prioridade(), SearchOrder::Crescente())
			);
				
			$query = SearchMounter::MounterByQueryLimit(AcessoRapidoAttribute::_Table(), $comparers, $orders, 0, 0);
				
			$vobj = AcessoRapidoManage2::consultarAcessoRapido(3, $query);
				
			$cats = array();
			for($i=0; $i < count($vobj); $i++){
				$cats[$i][0] = AcessoRapidoManage2::HerancaByString($vobj[$i]["id_acesso_rapido"]);
				$cats[$i][1] = $vobj[$i]["id_acesso_rapido"];
				$cats[$i][2] = $vobj[$i]["identificador"];
			}
				
			return $cats;
		}
	
		
	} 
?>