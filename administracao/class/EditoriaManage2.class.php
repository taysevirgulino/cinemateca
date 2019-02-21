<?php 
	class EditoriaManage2 extends EditoriaManage { 
		
		public static function buscarEditoria( $tipo, $valor ){
			$value = EditoriaManage::buscarEditoria( $tipo, $valor );
			
			if(!empty($value)){
				$value["url"] = Url::Noticias($value["id_editoria"], $value["identificador"], $value["nome"], $value["blog"]);
			}
				
			return $value;
		}
		
		public static function consultarEditoria( $tipo, $valor ){
			$value = EditoriaManage::consultarEditoria( $tipo, $valor );
			
			for ($i=0; $i < count($value); $i++){
				//$value[$i]["heranca"] = EditoriaManage2::HerancaByString( $value[$i]["id_editoria"] );
				$value[$i]["url"] = Url::Noticias($value[$i]["id_editoria"], $value[$i]["identificador"], $value[$i]["nome"], $value[$i]["blog"]);
			}
				
			return $value;
		}
		
		public static function buscarEditoriaAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){
			$value = EditoriaManage::buscarEditoriaAttribute($AttributeFieldNameComparer, $Value, $SearchCompare);
			
			if( !empty($value) ){
				$value["url"] = Url::Noticias($value["id_editoria"], $value["identificador"], $value["nome"], $value["blog"]);
			}
				
			return $value;
		}
		
		public static function consultarEditoriaAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){
			$value = EditoriaManage::consultarEditoriaAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
		
			for ($i=0; $i < count($value); $i++){
				$value[$i]["link"] = Url::Noticias($value[$i]["id_editoria"], $value[$i]["identificador"], $value[$i]["nome"], $value[$i]["blog"]);
			}
				
			return $value;
		}
		
		public static function SlugByNoticia($IdNoticia){
			$slug = "";
			
			$objNoticia = new Noticia();
			if($objNoticia->buscarAttribute(NoticiaAttribute::IdNoticia(), $IdNoticia)){
				$objEditoria = new Editoria();
				if($objEditoria->buscarAttribute(EditoriaAttribute::IdEditoria(), $objNoticia->getIdEditoria())){
					$slug = Url::_RewriteString( $objEditoria->getNome() );
				}
			}
			
			return $slug;
		}
		
		public static function Ordenar($IdEditoria, $Ordem=1){
			$obj_atual = new Editoria();
			if(!$obj_atual->buscarEditoria(1, $IdEditoria)){ return false; }			
			
			$query = null;
			switch ($Ordem){
				case 1 : { //subir
					$query = SearchMounter::MounterByQueryLimit(EditoriaAttribute::_Table(), array(
						new SearchComparer(EditoriaAttribute::IdEditoriaPai(), SearchComparer::Igual(), SearchCondition::E(), intval($obj_atual->getIdEditoriaPai())),
						new SearchComparer(EditoriaAttribute::Prioridade(), SearchComparer::Menor(), SearchCondition::E(), intval($obj_atual->getPrioridade())),
					), array(), 0, 1);
				}break;
				case 0 : { //descer
					$query = SearchMounter::MounterByQueryLimit(EditoriaAttribute::_Table(), array(
							new SearchComparer(EditoriaAttribute::IdEditoriaPai(), SearchComparer::Igual(), SearchCondition::E(), intval($obj_atual->getIdEditoriaPai())),
							new SearchComparer(EditoriaAttribute::Prioridade(), SearchComparer::Maior(), SearchCondition::E(), intval($obj_atual->getPrioridade())),
					), array(), 0, 1);				
				}break;
			}
			if(null != $query){
				$obj_alterar = new Editoria();
				if(!$obj_alterar->buscar($query)){ return false; }

				$aux = $obj_atual->getPrioridade();
				$obj_atual->setPrioridade( $obj_alterar->getPrioridade() );
				$obj_alterar->setPrioridade( $aux );

				$obj_atual->alterarAtributoPrioridade();
				$obj_alterar->alterarAtributoPrioridade();
				
				return true;
			}
			
			return false;
		}
		
		public static function Reordenar($IdEditoria=0, $Ordem=0){
			
			$Filhos = EditoriaManage2::EditoriasByPaiFull($IdEditoria);

			for($i=0; $i < count($Filhos); $i++){
				$Ordem++;
				
				if($Filhos[$i]["prioridade"] != $Ordem){
					EditoriaManage2::alterarAtributoPrioridade($Filhos[$i]["id_editoria"], $Ordem);
				}
				
				$Ordem = EditoriaManage2::Reordenar($Filhos[$i]["id_editoria"], $Ordem);
			}
			
			return $Ordem;			
		}
		
		public static function HerancaByString($IdEditoria){
			
			if($IdEditoria > 0){
				$Editoria = new Editoria();
				if(!$Editoria->buscarEditoria(1, $IdEditoria)){ return "";}
				
				if($Editoria->getIdEditoria() == $Editoria->getIdEditoriaPai()){
					return $Editoria->getNome();
				}
				
				if($Editoria->getIdEditoriaPai() > 0){
					return EditoriaManage2::HerancaByString($Editoria->getIdEditoriaPai())." &raquo; ".$Editoria->getNome();
				}else{
					return $Editoria->getNome();
				}
			}
			
			return "";
		}
		
		public static function PaiRootByEditoria($IdEditoria){
			
			if($IdEditoria > 0){
				
				$Editoria = EditoriaManage2::buscarEditoria(1, $IdEditoria);
				$IdPai = intval($Editoria["id_editoria_pai"]);
				
				if($IdPai > 0){
					return EditoriaManage2::PaiRootByEditoria($IdPai);
				}
			}
			
			return $IdEditoria;
		}
		
		public static function FilhosByStringIn($IdEditoria){
			
			if(EditoriaManage2::FilhosCount($IdEditoria) > 0){
				
				$Filhos = EditoriaManage2::FilhosByEditoria($IdEditoria);
				$strFilhos = "";
				for ($i=0; $i < count($Filhos); $i++){
					$strFilhos .= ", ".EditoriaManage2::FilhosByStringIn($Filhos[$i]["id_editoria"]);
				}
				
				return $IdEditoria.$strFilhos;
			}
			
			return $IdEditoria;
		}
		
		public static function HerancaByLink($IdEditoria, $Conector="&raquo;"){
			
			if($IdEditoria > 0){
				$Editoria = new Editoria();
				if(!$Editoria->buscarEditoria(1, $IdEditoria)){ return "";}
				
				if($Editoria->getIdEditoria() == $Editoria->getIdEditoriaPai()){
					return EditoriaManage2::MontarLink($Editoria->getNome(), $Editoria->getIdEditoria(), $Editoria->getIdentificador());
				}
				
				if($Editoria->getIdEditoriaPai() > 0){
					return EditoriaManage2::HerancaByLink($Editoria->getIdEditoriaPai(), $Conector)." $Conector ".EditoriaManage2::MontarLink($Editoria->getNome(), $Editoria->getIdEditoria(), $Editoria->getIdentificador());
				}else{
					return EditoriaManage2::MontarLink($Editoria->getNome(), $Editoria->getIdEditoria(), $Editoria->getIdentificador());
				}
			}
			
			return "";
		}
		
		private static function MontarLink($Nome, $IdEditoria, $Identificador){
			return '<a href="classificados.php?l='.$Identificador.'" style="color:#999;" title="Navegue em '.$Nome.'">'.$Nome.'</a>';
		}
		
		public static function EditoriasByPai($IdEditoriaPai, $Limit=0){
			
			$query = SearchMounter::MounterByQueryLimit(EditoriaAttribute::_Table(), array(
					new SearchComparer(EditoriaAttribute::IdEditoriaPai(), SearchComparer::Igual(), SearchCondition::E(), $IdEditoriaPai),
					new SearchComparer(EditoriaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
			), array(
				new SearchQueryOrder(EditoriaAttribute::Prioridade(), SearchOrder::Crescente())
			), 0, $Limit);
			
			return EditoriaManage2::consultarEditoria(3, $query);
		}
		
		public static function Editorias(){
			
			$itensEditoria = EditoriaManage::consultarSearchQuery(
				array(
					new SearchQueryComparer(EditoriaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
				),
				array(
					new SearchQueryOrder(EditoriaAttribute::Prioridade(), SearchOrder::Crescente())
				)
			);
			foreach ($itensEditoria as $i => $value) {
				$itensEditoria[$i]["url"] = Url::Noticias($value["id_editoria"], $value["identificador"], $value["nome"], $value["blog"]);
			}
			
			return $itensEditoria;
		}
		
		public static function EditoriasByPaiFull($IdEditoriaPai){
			
			$query = SearchMounter::MounterByQueryLimit(EditoriaAttribute::_Table(), array(
					new SearchComparer(EditoriaAttribute::IdEditoriaPai(), SearchComparer::Igual(), SearchCondition::E(), $IdEditoriaPai),
			), array(
					new SearchQueryOrder(EditoriaAttribute::Prioridade(), SearchOrder::Crescente())
			), 0, 0);
				
			return EditoriaManage2::consultarEditoria(3, $query);

		}
		
		public static function FilhosCount($IdEditoria){
			
			$query = SearchMounter::MounterByComparer(EditoriaAttribute::_Table(), EditoriaAttribute::IdEditoriaPai(), SearchComparer::Igual(), $IdEditoria);
			
			return EditoriaManage::count($query);
		}

		public static function FilhosByEditoria($IdEditoria){
			
			$query = SearchMounter::MounterByQueryLimit(EditoriaAttribute::_Table(), array(
					new SearchComparer(EditoriaAttribute::IdEditoriaPai(), SearchComparer::Igual(), SearchCondition::E(), $IdEditoria),
			), array(
					new SearchQueryOrder(EditoriaAttribute::Prioridade(), SearchOrder::Crescente())
			), 0, 0);
			
			return EditoriaManage2::consultarEditoria(3, $query);
			
		}
		
		public static function EditoriasBySelect($IdEditoria=0){
			
			$comparers = array();
			$comparers[] = new SearchQueryComparer(EditoriaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1);
			if( $IdEditoria > 0 ){
				$comparers[] = new SearchQueryComparer(EditoriaAttribute::IdEditoria(), SearchComparer::Diferente(), SearchCondition::E(), $IdEditoria);
				$comparers[] = new SearchQueryComparer(EditoriaAttribute::IdEditoriaPai(), SearchComparer::Diferente(), SearchCondition::E(), $IdEditoria);
			}
			
			$orders = array(
				new SearchQueryOrder(EditoriaAttribute::Prioridade(), SearchOrder::Crescente())
			);
			
			$query = SearchMounter::MounterByQueryLimit(EditoriaAttribute::_Table(), $comparers, $orders, 0, 0);
			
			$vobj = EditoriaManage2::consultarEditoria(3, $query);
			
			$cats = array();
			for($i=0; $i < count($vobj); $i++){
				$cats[$i][0] = $vobj[$i]["heranca"];
				$cats[$i][1] = $vobj[$i]["id_editoria"];
				$cats[$i][2] = $vobj[$i]["identificador"];
			}
			
			return $cats;
		}
		
		public static function Resumo($IdEditoria){
			$Editorias = EditoriaManage2::FilhosByEditoria($IdEditoria);
			
			for($i=0; $i < count($Editorias); $i++){
				$Editorias[$i]["Noticias"] = NoticiaManage2::NoticiasByEditoria($Editorias[$i]["id_editoria"], 2, 0);
			}
			
			return $Editorias;
		}
		
		public static function Editorias_Tipo($Tipo=0){
			//0 = normal
			//1 = blog
			
			$query = SearchMounter::MounterByQueryLimit(EditoriaAttribute::_Table(), array(
				new SearchComparer(EditoriaAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
				new SearchComparer(EditoriaAttribute::Blog(), SearchComparer::Igual(), SearchCondition::E(), $Tipo),
			), array(
					new SearchQueryOrder(EditoriaAttribute::Prioridade(), SearchOrder::Crescente())
			), 0, 0);
			
			return EditoriaManage2::consultarEditoria(3, $query);
		}
	} 
?>