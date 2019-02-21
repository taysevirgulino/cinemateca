<? 
	class AppComponenteMenuManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarAppComponenteMenu( $tipo, $valor ){ 
			$value = array();
			$myObj = new AppComponenteMenu();
			if( $myObj->buscarAppComponenteMenu( $tipo, $valor ) ){
				$value[0] = $myObj->getIdAppComponenteMenu();	
				$value["id_app_componente_menu"] = $myObj->getIdAppComponenteMenu();	
				$value[1] = $myObj->getIdAppComponenteMenuPai();	
				$value["id_app_componente_menu_pai"] = $myObj->getIdAppComponenteMenuPai();	
				$value[2] = $myObj->getUrl();	
				$value["url"] = $myObj->getUrl();	
				$value[3] = $myObj->getDescricao();	
				$value["descricao"] = $myObj->getDescricao();	
				$value[4] = $myObj->getImagem();	
				$value["imagem"] = $myObj->getImagem();	
				$value[5] = $myObj->getPrioridade();	
				$value["prioridade"] = $myObj->getPrioridade();	
				$value[6] = $myObj->getTipo();	
				$value["tipo"] = $myObj->getTipo();	
				$value[7] = $myObj->getStatus();	
				$value["status"] = $myObj->getStatus();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarAppComponenteMenu( $tipo, $valor ){ 
			$value = array();
			$myObj = new AppComponenteMenu();
			$vmyObj = $myObj->consultarAppComponenteMenu( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdAppComponenteMenu();
				$value[$i]["id_app_componente_menu"] = $vmyObj[$i]->getIdAppComponenteMenu();
				$value[$i][1] = $vmyObj[$i]->getIdAppComponenteMenuPai();
				$value[$i]["id_app_componente_menu_pai"] = $vmyObj[$i]->getIdAppComponenteMenuPai();
				$value[$i][2] = $vmyObj[$i]->getUrl();
				$value[$i]["url"] = $vmyObj[$i]->getUrl();
				$value[$i][3] = $vmyObj[$i]->getDescricao();
				$value[$i]["descricao"] = $vmyObj[$i]->getDescricao();
				$value[$i][4] = $vmyObj[$i]->getImagem();
				$value[$i]["imagem"] = $vmyObj[$i]->getImagem();
				$value[$i][5] = $vmyObj[$i]->getPrioridade();
				$value[$i]["prioridade"] = $vmyObj[$i]->getPrioridade();
				$value[$i][6] = $vmyObj[$i]->getTipo();
				$value[$i]["tipo"] = $vmyObj[$i]->getTipo();
				$value[$i][7] = $vmyObj[$i]->getStatus();
				$value[$i]["status"] = $vmyObj[$i]->getStatus();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirAppComponenteMenu($myIdAppComponenteMenu, $myIdAppComponenteMenuPai, $myUrl, $myDescricao, $myImagem, $myPrioridade, $myTipo, $myStatus){
			$myObj = new AppComponenteMenu();
			$myObj->setAppComponenteMenu($myIdAppComponenteMenu, $myIdAppComponenteMenuPai, $myUrl, $myDescricao, $myImagem, $myPrioridade, $myTipo, $myStatus);
			return $myObj->inserirAppComponenteMenu();
		}

		public static function alterarAppComponenteMenu($myIdAppComponenteMenu, $myIdAppComponenteMenuPai, $myUrl, $myDescricao, $myImagem, $myPrioridade, $myTipo, $myStatus){
			$myObj = new AppComponenteMenu();
			$myObj->setAppComponenteMenu($myIdAppComponenteMenu, $myIdAppComponenteMenuPai, $myUrl, $myDescricao, $myImagem, $myPrioridade, $myTipo, $myStatus);
			return $myObj->alterarAppComponenteMenu();
		}

		public static function alterarAtributoIdAppComponenteMenuPai($myIdAppComponenteMenu, $myIdAppComponenteMenuPai){
			$myObj = new AppComponenteMenu();
			$myObj->setIdAppComponenteMenu($myIdAppComponenteMenu);
			$myObj->setIdAppComponenteMenuPai($myIdAppComponenteMenuPai);
			return $myObj->alterarAtributoIdAppComponenteMenuPai();
		}

		public static function alterarAtributoUrl($myIdAppComponenteMenu, $myUrl){
			$myObj = new AppComponenteMenu();
			$myObj->setIdAppComponenteMenu($myIdAppComponenteMenu);
			$myObj->setUrl($myUrl);
			return $myObj->alterarAtributoUrl();
		}

		public static function alterarAtributoDescricao($myIdAppComponenteMenu, $myDescricao){
			$myObj = new AppComponenteMenu();
			$myObj->setIdAppComponenteMenu($myIdAppComponenteMenu);
			$myObj->setDescricao($myDescricao);
			return $myObj->alterarAtributoDescricao();
		}

		public static function alterarAtributoImagem($myIdAppComponenteMenu, $myImagem){
			$myObj = new AppComponenteMenu();
			$myObj->setIdAppComponenteMenu($myIdAppComponenteMenu);
			$myObj->setImagem($myImagem);
			return $myObj->alterarAtributoImagem();
		}

		public static function alterarAtributoPrioridade($myIdAppComponenteMenu, $myPrioridade){
			$myObj = new AppComponenteMenu();
			$myObj->setIdAppComponenteMenu($myIdAppComponenteMenu);
			$myObj->setPrioridade($myPrioridade);
			return $myObj->alterarAtributoPrioridade();
		}

		public static function alterarAtributoTipo($myIdAppComponenteMenu, $myTipo){
			$myObj = new AppComponenteMenu();
			$myObj->setIdAppComponenteMenu($myIdAppComponenteMenu);
			$myObj->setTipo($myTipo);
			return $myObj->alterarAtributoTipo();
		}

		public static function alterarAtributoStatus($myIdAppComponenteMenu, $myStatus){
			$myObj = new AppComponenteMenu();
			$myObj->setIdAppComponenteMenu($myIdAppComponenteMenu);
			$myObj->setStatus($myStatus);
			return $myObj->alterarAtributoStatus();
		}

		public static function excluirAppComponenteMenu($myIdAppComponenteMenu){
			$myObj = new AppComponenteMenu();
			$myObj->setIdAppComponenteMenu($myIdAppComponenteMenu);
			return $myObj->excluirAppComponenteMenu();
		}
	} 
?>