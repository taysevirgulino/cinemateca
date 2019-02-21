<? 
	class GaleriaCategoriaManage2 extends GaleriaCategoriaManage{ 
		
		public static function consultarGaleriaCategoria( $tipo, $valor ){ 
			$value = GaleriaCategoriaManage::consultarGaleriaCategoria( $tipo, $valor );
			
			for ($i=0; $i < count($value); $i++){
				$value[$i]["heranca"] = GaleriaCategoriaManage2::HerancaByString($value[$i]["id_galeria_categoria"]);
				$value[$i]["url"] = Url::Galerias($value[$i]["id_galeria_categoria"], $value[$i]["identificador"], $value[$i]["nome"]);
			}
			
			return $value;
		}
		
		public static function consultarGaleriaCategoriaAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){ 
			$value = GaleriaCategoriaManage::consultarGaleriaCategoriaAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
			
			for ($i=0; $i < count($value); $i++){
				$value[$i]["url"] = Url::Galerias($value[$i]["id_galeria_categoria"], $value[$i]["identificador"], $value[$i]["nome"]);
			}
			
			return $value;
		}
		
		public static function Ordenar($IdCategoria, $Ordem=1){
			$obj_atual = new GaleriaCategoria();
			if(!$obj_atual->buscarGaleriaCategoria(1, $IdCategoria)){ return false; }			
			
			$sql = "";
			switch ($Ordem){
				case 1 : { //subir
					$query = SearchMounter::MounterByQueryLimit(GaleriaCategoriaAttribute::_Table(), array(
							new SearchComparer(GaleriaCategoriaAttribute::IdGaleriaCategoriaPai(), SearchComparer::Igual(), SearchCondition::E(), intval($obj_atual->getIdGaleriaCategoriaPai())),
							new SearchComparer(GaleriaCategoriaAttribute::Prioridade(), SearchComparer::Menor(), SearchCondition::E(), intval($obj_atual->getPrioridade())),
					), array(), 0, 1);
				}break;
				case 0 : { //descer
					$query = SearchMounter::MounterByQueryLimit(GaleriaCategoriaAttribute::_Table(), array(
							new SearchComparer(GaleriaCategoriaAttribute::IdGaleriaCategoriaPai(), SearchComparer::Igual(), SearchCondition::E(), intval($obj_atual->getIdGaleriaCategoriaPai())),
							new SearchComparer(GaleriaCategoriaAttribute::Prioridade(), SearchComparer::Maior(), SearchCondition::E(), intval($obj_atual->getPrioridade())),
					), array(), 0, 1);				
				}break;
			}
			if(!empty($sql)){
				$obj_alterar = new GaleriaCategoria();
				if(!$obj_alterar->buscarGaleriaCategoria(4, $sql)){ return false; }

				$aux = $obj_atual->getPrioridade();
				$obj_atual->setPrioridade( $obj_alterar->getPrioridade() );
				$obj_alterar->setPrioridade( $aux );

				$obj_atual->alterarAtributoPrioridade();
				$obj_alterar->alterarAtributoPrioridade();
				
				return true;
			}
			
			return false;
		}
		
		public static function Reordenar($IdCategoria=0, $Ordem=0){
			
			$Filhos = GaleriaCategoriaManage2::CategoriasByPaiFull($IdCategoria);

			for($i=0; $i < count($Filhos); $i++){
				$Ordem++;
				
				if($Filhos[$i]["prioridade"] != $Ordem){
					GaleriaCategoriaManage2::alterarAtributoPrioridade($Filhos[$i]["id_galeria_categoria"], $Ordem);
				}
				
				$Ordem = GaleriaCategoriaManage2::Reordenar($Filhos[$i]["id_galeria_categoria"], $Ordem);
			}
			
			return $Ordem;			
		}
		
		public static function HerancaByString($IdCategoria){
			
			if($IdCategoria > 0){
				$Categoria = new GaleriaCategoria();
				if(!$Categoria->buscarGaleriaCategoria(1, $IdCategoria)){ return "";}
				
				if($Categoria->getIdGaleriaCategoria() == $Categoria->getIdGaleriaCategoriaPai()){
					return $Categoria->getNome();
				}
				
				if($Categoria->getIdGaleriaCategoriaPai() > 0){
					return GaleriaCategoriaManage2::HerancaByString($Categoria->getIdGaleriaCategoriaPai())." &raquo; ".$Categoria->getNome();
				}else{
					return $Categoria->getNome();
				}
			}
			
			return "";
		}
		
		public static function PaiRootByCategoria($IdCategoria){
			
			if($IdCategoria > 0){
				
				$Categoria = GaleriaCategoriaManage2::buscarGaleriaCategoria(1, $IdCategoria);
				$IdPai = intval($Categoria["id_galeria_categoria_pai"]);
				
				if($IdPai > 0){
					return GaleriaCategoriaManage2::PaiRootByCategoria($IdPai);
				}
			}
			
			return $IdCategoria;
		}
		
		public static function FilhosByStringIn($IdCategoria){
			
			if(GaleriaCategoriaManage2::FilhosCount($IdCategoria) > 0){
				
				$Filhos = GaleriaCategoriaManage2::FilhosByCategoria($IdCategoria);
				$strFilhos = "";
				for ($i=0; $i < count($Filhos); $i++){
					$strFilhos .= ", ".GaleriaCategoriaManage2::FilhosByStringIn($Filhos[$i]["id_galeria_categoria"]);
				}
				
				return $IdCategoria.$strFilhos;
			}
			
			return $IdCategoria;
		}
		
		public static function HerancaByLink($IdCategoria, $Conector="&raquo;"){
			
			if($IdCategoria > 0){
				$Categoria = new GaleriaCategoria();
				if(!$Categoria->buscarGaleriaCategoria(1, $IdCategoria)){ return "";}
				
				if($Categoria->getIdGaleriaCategoria() == $Categoria->getIdGaleriaCategoriaPai()){
					return GaleriaCategoriaManage2::MontarLink($Categoria->getNome(), $Categoria->getIdGaleriaCategoria(), $Categoria->getIdentificador());
				}
				
				if($Categoria->getIdGaleriaCategoriaPai() > 0){
					return GaleriaCategoriaManage2::HerancaByLink($Categoria->getIdGaleriaCategoriaPai(), $Conector)." $Conector ".GaleriaCategoriaManage2::MontarLink($Categoria->getNome(), $Categoria->getIdGaleriaCategoria(), $Categoria->getIdentificador());
				}else{
					return GaleriaCategoriaManage2::MontarLink($Categoria->getNome(), $Categoria->getIdGaleriaCategoria(), $Categoria->getIdentificador());
				}
			}
			
			return "";
		}
		
		private static function MontarLink($Nome, $IdCategoria, $Identificador){
			return '<a href="classificados.php?l='.$Identificador.'" style="color:#999;" title="Navegue em '.$Nome.'">'.$Nome.'</a>';
		}
		
		public static function CategoriasByPai($IdGaleriaCategoriaPai, $Limit=0){
			$Limit = (($Limit==0) ? 1000 : $Limit );
			
			return GaleriaCategoriaManage::consultarSearchQuery(
				array(
					new SearchQueryComparer(GaleriaCategoriaAttribute::IdGaleriaCategoriaPai(), SearchComparer::Igual(), SearchCondition::E(), $IdGaleriaCategoriaPai)
				),
				array(
					new SearchQueryOrder(GaleriaCategoriaAttribute::Prioridade(), SearchOrder::Crescente())
				),
				0, $Limit
			);
		}
		
		public static function CategoriasByPaiFull($IdGaleriaCategoriaPai){
			return self::GaleriaCategoriasByPai($IdGaleriaCategoriaPai);
		}
		
		public static function FilhosCount($IdGaleriaCategoria){
			return GaleriaCategoriaManage::count(SearchMounter::Count(GaleriaCategoriaAttribute::_Table(), array(
				new SearchQueryComparer(GaleriaCategoriaAttribute::IdGaleriaCategoriaPai(), SearchComparer::Igual(), SearchCondition::E(), $IdGaleriaCategoria)
			)));
		}

		public static function FilhosByCategoria($IdGaleriaCategoria){
			return self::GaleriaCategoriasByPai($IdGaleriaCategoria);
		}
		
		public static function CategoriasBySelect($IdGaleriaCategoria=0){
			$comparers = array();
			$comparers[] = new SearchQueryComparer(GaleriaCategoriaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1);
			if( $IdGaleriaCategoria > 0 ){
				$comparers[] = new SearchQueryComparer(GaleriaCategoriaAttribute::IdGaleriaCategoria(), SearchComparer::Diferente(), SearchCondition::E(), $IdGaleriaCategoria);
				$comparers[] = new SearchQueryComparer(GaleriaCategoriaAttribute::IdGaleriaCategoriaPai(), SearchComparer::Diferente(), SearchCondition::E(), $IdGaleriaCategoria);
			}
				
			$orders = array(
					new SearchQueryOrder(GaleriaCategoriaAttribute::Prioridade(), SearchOrder::Crescente())
			);
				
			$query = SearchMounter::MounterByQueryLimit(GaleriaCategoriaAttribute::_Table(), $comparers, $orders, 0, 0);
				
			$vobj = GaleriaCategoriaManage2::consultarGaleriaCategoria(3, $query);
				
			$cats = array();
			for($i=0; $i < count($vobj); $i++){
				$cats[$i][0] = GaleriaCategoriaManage2::HerancaByString($vobj[$i]["id_galeria_categoria"]);
				$cats[$i][1] = $vobj[$i]["id_galeria_categoria"];
				$cats[$i][2] = $vobj[$i]["identificador"];
			}
				
			return $cats;
		}
		
	} 
?>