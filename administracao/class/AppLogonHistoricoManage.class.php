<? 
	class AppLogonHistoricoManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarAppLogonHistorico( $tipo, $valor ){ 
			$value = array();
			$myObj = new AppLogonHistorico();
			if( $myObj->buscarAppLogonHistorico( $tipo, $valor ) ){
				$value[0] = $myObj->getIdAppLogonHistorico();	
				$value["id_app_logon_historico"] = $myObj->getIdAppLogonHistorico();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdAppLogon();	
				$value["id_app_logon"] = $myObj->getIdAppLogon();	
				$value[3] = $myObj->getIdeObjeto();	
				$value["ide_objeto"] = $myObj->getIdeObjeto();	
				$value[4] = $myObj->getObjeto();	
				$value["objeto"] = $myObj->getObjeto();	
				$value[5] = $myObj->getAcao();	
				$value["acao"] = $myObj->getAcao();	
				$value[6] = $myObj->getIp();	
				$value["ip"] = $myObj->getIp();	
				$value[7] = $myObj->getSessao();	
				$value["sessao"] = $myObj->getSessao();	
				$value[8] = $myObj->getDatahora();	
				$value["datahora"] = $myObj->getDatahora();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarAppLogonHistorico( $tipo, $valor ){ 
			$value = array();
			$myObj = new AppLogonHistorico();
			$vmyObj = $myObj->consultarAppLogonHistorico( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdAppLogonHistorico();
				$value[$i]["id_app_logon_historico"] = $vmyObj[$i]->getIdAppLogonHistorico();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdAppLogon();
				$value[$i]["id_app_logon"] = $vmyObj[$i]->getIdAppLogon();
				$value[$i][3] = $vmyObj[$i]->getIdeObjeto();
				$value[$i]["ide_objeto"] = $vmyObj[$i]->getIdeObjeto();
				$value[$i][4] = $vmyObj[$i]->getObjeto();
				$value[$i]["objeto"] = $vmyObj[$i]->getObjeto();
				$value[$i][5] = $vmyObj[$i]->getAcao();
				$value[$i]["acao"] = $vmyObj[$i]->getAcao();
				$value[$i][6] = $vmyObj[$i]->getIp();
				$value[$i]["ip"] = $vmyObj[$i]->getIp();
				$value[$i][7] = $vmyObj[$i]->getSessao();
				$value[$i]["sessao"] = $vmyObj[$i]->getSessao();
				$value[$i][8] = $vmyObj[$i]->getDatahora();
				$value[$i]["datahora"] = $vmyObj[$i]->getDatahora();
			}
			unset($myObj);
			
			return $value;
		}

		public static function buscarAppLogonHistoricoAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){ 
			$value = array();
			$myObj = new AppLogonHistorico();
			if( $myObj->buscarAppLogonHistoricoAttribute($AttributeFieldNameComparer, $Value, $SearchCompare) ){
				$value[0] = $myObj->getIdAppLogonHistorico();	
				$value["id_app_logon_historico"] = $myObj->getIdAppLogonHistorico();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdAppLogon();	
				$value["id_app_logon"] = $myObj->getIdAppLogon();	
				$value[3] = $myObj->getIdeObjeto();	
				$value["ide_objeto"] = $myObj->getIdeObjeto();	
				$value[4] = $myObj->getObjeto();	
				$value["objeto"] = $myObj->getObjeto();	
				$value[5] = $myObj->getAcao();	
				$value["acao"] = $myObj->getAcao();	
				$value[6] = $myObj->getIp();	
				$value["ip"] = $myObj->getIp();	
				$value[7] = $myObj->getSessao();	
				$value["sessao"] = $myObj->getSessao();	
				$value[8] = $myObj->getDatahora();	
				$value["datahora"] = $myObj->getDatahora();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarAppLogonHistoricoAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){ 
			$value = array();
			$myObj = new AppLogonHistorico();
			$vmyObj = $myObj->consultarAppLogonHistoricoAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdAppLogonHistorico();
				$value[$i]["id_app_logon_historico"] = $vmyObj[$i]->getIdAppLogonHistorico();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdAppLogon();
				$value[$i]["id_app_logon"] = $vmyObj[$i]->getIdAppLogon();
				$value[$i][3] = $vmyObj[$i]->getIdeObjeto();
				$value[$i]["ide_objeto"] = $vmyObj[$i]->getIdeObjeto();
				$value[$i][4] = $vmyObj[$i]->getObjeto();
				$value[$i]["objeto"] = $vmyObj[$i]->getObjeto();
				$value[$i][5] = $vmyObj[$i]->getAcao();
				$value[$i]["acao"] = $vmyObj[$i]->getAcao();
				$value[$i][6] = $vmyObj[$i]->getIp();
				$value[$i]["ip"] = $vmyObj[$i]->getIp();
				$value[$i][7] = $vmyObj[$i]->getSessao();
				$value[$i]["sessao"] = $vmyObj[$i]->getSessao();
				$value[$i][8] = $vmyObj[$i]->getDatahora();
				$value[$i]["datahora"] = $vmyObj[$i]->getDatahora();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirAppLogonHistorico($myIdAppLogonHistorico, $myIdentificador, $myIdAppLogon, $myIdeObjeto, $myObjeto, $myAcao, $myIp, $mySessao, $myDatahora){
			$myObj = new AppLogonHistorico();
			$myObj->setAppLogonHistorico($myIdAppLogonHistorico, $myIdentificador, $myIdAppLogon, $myIdeObjeto, $myObjeto, $myAcao, $myIp, $mySessao, $myDatahora);
			return $myObj->inserirAppLogonHistorico();
		}

		public static function alterarAppLogonHistorico($myIdAppLogonHistorico, $myIdentificador, $myIdAppLogon, $myIdeObjeto, $myObjeto, $myAcao, $myIp, $mySessao, $myDatahora){
			$myObj = new AppLogonHistorico();
			$myObj->setAppLogonHistorico($myIdAppLogonHistorico, $myIdentificador, $myIdAppLogon, $myIdeObjeto, $myObjeto, $myAcao, $myIp, $mySessao, $myDatahora);
			return $myObj->alterarAppLogonHistorico();
		}

		public static function alterarAtributoIdentificador($myIdAppLogonHistorico, $myIdentificador){
			$myObj = new AppLogonHistorico();
			$myObj->setIdAppLogonHistorico($myIdAppLogonHistorico);
			$myObj->setIdentificador($myIdentificador);
			return $myObj->alterarAtributoIdentificador();
		}

		public static function alterarAtributoIdAppLogon($myIdAppLogonHistorico, $myIdAppLogon){
			$myObj = new AppLogonHistorico();
			$myObj->setIdAppLogonHistorico($myIdAppLogonHistorico);
			$myObj->setIdAppLogon($myIdAppLogon);
			return $myObj->alterarAtributoIdAppLogon();
		}

		public static function alterarAtributoIdeObjeto($myIdAppLogonHistorico, $myIdeObjeto){
			$myObj = new AppLogonHistorico();
			$myObj->setIdAppLogonHistorico($myIdAppLogonHistorico);
			$myObj->setIdeObjeto($myIdeObjeto);
			return $myObj->alterarAtributoIdeObjeto();
		}

		public static function alterarAtributoObjeto($myIdAppLogonHistorico, $myObjeto){
			$myObj = new AppLogonHistorico();
			$myObj->setIdAppLogonHistorico($myIdAppLogonHistorico);
			$myObj->setObjeto($myObjeto);
			return $myObj->alterarAtributoObjeto();
		}

		public static function alterarAtributoAcao($myIdAppLogonHistorico, $myAcao){
			$myObj = new AppLogonHistorico();
			$myObj->setIdAppLogonHistorico($myIdAppLogonHistorico);
			$myObj->setAcao($myAcao);
			return $myObj->alterarAtributoAcao();
		}

		public static function alterarAtributoIp($myIdAppLogonHistorico, $myIp){
			$myObj = new AppLogonHistorico();
			$myObj->setIdAppLogonHistorico($myIdAppLogonHistorico);
			$myObj->setIp($myIp);
			return $myObj->alterarAtributoIp();
		}

		public static function alterarAtributoSessao($myIdAppLogonHistorico, $mySessao){
			$myObj = new AppLogonHistorico();
			$myObj->setIdAppLogonHistorico($myIdAppLogonHistorico);
			$myObj->setSessao($mySessao);
			return $myObj->alterarAtributoSessao();
		}

		public static function alterarAtributoDatahora($myIdAppLogonHistorico, $myDatahora){
			$myObj = new AppLogonHistorico();
			$myObj->setIdAppLogonHistorico($myIdAppLogonHistorico);
			$myObj->setDatahora($myDatahora);
			return $myObj->alterarAtributoDatahora();
		}

		public static function excluirAppLogonHistorico($myIdAppLogonHistorico){
			$myObj = new AppLogonHistorico();
			$myObj->setIdAppLogonHistorico($myIdAppLogonHistorico);
			return $myObj->excluirAppLogonHistorico();
		}

	} 
?>