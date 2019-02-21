<? 
	class AppUsuarioManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarAppUsuario( $tipo, $valor ){ 
			$value = array();
			$myObj = new AppUsuario();
			if( $myObj->buscarAppUsuario( $tipo, $valor ) ){
				$value[0] = $myObj->getIdAppUsuario();	
				$value["id_app_usuario"] = $myObj->getIdAppUsuario();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdAppUsuarioGrupo();	
				$value["id_app_usuario_grupo"] = $myObj->getIdAppUsuarioGrupo();	
				$value[3] = $myObj->getNome();	
				$value["nome"] = $myObj->getNome();	
				$value[4] = $myObj->getEmail();	
				$value["email"] = $myObj->getEmail();	
				$value[5] = $myObj->getLogin();	
				$value["login"] = $myObj->getLogin();	
				$value[6] = $myObj->getSenha();	
				$value["senha"] = $myObj->getSenha();	
				$value[7] = $myObj->getStatus();	
				$value["status"] = $myObj->getStatus();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarAppUsuario( $tipo, $valor ){ 
			$value = array();
			$myObj = new AppUsuario();
			$vmyObj = $myObj->consultarAppUsuario( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdAppUsuario();
				$value[$i]["id_app_usuario"] = $vmyObj[$i]->getIdAppUsuario();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdAppUsuarioGrupo();
				$value[$i]["id_app_usuario_grupo"] = $vmyObj[$i]->getIdAppUsuarioGrupo();
				$value[$i][3] = $vmyObj[$i]->getNome();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				$value[$i][4] = $vmyObj[$i]->getEmail();
				$value[$i]["email"] = $vmyObj[$i]->getEmail();
				$value[$i][5] = $vmyObj[$i]->getLogin();
				$value[$i]["login"] = $vmyObj[$i]->getLogin();
				$value[$i][6] = $vmyObj[$i]->getSenha();
				$value[$i]["senha"] = $vmyObj[$i]->getSenha();
				$value[$i][7] = $vmyObj[$i]->getStatus();
				$value[$i]["status"] = $vmyObj[$i]->getStatus();
			}
			unset($myObj);
			
			return $value;
		}

		public static function buscarAppUsuarioAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){ 
			$value = array();
			$myObj = new AppUsuario();
			if( $myObj->buscarAppUsuarioAttribute($AttributeFieldNameComparer, $Value, $SearchCompare) ){
				$value[0] = $myObj->getIdAppUsuario();	
				$value["id_app_usuario"] = $myObj->getIdAppUsuario();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdAppUsuarioGrupo();	
				$value["id_app_usuario_grupo"] = $myObj->getIdAppUsuarioGrupo();	
				$value[3] = $myObj->getNome();	
				$value["nome"] = $myObj->getNome();	
				$value[4] = $myObj->getEmail();	
				$value["email"] = $myObj->getEmail();	
				$value[5] = $myObj->getLogin();	
				$value["login"] = $myObj->getLogin();	
				$value[6] = $myObj->getSenha();	
				$value["senha"] = $myObj->getSenha();	
				$value[7] = $myObj->getStatus();	
				$value["status"] = $myObj->getStatus();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarAppUsuarioAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){ 
			$value = array();
			$myObj = new AppUsuario();
			$vmyObj = $myObj->consultarAppUsuarioAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdAppUsuario();
				$value[$i]["id_app_usuario"] = $vmyObj[$i]->getIdAppUsuario();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdAppUsuarioGrupo();
				$value[$i]["id_app_usuario_grupo"] = $vmyObj[$i]->getIdAppUsuarioGrupo();
				$value[$i][3] = $vmyObj[$i]->getNome();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				$value[$i][4] = $vmyObj[$i]->getEmail();
				$value[$i]["email"] = $vmyObj[$i]->getEmail();
				$value[$i][5] = $vmyObj[$i]->getLogin();
				$value[$i]["login"] = $vmyObj[$i]->getLogin();
				$value[$i][6] = $vmyObj[$i]->getSenha();
				$value[$i]["senha"] = $vmyObj[$i]->getSenha();
				$value[$i][7] = $vmyObj[$i]->getStatus();
				$value[$i]["status"] = $vmyObj[$i]->getStatus();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirAppUsuario($myIdAppUsuario, $myIdentificador, $myIdAppUsuarioGrupo, $myNome, $myEmail, $myLogin, $mySenha, $myStatus){
			$myObj = new AppUsuario();
			$myObj->setAppUsuario($myIdAppUsuario, $myIdentificador, $myIdAppUsuarioGrupo, $myNome, $myEmail, $myLogin, $mySenha, $myStatus);
			return $myObj->inserirAppUsuario();
		}

		public static function alterarAppUsuario($myIdAppUsuario, $myIdentificador, $myIdAppUsuarioGrupo, $myNome, $myEmail, $myLogin, $mySenha, $myStatus){
			$myObj = new AppUsuario();
			$myObj->setAppUsuario($myIdAppUsuario, $myIdentificador, $myIdAppUsuarioGrupo, $myNome, $myEmail, $myLogin, $mySenha, $myStatus);
			return $myObj->alterarAppUsuario();
		}

		public static function alterarAtributoIdAppUsuarioGrupo($myIdAppUsuario, $myIdAppUsuarioGrupo){
			$myObj = new AppUsuario();
			$myObj->setIdAppUsuario($myIdAppUsuario);
			$myObj->setIdAppUsuarioGrupo($myIdAppUsuarioGrupo);
			return $myObj->alterarAtributoIdAppUsuarioGrupo();
		}

		public static function alterarAtributoNome($myIdAppUsuario, $myNome){
			$myObj = new AppUsuario();
			$myObj->setIdAppUsuario($myIdAppUsuario);
			$myObj->setNome($myNome);
			return $myObj->alterarAtributoNome();
		}

		public static function alterarAtributoEmail($myIdAppUsuario, $myEmail){
			$myObj = new AppUsuario();
			$myObj->setIdAppUsuario($myIdAppUsuario);
			$myObj->setEmail($myEmail);
			return $myObj->alterarAtributoEmail();
		}

		public static function alterarAtributoLogin($myIdAppUsuario, $myLogin){
			$myObj = new AppUsuario();
			$myObj->setIdAppUsuario($myIdAppUsuario);
			$myObj->setLogin($myLogin);
			return $myObj->alterarAtributoLogin();
		}

		public static function alterarAtributoSenha($myIdAppUsuario, $mySenha){
			$myObj = new AppUsuario();
			$myObj->setIdAppUsuario($myIdAppUsuario);
			$myObj->setSenha($mySenha);
			return $myObj->alterarAtributoSenha();
		}

		public static function alterarAtributoStatus($myIdAppUsuario, $myStatus){
			$myObj = new AppUsuario();
			$myObj->setIdAppUsuario($myIdAppUsuario);
			$myObj->setStatus($myStatus);
			return $myObj->alterarAtributoStatus();
		}

		public static function excluirAppUsuario($myIdAppUsuario){
			$myObj = new AppUsuario();
			$myObj->setIdAppUsuario($myIdAppUsuario);
			return $myObj->excluirAppUsuario();
		}
	} 
?>