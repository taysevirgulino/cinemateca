<? 
	class AppComponentePermissaoManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarAppComponentePermissao( $tipo, $valor ){ 
			$value = array();
			$myObj = new AppComponentePermissao();
			if( $myObj->buscarAppComponentePermissao( $tipo, $valor ) ){
				$value[0] = $myObj->getIdAppPermissao();	
				$value["id_app_permissao"] = $myObj->getIdAppPermissao();	
				$value[1] = $myObj->getIdAppUsuarioGrupo();	
				$value["id_app_usuario_grupo"] = $myObj->getIdAppUsuarioGrupo();	
				$value[2] = $myObj->getIdAppComponente();	
				$value["id_app_componente"] = $myObj->getIdAppComponente();	
				$value[3] = $myObj->getPermissao();	
				$value["permissao"] = $myObj->getPermissao();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarAppComponentePermissao( $tipo, $valor ){ 
			$value = array();
			$myObj = new AppComponentePermissao();
			$vmyObj = $myObj->consultarAppComponentePermissao( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdAppPermissao();
				$value[$i]["id_app_permissao"] = $vmyObj[$i]->getIdAppPermissao();
				$value[$i][1] = $vmyObj[$i]->getIdAppUsuarioGrupo();
				$value[$i]["id_app_usuario_grupo"] = $vmyObj[$i]->getIdAppUsuarioGrupo();
				$value[$i][2] = $vmyObj[$i]->getIdAppComponente();
				$value[$i]["id_app_componente"] = $vmyObj[$i]->getIdAppComponente();
				$value[$i][3] = $vmyObj[$i]->getPermissao();
				$value[$i]["permissao"] = $vmyObj[$i]->getPermissao();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirAppComponentePermissao($myIdAppPermissao, $myIdAppUsuarioGrupo, $myIdAppComponente, $myPermissao){
			$myObj = new AppComponentePermissao();
			$myObj->setAppComponentePermissao($myIdAppPermissao, $myIdAppUsuarioGrupo, $myIdAppComponente, $myPermissao);
			return $myObj->inserirAppComponentePermissao();
		}

		public static function alterarAppComponentePermissao($myIdAppPermissao, $myIdAppUsuarioGrupo, $myIdAppComponente, $myPermissao){
			$myObj = new AppComponentePermissao();
			$myObj->setAppComponentePermissao($myIdAppPermissao, $myIdAppUsuarioGrupo, $myIdAppComponente, $myPermissao);
			return $myObj->alterarAppComponentePermissao();
		}

		public static function alterarAtributoIdAppUsuarioGrupo($myIdAppPermissao, $myIdAppUsuarioGrupo){
			$myObj = new AppComponentePermissao();
			$myObj->setIdAppPermissao($myIdAppPermissao);
			$myObj->setIdAppUsuarioGrupo($myIdAppUsuarioGrupo);
			return $myObj->alterarAtributoIdAppUsuarioGrupo();
		}

		public static function alterarAtributoIdAppComponente($myIdAppPermissao, $myIdAppComponente){
			$myObj = new AppComponentePermissao();
			$myObj->setIdAppPermissao($myIdAppPermissao);
			$myObj->setIdAppComponente($myIdAppComponente);
			return $myObj->alterarAtributoIdAppComponente();
		}

		public static function alterarAtributoPermissao($myIdAppPermissao, $myPermissao){
			$myObj = new AppComponentePermissao();
			$myObj->setIdAppPermissao($myIdAppPermissao);
			$myObj->setPermissao($myPermissao);
			return $myObj->alterarAtributoPermissao();
		}

		public static function excluirAppComponentePermissao($myIdAppPermissao){
			$myObj = new AppComponentePermissao();
			$myObj->setIdAppPermissao($myIdAppPermissao);
			return $myObj->excluirAppComponentePermissao();
		}
	} 
?>