<? 
	class IndiqueManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarIndique( $tipo, $valor ){ 
			$value = array();
			$myObj = new Indique();
			if( $myObj->buscarIndique( $tipo, $valor ) ){
				$value[0] = $myObj->getIdIndique();	
				$value["id_indique"] = $myObj->getIdIndique();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdeOrigem();	
				$value["ide_origem"] = $myObj->getIdeOrigem();	
				$value[3] = $myObj->getRemetenteNome();	
				$value["remetente_nome"] = $myObj->getRemetenteNome();	
				$value[4] = $myObj->getRemetenteEmail();	
				$value["remetente_email"] = $myObj->getRemetenteEmail();	
				$value[5] = $myObj->getDestinatarioNome();	
				$value["destinatario_nome"] = $myObj->getDestinatarioNome();	
				$value[6] = $myObj->getDestinatarioEmail();	
				$value["destinatario_email"] = $myObj->getDestinatarioEmail();	
				$value[7] = $myObj->getIp();	
				$value["ip"] = $myObj->getIp();	
				$value[8] = $myObj->getSessao();	
				$value["sessao"] = $myObj->getSessao();	
				$value[9] = $myObj->getDatahora();	
				$value["datahora"] = $myObj->getDatahora();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarIndique( $tipo, $valor ){ 
			$value = array();
			$myObj = new Indique();
			$vmyObj = $myObj->consultarIndique( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdIndique();
				$value[$i]["id_indique"] = $vmyObj[$i]->getIdIndique();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdeOrigem();
				$value[$i]["ide_origem"] = $vmyObj[$i]->getIdeOrigem();
				$value[$i][3] = $vmyObj[$i]->getRemetenteNome();
				$value[$i]["remetente_nome"] = $vmyObj[$i]->getRemetenteNome();
				$value[$i][4] = $vmyObj[$i]->getRemetenteEmail();
				$value[$i]["remetente_email"] = $vmyObj[$i]->getRemetenteEmail();
				$value[$i][5] = $vmyObj[$i]->getDestinatarioNome();
				$value[$i]["destinatario_nome"] = $vmyObj[$i]->getDestinatarioNome();
				$value[$i][6] = $vmyObj[$i]->getDestinatarioEmail();
				$value[$i]["destinatario_email"] = $vmyObj[$i]->getDestinatarioEmail();
				$value[$i][7] = $vmyObj[$i]->getIp();
				$value[$i]["ip"] = $vmyObj[$i]->getIp();
				$value[$i][8] = $vmyObj[$i]->getSessao();
				$value[$i]["sessao"] = $vmyObj[$i]->getSessao();
				$value[$i][9] = $vmyObj[$i]->getDatahora();
				$value[$i]["datahora"] = $vmyObj[$i]->getDatahora();
			}
			unset($myObj);
			
			return $value;
		}

		public static function buscarIndiqueAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){ 
			$value = array();
			$myObj = new Indique();
			if( $myObj->buscarIndiqueAttribute($AttributeFieldNameComparer, $Value, $SearchCompare) ){
				$value[0] = $myObj->getIdIndique();	
				$value["id_indique"] = $myObj->getIdIndique();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdeOrigem();	
				$value["ide_origem"] = $myObj->getIdeOrigem();	
				$value[3] = $myObj->getRemetenteNome();	
				$value["remetente_nome"] = $myObj->getRemetenteNome();	
				$value[4] = $myObj->getRemetenteEmail();	
				$value["remetente_email"] = $myObj->getRemetenteEmail();	
				$value[5] = $myObj->getDestinatarioNome();	
				$value["destinatario_nome"] = $myObj->getDestinatarioNome();	
				$value[6] = $myObj->getDestinatarioEmail();	
				$value["destinatario_email"] = $myObj->getDestinatarioEmail();	
				$value[7] = $myObj->getIp();	
				$value["ip"] = $myObj->getIp();	
				$value[8] = $myObj->getSessao();	
				$value["sessao"] = $myObj->getSessao();	
				$value[9] = $myObj->getDatahora();	
				$value["datahora"] = $myObj->getDatahora();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarIndiqueAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){ 
			$value = array();
			$myObj = new Indique();
			$vmyObj = $myObj->consultarIndiqueAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdIndique();
				$value[$i]["id_indique"] = $vmyObj[$i]->getIdIndique();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdeOrigem();
				$value[$i]["ide_origem"] = $vmyObj[$i]->getIdeOrigem();
				$value[$i][3] = $vmyObj[$i]->getRemetenteNome();
				$value[$i]["remetente_nome"] = $vmyObj[$i]->getRemetenteNome();
				$value[$i][4] = $vmyObj[$i]->getRemetenteEmail();
				$value[$i]["remetente_email"] = $vmyObj[$i]->getRemetenteEmail();
				$value[$i][5] = $vmyObj[$i]->getDestinatarioNome();
				$value[$i]["destinatario_nome"] = $vmyObj[$i]->getDestinatarioNome();
				$value[$i][6] = $vmyObj[$i]->getDestinatarioEmail();
				$value[$i]["destinatario_email"] = $vmyObj[$i]->getDestinatarioEmail();
				$value[$i][7] = $vmyObj[$i]->getIp();
				$value[$i]["ip"] = $vmyObj[$i]->getIp();
				$value[$i][8] = $vmyObj[$i]->getSessao();
				$value[$i]["sessao"] = $vmyObj[$i]->getSessao();
				$value[$i][9] = $vmyObj[$i]->getDatahora();
				$value[$i]["datahora"] = $vmyObj[$i]->getDatahora();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirIndique($myIdIndique, $myIdentificador, $myIdeOrigem, $myRemetenteNome, $myRemetenteEmail, $myDestinatarioNome, $myDestinatarioEmail, $myIp, $mySessao, $myDatahora){
			$myObj = new Indique();
			$myObj->setIndique($myIdIndique, $myIdentificador, $myIdeOrigem, $myRemetenteNome, $myRemetenteEmail, $myDestinatarioNome, $myDestinatarioEmail, $myIp, $mySessao, $myDatahora);
			return $myObj->inserirIndique();
		}

		public static function alterarIndique($myIdIndique, $myIdentificador, $myIdeOrigem, $myRemetenteNome, $myRemetenteEmail, $myDestinatarioNome, $myDestinatarioEmail, $myIp, $mySessao, $myDatahora){
			$myObj = new Indique();
			$myObj->setIndique($myIdIndique, $myIdentificador, $myIdeOrigem, $myRemetenteNome, $myRemetenteEmail, $myDestinatarioNome, $myDestinatarioEmail, $myIp, $mySessao, $myDatahora);
			return $myObj->alterarIndique();
		}

		public static function alterarAtributoIdeOrigem($myIdIndique, $myIdeOrigem){
			$myObj = new Indique();
			$myObj->setIdIndique($myIdIndique);
			$myObj->setIdeOrigem($myIdeOrigem);
			return $myObj->alterarAtributoIdeOrigem();
		}

		public static function alterarAtributoRemetenteNome($myIdIndique, $myRemetenteNome){
			$myObj = new Indique();
			$myObj->setIdIndique($myIdIndique);
			$myObj->setRemetenteNome($myRemetenteNome);
			return $myObj->alterarAtributoRemetenteNome();
		}

		public static function alterarAtributoRemetenteEmail($myIdIndique, $myRemetenteEmail){
			$myObj = new Indique();
			$myObj->setIdIndique($myIdIndique);
			$myObj->setRemetenteEmail($myRemetenteEmail);
			return $myObj->alterarAtributoRemetenteEmail();
		}

		public static function alterarAtributoDestinatarioNome($myIdIndique, $myDestinatarioNome){
			$myObj = new Indique();
			$myObj->setIdIndique($myIdIndique);
			$myObj->setDestinatarioNome($myDestinatarioNome);
			return $myObj->alterarAtributoDestinatarioNome();
		}

		public static function alterarAtributoDestinatarioEmail($myIdIndique, $myDestinatarioEmail){
			$myObj = new Indique();
			$myObj->setIdIndique($myIdIndique);
			$myObj->setDestinatarioEmail($myDestinatarioEmail);
			return $myObj->alterarAtributoDestinatarioEmail();
		}

		public static function alterarAtributoIp($myIdIndique, $myIp){
			$myObj = new Indique();
			$myObj->setIdIndique($myIdIndique);
			$myObj->setIp($myIp);
			return $myObj->alterarAtributoIp();
		}

		public static function alterarAtributoSessao($myIdIndique, $mySessao){
			$myObj = new Indique();
			$myObj->setIdIndique($myIdIndique);
			$myObj->setSessao($mySessao);
			return $myObj->alterarAtributoSessao();
		}

		public static function alterarAtributoDatahora($myIdIndique, $myDatahora){
			$myObj = new Indique();
			$myObj->setIdIndique($myIdIndique);
			$myObj->setDatahora($myDatahora);
			return $myObj->alterarAtributoDatahora();
		}

		public static function excluirIndique($myIdIndique){
			$myObj = new Indique();
			$myObj->setIdIndique($myIdIndique);
			return $myObj->excluirIndique();
		}
		
		public static function Indicar($myRemetenteNome, $myRemetenteEmail, $myDestinatarioNome, $myDestinatarioEmail){
			
			$myRemetenteNome = base64_decode($myRemetenteNome);
			$myRemetenteEmail = base64_decode($myRemetenteEmail);
			$myDestinatarioNome = base64_decode($myDestinatarioNome);
			$myDestinatarioEmail = base64_decode($myDestinatarioEmail);
			
			$Site = CurrentSite::Site();
			$Email = new Email( $Site );
			$Email->Indicar($myRemetenteNome, $myRemetenteEmail, $myDestinatarioNome, $myDestinatarioEmail, $Site->getTitulo(), $Site->getUrl());
			
			return IndiqueManage::inserirIndique(-1, null, null, $myRemetenteNome, $myRemetenteEmail, $myDestinatarioNome, $myDestinatarioEmail, $_SERVER['REMOTE_ADDR'], session_id(), date("Y-m-d H:i:s"));
		}		

	} 
?>