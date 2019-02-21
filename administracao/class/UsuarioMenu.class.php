<? 
	class UsuarioMenu { 

	    public static function Menu(){
	        
	        $itens = array();
	        
	        $itens["painel"] = array(
	            "url" => Url::Principal(),
	            "label" => "Painel",
	            "icon" => "dashboard",
	            "itens" => array()
	        );
	        
	        $itens["lojista"] = array(
	            "url" => Url::_Path()."lojista-list",
	            "label" => "Lojistas",
	            "icon" => "shopping-cart",
	            "itens" => array(
	               array(
	                   "url" => Url::_Path()."lojista-list",
	                   "label" => "Gerenciar",
	                   "icon" => "cogs",
	               ),
	               array(
	                   "url" => Url::_Path()."lojista-pessoa-list",
	                   "label" => "Contatos",
	                   "icon" => "users",
	               ),
	            )
	        );
	        
	        return $itens;
	    }
	} 
?>