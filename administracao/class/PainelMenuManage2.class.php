<? 
	class PainelMenuManage2 extends PainelMenuManage { 
		
		public static function consultarSearchQuery(array $searchQueryComparerCollection=array(), array $searchQueryOrderCollection=array(), $limitStart=0, $limitCount=0){
			$value = PainelMenuManage::consultarSearchQuery($searchQueryComparerCollection, $searchQueryOrderCollection, $limitStart, $limitCount);
				
			for ($i=0; $i < count($value); $i++){
				$value[$i]["url"] = str_replace("$", Url::_Path(), $value[$i]["url"]);
			}
			
			return $value;
		}
		
		public static function Menu(){
			
		    $itensPainelMenu = PainelMenuManage::consultarSearchQuery(
		        array(
		            new SearchQueryComparer(PainelMenuAttribute::IdPainelMenuPai(), SearchComparer::Igual(), SearchCondition::E(), 0),
		            new SearchQueryComparer(PainelMenuAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
		        ),
		        array(
		            new SearchQueryOrder(PainelMenuAttribute::Prioridade(), SearchOrder::Crescente())
		        )
		    );
		    
		    foreach ($itensPainelMenu as $i => $valuePainelMenu) {
		        $itensPainelMenu[$i]["url"] = str_replace("$", Url::_Path(), $itensPainelMenu[$i]["url"]);
		        
		        $itens = PainelMenuManage::consultarSearchQuery(
		            array(
		                new SearchQueryComparer(PainelMenuAttribute::IdPainelMenuPai(), SearchComparer::Igual(), SearchCondition::E(), $valuePainelMenu["id_painel_menu"]),
		                new SearchQueryComparer(PainelMenuAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
		            ),
		            array(
		                new SearchQueryOrder(PainelMenuAttribute::Prioridade(), SearchOrder::Crescente())
		            )
		        );
		        foreach ($itens as $j => $value2) {
		            $itens[$j]["url"] = str_replace("$", Url::_Path(), $itens[$j]["url"]);
		        }
		        
		        $itensPainelMenu[$i]["itens"] = $itens;
		    }
			
			return $itensPainelMenu;
		}
		
		public static function Ordenar($IdPainelMenu, $Ordem=1){
			$obj_atual = new PainelMenu();
			if(!$obj_atual->buscarPainelMenu(1, $IdPainelMenu)){ return false; }			
			
			$sql = "";
			switch ($Ordem){
				case 1 : { //subir
					$query = SearchMounter::MounterByQueryLimit(PainelMenuAttribute::_Table(), array(
							new SearchComparer(PainelMenuAttribute::IdPainelMenuPai(), SearchComparer::Igual(), SearchCondition::E(), intval($obj_atual->getIdPainelMenuPai())),
							new SearchComparer(PainelMenuAttribute::Prioridade(), SearchComparer::Menor(), SearchCondition::E(), intval($obj_atual->getPrioridade())),
					), array(), 0, 1);
				}break;
				case 0 : { //descer
					$query = SearchMounter::MounterByQueryLimit(PainelMenuAttribute::_Table(), array(
							new SearchComparer(PainelMenuAttribute::IdPainelMenuPai(), SearchComparer::Igual(), SearchCondition::E(), intval($obj_atual->getIdPainelMenuPai())),
							new SearchComparer(PainelMenuAttribute::Prioridade(), SearchComparer::Maior(), SearchCondition::E(), intval($obj_atual->getPrioridade())),
					), array(), 0, 1);
				}break;
			}
			if(!empty($sql)){
				$obj_alterar = new PainelMenu();
				if(!$obj_alterar->buscarPainelMenu(4, $sql)){ return false; }

				$aux = $obj_atual->getPrioridade();
				$obj_atual->setPrioridade( $obj_alterar->getPrioridade() );
				$obj_alterar->setPrioridade( $aux );

				$obj_atual->alterarAtributoPrioridade();
				$obj_alterar->alterarAtributoPrioridade();
				
				return true;
			}
			
			return false;
		}
		
		public static function Reordenar($IdPainelMenu=0, $Ordem=0){
			
			$Filhos = PainelMenuManage2::PainelMenusByPaiFull($IdPainelMenu);

			for($i=0; $i < count($Filhos); $i++){
				$Ordem++;
				
				if($Filhos[$i]["prioridade"] != $Ordem){
					PainelMenuManage2::alterarAtributoPrioridade($Filhos[$i]["id_painel_menu"], $Ordem);
				}
				
				$Ordem = PainelMenuManage2::Reordenar($Filhos[$i]["id_painel_menu"], $Ordem);
			}
			
			return $Ordem;			
		}
		
		public static function HerancaByString($IdPainelMenu){
			
			if($IdPainelMenu > 0){
				$PainelMenu = new PainelMenu();
				if(!$PainelMenu->buscarPainelMenu(1, $IdPainelMenu)){ return "";}
				
				if($PainelMenu->getIdPainelMenu() == $PainelMenu->getIdPainelMenuPai()){
					return $PainelMenu->getNome();
				}
				
				if($PainelMenu->getIdPainelMenuPai() > 0){
					return PainelMenuManage2::HerancaByString($PainelMenu->getIdPainelMenuPai())." &raquo; ".$PainelMenu->getNome();
				}else{
					return $PainelMenu->getNome();
				}
			}
			
			return "";
		}
		
		public static function PaiRootByPainelMenu($IdPainelMenu){
			
			if($IdPainelMenu > 0){
				
				$PainelMenu = PainelMenuManage2::buscarPainelMenu(1, $IdPainelMenu);
				$IdPai = intval($PainelMenu["id_painel_menu_pai"]);
				
				if($IdPai > 0){
					return PainelMenuManage2::PaiRootByPainelMenu($IdPai);
				}
			}
			
			return $IdPainelMenu;
		}
		
		public static function FilhosByStringIn($IdPainelMenu){
			
			if(PainelMenuManage2::FilhosCount($IdPainelMenu) > 0){
				
				$Filhos = PainelMenuManage2::FilhosByPainelMenu($IdPainelMenu);
				$strFilhos = "";
				for ($i=0; $i < count($Filhos); $i++){
					$strFilhos .= ", ".PainelMenuManage2::FilhosByStringIn($Filhos[$i]["id_painel_menu"]);
				}
				
				return $IdPainelMenu.$strFilhos;
			}
			
			return $IdPainelMenu;
		}
		
		public static function PainelMenusByPai($IdPainelMenuPai, $Limit=0){
			$Limit = (($Limit==0) ? 1000 : $Limit );
			
			return PainelMenuManage::consultarSearchQuery(
				array(
					new SearchQueryComparer(PainelMenuAttribute::IdPainelMenuPai(), SearchComparer::Igual(), SearchCondition::E(), $IdPainelMenuPai)
				),
				array(
					new SearchQueryOrder(PainelMenuAttribute::Prioridade(), SearchOrder::Crescente())
				),
				0, $Limit
			);
		}
		
		public static function PainelMenusByPaiFull($IdPainelMenuPai){
			return self::PainelMenusByPai($IdPainelMenuPai);
		}
		
		public static function FilhosCount($IdPainelMenu){
			return PainelMenuManage::count(SearchMounter::Count(PainelMenuAttribute::_Table(), array(
				new SearchQueryComparer(PainelMenuAttribute::IdPainelMenuPai(), SearchComparer::Igual(), SearchCondition::E(), $IdPainelMenu)
			)));
		}

		public static function FilhosByPainelMenu($IdPainelMenu){
			return self::PainelMenusByPai($IdPainelMenu);
		}
		
		public static function FilhosByPainelMenuAndBloco($IdPainelMenuBloco, $IdPainelMenuPai){
			return PainelMenuManage2::consultarSearchQuery(
				array(
					new SearchQueryComparer(PainelMenuAttribute::IdPainelMenuPai(), SearchComparer::Igual(), SearchCondition::E(), $IdPainelMenuPai),
					new SearchQueryComparer(PainelMenuAttribute::IdPainelMenuBloco(), SearchComparer::Igual(), SearchCondition::E(), $IdPainelMenuBloco),
					new SearchQueryComparer(PainelMenuAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
				),
				array(
					new SearchQueryOrder(PainelMenuAttribute::Prioridade(), SearchOrder::Crescente())
				)
			);
		}
		
		public static function PainelMenusBySelect($IdPainelMenu=0){
				
			$comparers = array();
			$comparers[] = new SearchQueryComparer(PainelMenuAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1);
			if( $IdPainelMenu > 0 ){
				$comparers[] = new SearchQueryComparer(PainelMenuAttribute::IdPainelMenu(), SearchComparer::Diferente(), SearchCondition::E(), $IdPainelMenu);
				$comparers[] = new SearchQueryComparer(PainelMenuAttribute::IdPainelMenuPai(), SearchComparer::Diferente(), SearchCondition::E(), $IdPainelMenu);
			}
				
			$orders = array(
					new SearchQueryOrder(PainelMenuAttribute::Prioridade(), SearchOrder::Crescente())
			);
				
			$query = SearchMounter::MounterByQueryLimit(PainelMenuAttribute::_Table(), $comparers, $orders, 0, 0);
				
			$vobj = PainelMenuManage2::consultar($query);
				
			$cats = array();
			for($i=0; $i < count($vobj); $i++){
				$cats[$i][0] = PainelMenuManage2::HerancaByString($vobj[$i]["id_painel_menu"]);
				$cats[$i][1] = $vobj[$i]["id_painel_menu"];
				$cats[$i][2] = $vobj[$i]["identificador"];
			}
				
			return $cats;
		}
		
        /**
         * @param unknown $IdPainelMenu
         * @param array $arrayIdUsuarioPerfil
         * @return boolean
         */
		public static function Gerenciar($IdPainelMenu, $arrayIdUsuarioPerfil){
		    if($IdPainelMenu <= 0){
		        return false;
		    }
		    	
		    $objPainelMenuPerfil = new PainelMenuPerfil();
		    $itensPainelMenuPerfil = $objPainelMenuPerfil->consultarSearchQuery(
		        array(
		            new SearchQueryComparer(PainelMenuPerfilAttribute::IdPainelMenu(), SearchComparer::Igual(), SearchCondition::E(), $IdPainelMenu),
		        )
		    );
		    foreach ($itensPainelMenuPerfil as $valuePainelMenuPerfil) {
		        $valuePainelMenuPerfil->excluir();
		    }
            
		    foreach ($arrayIdUsuarioPerfil as $key => $value) {
		        $obj = new PainelMenuPerfil();
		        $obj->setPainelMenuPerfil(null, null, $IdPainelMenu, $value);
		        $obj->inserir();
		    }
		    
		    return true;
		}
	
		
	} 
?>