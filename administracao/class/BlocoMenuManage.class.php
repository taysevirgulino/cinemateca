<? 
	class BlocoMenuManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarBlocoMenu( $tipo, $valor ){ 
			$value = array();
			$myObj = new BlocoMenu();
			if( $myObj->buscarBlocoMenu( $tipo, $valor ) ){
				$value[0] = $myObj->getIdBlocoMenu();	
				$value["id_bloco_menu"] = $myObj->getIdBlocoMenu();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdeOrigem();	
				$value["ide_origem"] = $myObj->getIdeOrigem();	
				$value[3] = $myObj->getIdBlocoMenuPai();	
				$value["id_bloco_menu_pai"] = $myObj->getIdBlocoMenuPai();	
				$value[4] = $myObj->getNome();	
				$value["nome"] = $myObj->getNome();	
				$value[5] = $myObj->getUrl();	
				$value["url"] = $myObj->getUrl();	
				$value[6] = $myObj->getTarget();	
				$value["target"] = $myObj->getTarget();	
				$value[7] = $myObj->getPrioridade();	
				$value["prioridade"] = $myObj->getPrioridade();	
				$value[8] = $myObj->getStatus();	
				$value["status"] = $myObj->getStatus();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarBlocoMenu( $tipo, $valor ){ 
			$value = array();
			$myObj = new BlocoMenu();
			$vmyObj = $myObj->consultarBlocoMenu( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdBlocoMenu();
				$value[$i]["id_bloco_menu"] = $vmyObj[$i]->getIdBlocoMenu();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdeOrigem();
				$value[$i]["ide_origem"] = $vmyObj[$i]->getIdeOrigem();
				$value[$i][3] = $vmyObj[$i]->getIdBlocoMenuPai();
				$value[$i]["id_bloco_menu_pai"] = $vmyObj[$i]->getIdBlocoMenuPai();
				$value[$i][4] = $vmyObj[$i]->getNome();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				$value[$i][5] = $vmyObj[$i]->getUrl();
				$value[$i]["url"] = $vmyObj[$i]->getUrl();
				$value[$i][6] = $vmyObj[$i]->getTarget();
				$value[$i]["target"] = $vmyObj[$i]->getTarget();
				$value[$i][7] = $vmyObj[$i]->getPrioridade();
				$value[$i]["prioridade"] = $vmyObj[$i]->getPrioridade();
				$value[$i][8] = $vmyObj[$i]->getStatus();
				$value[$i]["status"] = $vmyObj[$i]->getStatus();
				
				$value[$i]["heranca"] = BlocoMenuManage::HerancaByString($vmyObj[$i]->getIdBlocoMenu());
			}
			unset($myObj);
			
			return $value;
		}

		public static function buscarBlocoMenuAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){ 
			$value = array();
			$myObj = new BlocoMenu();
			if( $myObj->buscarBlocoMenuAttribute($AttributeFieldNameComparer, $Value, $SearchCompare) ){
				$value[0] = $myObj->getIdBlocoMenu();	
				$value["id_bloco_menu"] = $myObj->getIdBlocoMenu();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdeOrigem();	
				$value["ide_origem"] = $myObj->getIdeOrigem();	
				$value[3] = $myObj->getIdBlocoMenuPai();	
				$value["id_bloco_menu_pai"] = $myObj->getIdBlocoMenuPai();	
				$value[4] = $myObj->getNome();	
				$value["nome"] = $myObj->getNome();	
				$value[5] = $myObj->getUrl();	
				$value["url"] = $myObj->getUrl();	
				$value[6] = $myObj->getTarget();	
				$value["target"] = $myObj->getTarget();	
				$value[7] = $myObj->getPrioridade();	
				$value["prioridade"] = $myObj->getPrioridade();	
				$value[8] = $myObj->getStatus();	
				$value["status"] = $myObj->getStatus();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarBlocoMenuAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){ 
			$value = array();
			$myObj = new BlocoMenu();
			$vmyObj = $myObj->consultarBlocoMenuAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdBlocoMenu();
				$value[$i]["id_bloco_menu"] = $vmyObj[$i]->getIdBlocoMenu();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdeOrigem();
				$value[$i]["ide_origem"] = $vmyObj[$i]->getIdeOrigem();
				$value[$i][3] = $vmyObj[$i]->getIdBlocoMenuPai();
				$value[$i]["id_bloco_menu_pai"] = $vmyObj[$i]->getIdBlocoMenuPai();
				$value[$i][4] = $vmyObj[$i]->getNome();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				$value[$i][5] = $vmyObj[$i]->getUrl();
				$value[$i]["url"] = $vmyObj[$i]->getUrl();
				$value[$i][6] = $vmyObj[$i]->getTarget();
				$value[$i]["target"] = $vmyObj[$i]->getTarget();
				$value[$i][7] = $vmyObj[$i]->getPrioridade();
				$value[$i]["prioridade"] = $vmyObj[$i]->getPrioridade();
				$value[$i][8] = $vmyObj[$i]->getStatus();
				$value[$i]["status"] = $vmyObj[$i]->getStatus();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirBlocoMenu($myIdBlocoMenu, $myIdentificador, $myIdeOrigem, $myIdBlocoMenuPai, $myNome, $myUrl, $myTarget, $myPrioridade, $myStatus){
			$myObj = new BlocoMenu();
			$myObj->setBlocoMenu($myIdBlocoMenu, $myIdentificador, $myIdeOrigem, $myIdBlocoMenuPai, $myNome, $myUrl, $myTarget, $myPrioridade, $myStatus);
			return $myObj->inserirBlocoMenu();
		}

		public static function alterarBlocoMenu($myIdBlocoMenu, $myIdentificador, $myIdeOrigem, $myIdBlocoMenuPai, $myNome, $myUrl, $myTarget, $myPrioridade, $myStatus){
			$myObj = new BlocoMenu();
			$myObj->setBlocoMenu($myIdBlocoMenu, $myIdentificador, $myIdeOrigem, $myIdBlocoMenuPai, $myNome, $myUrl, $myTarget, $myPrioridade, $myStatus);
			return $myObj->alterarBlocoMenu();
		}

		public static function alterarAtributoIdeOrigem($myIdBlocoMenu, $myIdeOrigem){
			$myObj = new BlocoMenu();
			$myObj->setIdBlocoMenu($myIdBlocoMenu);
			$myObj->setIdeOrigem($myIdeOrigem);
			return $myObj->alterarAtributoIdeOrigem();
		}

		public static function alterarAtributoIdBlocoMenuPai($myIdBlocoMenu, $myIdBlocoMenuPai){
			$myObj = new BlocoMenu();
			$myObj->setIdBlocoMenu($myIdBlocoMenu);
			$myObj->setIdBlocoMenuPai($myIdBlocoMenuPai);
			return $myObj->alterarAtributoIdBlocoMenuPai();
		}

		public static function alterarAtributoNome($myIdBlocoMenu, $myNome){
			$myObj = new BlocoMenu();
			$myObj->setIdBlocoMenu($myIdBlocoMenu);
			$myObj->setNome($myNome);
			return $myObj->alterarAtributoNome();
		}

		public static function alterarAtributoUrl($myIdBlocoMenu, $myUrl){
			$myObj = new BlocoMenu();
			$myObj->setIdBlocoMenu($myIdBlocoMenu);
			$myObj->setUrl($myUrl);
			return $myObj->alterarAtributoUrl();
		}

		public static function alterarAtributoTarget($myIdBlocoMenu, $myTarget){
			$myObj = new BlocoMenu();
			$myObj->setIdBlocoMenu($myIdBlocoMenu);
			$myObj->setTarget($myTarget);
			return $myObj->alterarAtributoTarget();
		}

		public static function alterarAtributoPrioridade($myIdBlocoMenu, $myPrioridade){
			$myObj = new BlocoMenu();
			$myObj->setIdBlocoMenu($myIdBlocoMenu);
			$myObj->setPrioridade($myPrioridade);
			return $myObj->alterarAtributoPrioridade();
		}

		public static function alterarAtributoStatus($myIdBlocoMenu, $myStatus){
			$myObj = new BlocoMenu();
			$myObj->setIdBlocoMenu($myIdBlocoMenu);
			$myObj->setStatus($myStatus);
			return $myObj->alterarAtributoStatus();
		}

		public static function excluirBlocoMenu($myIdBlocoMenu){
			$myObj = new BlocoMenu();
			$myObj->setIdBlocoMenu($myIdBlocoMenu);
			return $myObj->excluirBlocoMenu();
		}

		public static function ultimaPrioridade(){
			$sql = "SELECT 
					  tb_bloco_menu.*
					FROM
					  tb_bloco_menu
					ORDER BY
					  tb_bloco_menu.prioridade DESC
					LIMIT 1";
			$obj = BlocoMenuManage::buscarBlocoMenu(4, $sql);
			return(intval($obj["prioridade"])+1);
		}
		
		
		public static function HerancaByString($IdMenu){
			
			if($IdMenu > 0){
				$Menu = new BlocoMenu();
				if(!$Menu->buscarBlocoMenu(1, $IdMenu)){ return "";}
				
				if($Menu->getIdBlocoMenu() == $Menu->getIdBlocoMenuPai()){
					return $Menu->getNome();
				}
				
				if($Menu->getIdBlocoMenuPai() > 0){
					return BlocoMenuManage::HerancaByString($Menu->getIdBlocoMenuPai())." &raquo; ".$Menu->getNome();
				}else{
					return $Menu->getNome();
				}
			}
			
			return "";
		}
		
		public static function FilhosByStringIn($IdMenu){
			
			if(BlocoMenuManage::FilhosCount($IdMenu) > 0){
				
				$Filhos = BlocoMenuManage::FilhosByMenu($IdMenu);
				$strFilhos = "";
				for ($i=0; $i < count($Filhos); $i++){
					$strFilhos .= ", ".BlocoMenuManage::FilhosByStringIn($Filhos[$i]["id_bloco_menu"]);
				}
				
				return $IdMenu.$strFilhos;
			}
			
			return $IdMenu;
		}
		
		public static function MenusByPai($IdMenuPai){
			$sql = "SELECT 
					  tb_bloco_menu.*
					FROM
					  tb_bloco_menu
					WHERE
					  tb_bloco_menu.`status` = 1 AND 
					  tb_bloco_menu.id_bloco_menu_pai = $IdMenuPai
					ORDER BY
					  tb_bloco_menu.nome";
			
			return BlocoMenuManage::consultarBlocoMenu(3, $sql);
		}
		
		public static function FilhosCount($IdMenu){
			$sql = "SELECT 
					  COUNT(tb_bloco_menu.id_bloco_menu) AS qtd
					FROM
					  tb_bloco_menu
					WHERE
					  tb_bloco_menu.id_bloco_menu_pai = $IdMenu";
			
			$dbq = new dbQuery(); 
			$dbq->consultar($sql); 
			$result = 0;
			
			if( $dbq->registro() ){ 
				$result = intval( $dbq->valor("qtd") ); 
			} 
			 
			$dbq->desconectar(); unset($dbq); 
			
			return $result;
		}

		public static function FilhosByMenu($IdMenu){
			$sql = "SELECT 
					  tb_bloco_menu.* 
					FROM
					  tb_bloco_menu
					WHERE
					  tb_bloco_menu.id_bloco_menu_pai = $IdMenu ORDER BY tb_bloco_menu.prioridade";
			
			return BlocoMenuManage::consultarBlocoMenu(3, $sql);
		}
		
		public static function Menu(){
			$Menus = BlocoMenuManage::FilhosByMenu(0);
			
			for($i=0; $i < count($Menus); $i++){
				$Filhos = BlocoMenuManage::FilhosByMenu(intval($Menus[$i]["id_bloco_menu"]));
				$Menus[$i]["Filhos"] = $Filhos;
				$Menus[$i]["FilhosCount"] = count($Filhos);
			}
			
			return $Menus;
		}
		
		public static function MenujQuery(){
			
			$Menus = BlocoMenuManage::FilhosByMenu(0);
			
			$m = '<ul class="topnav">';
			
			for($i=0; $i < count($Menus); $i++){
				
				$m .= '<li><a href="'.$Menus[$i]["url"].'" title="'.$Menus[$i]["nome"].'" target="'.$Menus[$i]["target"].'">'.$Menus[$i]["nome"].'</a>';
				
				$Filhos = BlocoMenuManage::FilhosByMenu(intval($Menus[$i]["id_bloco_menu"]));
				if(count($Filhos) > 0){
					$m .= '<ul class="subnav">';
					for($j=0; $j < count($Filhos); $j++){
						$m .= '<li><a href="'.$Filhos[$j]["url"].'" title="'.$Filhos[$j]["nome"].'" target="'.$Filhos[$j]["target"].'">'.$Filhos[$j]["nome"].'</a></li>';
					}
					$m .= '</ul>';
				}
				$m .= '</li>';
			}
			
			$m .= '</ul>';
			
			return $m;
		}
		
	} 
?>