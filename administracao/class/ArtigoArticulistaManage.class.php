<? 
	class ArtigoArticulistaManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarArtigoArticulista( $tipo, $valor ){ 
			$value = array();
			$myObj = new ArtigoArticulista();
			if( $myObj->buscarArtigoArticulista( $tipo, $valor ) ){
				$value[0] = $myObj->getIdArtigoArticulista();	
				$value["id_artigo_articulista"] = $myObj->getIdArtigoArticulista();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdeOrigem();	
				$value["ide_origem"] = $myObj->getIdeOrigem();	
				$value[3] = $myObj->getNome();	
				$value["nome"] = $myObj->getNome();	
				$value[4] = $myObj->getPerfil();	
				$value["perfil"] = $myObj->getPerfil();	
				$value[5] = $myObj->getEmail();	
				$value["email"] = $myObj->getEmail();	
				$value[6] = $myObj->getTelefone();	
				$value["telefone"] = $myObj->getTelefone();	
				$value[7] = $myObj->getFoto();	
				$value["foto"] = $myObj->getFoto();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarArtigoArticulista( $tipo, $valor ){ 
			$value = array();
			$myObj = new ArtigoArticulista();
			$vmyObj = $myObj->consultarArtigoArticulista( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdArtigoArticulista();
				$value[$i]["id_artigo_articulista"] = $vmyObj[$i]->getIdArtigoArticulista();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdeOrigem();
				$value[$i]["ide_origem"] = $vmyObj[$i]->getIdeOrigem();
				$value[$i][3] = $vmyObj[$i]->getNome();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				$value[$i][4] = $vmyObj[$i]->getPerfil();
				$value[$i]["perfil"] = $vmyObj[$i]->getPerfil();
				$value[$i][5] = $vmyObj[$i]->getEmail();
				$value[$i]["email"] = $vmyObj[$i]->getEmail();
				$value[$i][6] = $vmyObj[$i]->getTelefone();
				$value[$i]["telefone"] = $vmyObj[$i]->getTelefone();
				$value[$i][7] = $vmyObj[$i]->getFoto();
				$value[$i]["foto"] = $vmyObj[$i]->getFoto();
			}
			unset($myObj);
			
			return $value;
		}

		public static function buscarArtigoArticulistaAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){ 
			$value = array();
			$myObj = new ArtigoArticulista();
			if( $myObj->buscarArtigoArticulistaAttribute($AttributeFieldNameComparer, $Value, $SearchCompare) ){
				$value[0] = $myObj->getIdArtigoArticulista();	
				$value["id_artigo_articulista"] = $myObj->getIdArtigoArticulista();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdeOrigem();	
				$value["ide_origem"] = $myObj->getIdeOrigem();	
				$value[3] = $myObj->getNome();	
				$value["nome"] = $myObj->getNome();	
				$value[4] = $myObj->getPerfil();	
				$value["perfil"] = $myObj->getPerfil();	
				$value[5] = $myObj->getEmail();	
				$value["email"] = $myObj->getEmail();	
				$value[6] = $myObj->getTelefone();	
				$value["telefone"] = $myObj->getTelefone();	
				$value[7] = $myObj->getFoto();	
				$value["foto"] = $myObj->getFoto();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarArtigoArticulistaAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){ 
			$value = array();
			$myObj = new ArtigoArticulista();
			$vmyObj = $myObj->consultarArtigoArticulistaAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdArtigoArticulista();
				$value[$i]["id_artigo_articulista"] = $vmyObj[$i]->getIdArtigoArticulista();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdeOrigem();
				$value[$i]["ide_origem"] = $vmyObj[$i]->getIdeOrigem();
				$value[$i][3] = $vmyObj[$i]->getNome();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				$value[$i][4] = $vmyObj[$i]->getPerfil();
				$value[$i]["perfil"] = $vmyObj[$i]->getPerfil();
				$value[$i][5] = $vmyObj[$i]->getEmail();
				$value[$i]["email"] = $vmyObj[$i]->getEmail();
				$value[$i][6] = $vmyObj[$i]->getTelefone();
				$value[$i]["telefone"] = $vmyObj[$i]->getTelefone();
				$value[$i][7] = $vmyObj[$i]->getFoto();
				$value[$i]["foto"] = $vmyObj[$i]->getFoto();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirArtigoArticulista($myIdArtigoArticulista, $myIdentificador, $myIdeOrigem, $myNome, $myPerfil, $myEmail, $myTelefone, $myFoto){
			$myObj = new ArtigoArticulista();
			$myObj->setArtigoArticulista($myIdArtigoArticulista, $myIdentificador, $myIdeOrigem, $myNome, $myPerfil, $myEmail, $myTelefone, $myFoto);
			return $myObj->inserirArtigoArticulista();
		}

		public static function alterarArtigoArticulista($myIdArtigoArticulista, $myIdentificador, $myIdeOrigem, $myNome, $myPerfil, $myEmail, $myTelefone, $myFoto){
			$myObj = new ArtigoArticulista();
			$myObj->setArtigoArticulista($myIdArtigoArticulista, $myIdentificador, $myIdeOrigem, $myNome, $myPerfil, $myEmail, $myTelefone, $myFoto);
			return $myObj->alterarArtigoArticulista();
		}

		public static function alterarAtributoIdeOrigem($myIdArtigoArticulista, $myIdeOrigem){
			$myObj = new ArtigoArticulista();
			$myObj->setIdArtigoArticulista($myIdArtigoArticulista);
			$myObj->setIdeOrigem($myIdeOrigem);
			return $myObj->alterarAtributoIdeOrigem();
		}

		public static function alterarAtributoNome($myIdArtigoArticulista, $myNome){
			$myObj = new ArtigoArticulista();
			$myObj->setIdArtigoArticulista($myIdArtigoArticulista);
			$myObj->setNome($myNome);
			return $myObj->alterarAtributoNome();
		}

		public static function alterarAtributoPerfil($myIdArtigoArticulista, $myPerfil){
			$myObj = new ArtigoArticulista();
			$myObj->setIdArtigoArticulista($myIdArtigoArticulista);
			$myObj->setPerfil($myPerfil);
			return $myObj->alterarAtributoPerfil();
		}

		public static function alterarAtributoEmail($myIdArtigoArticulista, $myEmail){
			$myObj = new ArtigoArticulista();
			$myObj->setIdArtigoArticulista($myIdArtigoArticulista);
			$myObj->setEmail($myEmail);
			return $myObj->alterarAtributoEmail();
		}

		public static function alterarAtributoTelefone($myIdArtigoArticulista, $myTelefone){
			$myObj = new ArtigoArticulista();
			$myObj->setIdArtigoArticulista($myIdArtigoArticulista);
			$myObj->setTelefone($myTelefone);
			return $myObj->alterarAtributoTelefone();
		}

		public static function alterarAtributoFoto($myIdArtigoArticulista, $myFoto){
			$myObj = new ArtigoArticulista();
			$myObj->setIdArtigoArticulista($myIdArtigoArticulista);
			$myObj->setFoto($myFoto);
			return $myObj->alterarAtributoFoto();
		}

		public static function excluirArtigoArticulista($myIdArtigoArticulista){
			$myObj = new ArtigoArticulista();
			$myObj->setIdArtigoArticulista($myIdArtigoArticulista);
			return $myObj->excluirArtigoArticulista();
		}

	} 
?>