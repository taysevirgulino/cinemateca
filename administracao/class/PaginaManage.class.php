<? 
	class PaginaManage extends AbstractEntityManage implements EntityManageInterface {
		
		public static function FilhosCount( $IdPagina ){
			
			return self::count(
				SearchMounter::MounterByComparer(PaginaAttribute::_Table(), PaginaAttribute::IdPaginaPai(), SearchComparer::Igual(), $IdPagina)
			);
			
		}
		
		public static function Pagina_Obj($Slug, $IdeOrigem){
		
			$query = SearchMounter::MounterByQueryLimit(PaginaAttribute::_Table(), array(
					new SearchQueryComparer(PaginaAttribute::Slug(), SearchComparer::Igual(), SearchCondition::E(), $Slug),
					new SearchQueryComparer(PaginaAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), $IdeOrigem)
			), array(), 0, 1);
				
			$obj = new Pagina();
			if(!$obj->buscar($query)){
				return null;
			}
				
			return $obj;
		}
		
	}
?>