<?
	class ManageAppComponentePagina{
	
		public function __construct(){} 
		public function __destruct(){} 
		
		public static function validarPagina($script_name, $pessoa_tipo, $url){
			$script_name = substr($script_name, (strrpos($script_name, "/")+1));
			
			if( ! empty($script_name) ){
				$appcp = new AppComponentePagina();
				$appcp->setUrl($script_name);
				
				if( $appcp->buscarAppComponentePagina(4, "") ){

					$permissao = new AppComponentePermissao();
					$permissao->setAppComponentePermissao(-1, $pessoa_tipo, $appcp->getIdAppComponentePagina(), 1);

					if( $permissao->buscarAppComponentePermissao(2, "") ){
						return true;
						die();
					}
				}
			}
			System::Redirect($url);
			die();
		}
	}
?>