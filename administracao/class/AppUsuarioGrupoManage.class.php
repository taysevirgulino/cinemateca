<? 
	class AppUsuarioGrupoManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarAppUsuarioGrupo( $tipo, $valor ){ 
			$value = array();
			$myObj = new AppUsuarioGrupo();
			if( $myObj->buscarAppUsuarioGrupo( $tipo, $valor ) ){
				$value[0] = $myObj->getIdAppUsuarioGrupo();	
				$value["id_app_usuario_grupo"] = $myObj->getIdAppUsuarioGrupo();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getNome();	
				$value["nome"] = $myObj->getNome();	
				$value[3] = $myObj->getSigla();	
				$value["sigla"] = $myObj->getSigla();	
				$value[4] = $myObj->getTipo();	
				$value["tipo"] = $myObj->getTipo();	
				$value[5] = $myObj->getNivel();	
				$value["nivel"] = $myObj->getNivel();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarAppUsuarioGrupo( $tipo, $valor ){ 
			$value = array();
			$myObj = new AppUsuarioGrupo();
			$vmyObj = $myObj->consultarAppUsuarioGrupo( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdAppUsuarioGrupo();
				$value[$i]["id_app_usuario_grupo"] = $vmyObj[$i]->getIdAppUsuarioGrupo();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getNome();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				$value[$i][3] = $vmyObj[$i]->getSigla();
				$value[$i]["sigla"] = $vmyObj[$i]->getSigla();
				$value[$i][4] = $vmyObj[$i]->getTipo();
				$value[$i]["tipo"] = $vmyObj[$i]->getTipo();
				$value[$i][5] = $vmyObj[$i]->getNivel();
				$value[$i]["nivel"] = $vmyObj[$i]->getNivel();
			}
			unset($myObj);
			
			return $value;
		}

		public static function buscarAppUsuarioGrupoAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){ 
			$value = array();
			$myObj = new AppUsuarioGrupo();
			if( $myObj->buscarAppUsuarioGrupoAttribute($AttributeFieldNameComparer, $Value, $SearchCompare) ){
				$value[0] = $myObj->getIdAppUsuarioGrupo();	
				$value["id_app_usuario_grupo"] = $myObj->getIdAppUsuarioGrupo();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getNome();	
				$value["nome"] = $myObj->getNome();	
				$value[3] = $myObj->getSigla();	
				$value["sigla"] = $myObj->getSigla();	
				$value[4] = $myObj->getTipo();	
				$value["tipo"] = $myObj->getTipo();	
				$value[5] = $myObj->getNivel();	
				$value["nivel"] = $myObj->getNivel();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarAppUsuarioGrupoAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){ 
			$value = array();
			$myObj = new AppUsuarioGrupo();
			$vmyObj = $myObj->consultarAppUsuarioGrupoAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdAppUsuarioGrupo();
				$value[$i]["id_app_usuario_grupo"] = $vmyObj[$i]->getIdAppUsuarioGrupo();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getNome();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				$value[$i][3] = $vmyObj[$i]->getSigla();
				$value[$i]["sigla"] = $vmyObj[$i]->getSigla();
				$value[$i][4] = $vmyObj[$i]->getTipo();
				$value[$i]["tipo"] = $vmyObj[$i]->getTipo();
				$value[$i][5] = $vmyObj[$i]->getNivel();
				$value[$i]["nivel"] = $vmyObj[$i]->getNivel();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirAppUsuarioGrupo($myIdAppUsuarioGrupo, $myIdentificador, $myNome, $mySigla, $myTipo, $myNivel){
			$myObj = new AppUsuarioGrupo();
			$myObj->setAppUsuarioGrupo($myIdAppUsuarioGrupo, $myIdentificador, $myNome, $mySigla, $myTipo, $myNivel);
			return $myObj->inserirAppUsuarioGrupo();
		}

		public static function alterarAppUsuarioGrupo($myIdAppUsuarioGrupo, $myIdentificador, $myNome, $mySigla, $myTipo, $myNivel){
			$myObj = new AppUsuarioGrupo();
			$myObj->setAppUsuarioGrupo($myIdAppUsuarioGrupo, $myIdentificador, $myNome, $mySigla, $myTipo, $myNivel);
			return $myObj->alterarAppUsuarioGrupo();
		}

		public static function alterarAtributoIdentificador($myIdAppUsuarioGrupo, $myIdentificador){
			$myObj = new AppUsuarioGrupo();
			$myObj->setIdAppUsuarioGrupo($myIdAppUsuarioGrupo);
			$myObj->setIdentificador($myIdentificador);
			return $myObj->alterarAtributoIdentificador();
		}

		public static function alterarAtributoNome($myIdAppUsuarioGrupo, $myNome){
			$myObj = new AppUsuarioGrupo();
			$myObj->setIdAppUsuarioGrupo($myIdAppUsuarioGrupo);
			$myObj->setNome($myNome);
			return $myObj->alterarAtributoNome();
		}

		public static function alterarAtributoSigla($myIdAppUsuarioGrupo, $mySigla){
			$myObj = new AppUsuarioGrupo();
			$myObj->setIdAppUsuarioGrupo($myIdAppUsuarioGrupo);
			$myObj->setSigla($mySigla);
			return $myObj->alterarAtributoSigla();
		}

		public static function alterarAtributoTipo($myIdAppUsuarioGrupo, $myTipo){
			$myObj = new AppUsuarioGrupo();
			$myObj->setIdAppUsuarioGrupo($myIdAppUsuarioGrupo);
			$myObj->setTipo($myTipo);
			return $myObj->alterarAtributoTipo();
		}

		public static function alterarAtributoNivel($myIdAppUsuarioGrupo, $myNivel){
			$myObj = new AppUsuarioGrupo();
			$myObj->setIdAppUsuarioGrupo($myIdAppUsuarioGrupo);
			$myObj->setNivel($myNivel);
			return $myObj->alterarAtributoNivel();
		}

		public static function excluirAppUsuarioGrupo($myIdAppUsuarioGrupo){
			$myObj = new AppUsuarioGrupo();
			$myObj->setIdAppUsuarioGrupo($myIdAppUsuarioGrupo);
			return $myObj->excluirAppUsuarioGrupo();
		}
		
		public static function GruposInByNivelUsuario(){
			$AppUsuario = AppLogonManage::GetAppUsuario();
			$Grupo = AppUsuarioGrupoManage::buscarAppUsuarioGrupo(1, $AppUsuario->getIdAppUsuarioGrupo());
			$Nivel = intval($Grupo["nivel"]);
			
			$sql = "SELECT 
					  tb_app_usuario_grupo.*
					FROM
					  tb_app_usuario_grupo
					WHERE
					  tb_app_usuario_grupo.nivel <= $Nivel";
			
			$vobj = AppUsuarioGrupoManage::consultarAppUsuarioGrupo(3, $sql);
			
			$in = "";
			for($i=0; $i < count($vobj); $i++){
				$in .= $vobj[$i]["id_app_usuario_grupo"].",";
			}
			$in .= "0";
			 
			return $in;
		}

	} 
?>