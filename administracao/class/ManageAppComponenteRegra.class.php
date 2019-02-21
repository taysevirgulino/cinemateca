<?
	class ManageAppComponenteRegra{
	
		public function __construct(){} 
		public function __destruct(){} 
		
		public static function validarRegra($id_regra, $pessoa_tipo){
			//$id_regra = intval($id_regra);
			$pessoa_tipo = intval($pessoa_tipo);
			
			if( (!empty($id_regra)) && (!empty($pessoa_tipo)) ){
				$appcr = new AppComponenteRegra();
				$appcr->setIdentificador($id_regra);
				
				if( $appcr->buscarAppComponenteRegra(2, $id_regra) ){
					$permissao = new AppComponentePermissao();
					$permissao->setAppComponentePermissao(-1, $pessoa_tipo, $appcr->getIdAppComponenteRegra(), 1);

					
					return $permissao->buscarAppComponentePermissao(2, "");
				}
			}
			return false;
		}
	}
?>