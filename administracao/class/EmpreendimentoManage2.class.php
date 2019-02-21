<? 
	class EmpreendimentoManage2 extends EmpreendimentoManage {
	    
	    /**
	     * @var Empreendimento
	     */
	    public static $_empreendimento = null;
	    
	    /**
	     * @param Empreendimento $objEmpreendimento
	     * @return Empreendimento
	     */
	    public static function Empreendimento_Ativo(Empreendimento $objEmpreendimento = null){
	       if( $objEmpreendimento == null ){ //get
	           if( self::$_empreendimento == null ){
	               self::$_empreendimento = new Empreendimento();
	               if( !self::$_empreendimento->buscarAttribute(EmpreendimentoAttribute::Identificador(), $_SESSION["EIDE"]) ){
	                   return null;
	               }
	           }
	       }else{ //set
	           self::$_empreendimento = $objEmpreendimento;
	           $_SESSION["EIDE"] = $objEmpreendimento->getIdentificador();
	       }
	       return self::$_empreendimento;
	    }
	    public static function Empreendimento_Selecionado(){
	        return (self::Empreendimento_Ativo() != null);
	    }
	    public static function Empreendimento_Validar(){
	        if( !self::Empreendimento_Selecionado() ){
	           System::Redirect( Url::Entrar_Empreendimento()."?url=".base64_encode($_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]) );
	       }
	    }
	    
	    /**
	     * @param Usuario $objUsuario
	     * @return array
	     */
	    public static function Empreendimentos_Usuario(Usuario $objUsuario){
	        
	        //VERIFICAR REGRA CONFORME TITULO USUARIO
	        
	        $itensEmpreendimento = EmpreendimentoManage::consultarSearchQuery(
	            array(
	                new SearchQueryComparer(EmpreendimentoAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
	            ),
	            array(
	                new SearchQueryOrder(EmpreendimentoAttribute::Titulo(), SearchOrder::Crescente())
	            )
	        );
	        return $itensEmpreendimento;
	    }
	    
	}
?>