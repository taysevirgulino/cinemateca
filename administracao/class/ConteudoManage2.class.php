<? 
	class ConteudoManage2 extends ConteudoManage {
		
	    private static $conteudoCollection = array();
	    
	    /**
	     * @return Conteudo
	     */
		public static function Conteudo( $Codigo, $IdeOrigem='' ){
			
		    if( array_key_exists($Codigo, self::$conteudoCollection) ){
		          return self::$conteudoCollection[$Codigo];
		    }
		    
		    $IdeOrigem = ((empty($IdeOrigem)) ? CurrentSite::IdeOrigem() : $IdeOrigem );
			
			$objConteudo = new Conteudo();
			$itensConteudo = $objConteudo->consultarSearchQuery(
				array(
					new SearchQueryComparer(ConteudoAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), $IdeOrigem),
					new SearchQueryComparer(ConteudoAttribute::Codigo(), SearchComparer::Igual(), SearchCondition::E(), $Codigo),
				),
				array(),
				0, 1
			);
			foreach ($itensConteudo as $valueConteudo) {
				return self::$conteudoCollection[$Codigo] = $valueConteudo;
			}
			
			return new Conteudo();
		}
		
	}
?>