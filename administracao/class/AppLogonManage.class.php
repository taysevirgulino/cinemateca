<? 
	class AppLogonManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarAppLogon( $tipo, $valor ){ 
			$value = array();
			$myObj = new AppLogon();
			if( $myObj->buscarAppLogon( $tipo, $valor ) ){
				$value[0] = $myObj->getIdAppLogon();	
				$value["id_app_logon"] = $myObj->getIdAppLogon();	
				$value[1] = $myObj->getIdAppUsuario();	
				$value["id_app_usuario"] = $myObj->getIdAppUsuario();	
				$value[2] = $myObj->getDatahoraLogin();	
				$value["datahora_login"] = $myObj->getDatahoraLogin();	
				$value[3] = $myObj->getDatahoraLogout();	
				$value["datahora_logout"] = $myObj->getDatahoraLogout();	
				$value[4] = $myObj->getIp();	
				$value["ip"] = $myObj->getIp();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarAppLogon( $tipo, $valor ){ 
			$value = array();
			$myObj = new AppLogon();
			$vmyObj = $myObj->consultarAppLogon( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdAppLogon();
				$value[$i]["id_app_logon"] = $vmyObj[$i]->getIdAppLogon();
				$value[$i][1] = $vmyObj[$i]->getIdAppUsuario();
				$value[$i]["id_app_usuario"] = $vmyObj[$i]->getIdAppUsuario();
				$value[$i][2] = $vmyObj[$i]->getDatahoraLogin();
				$value[$i]["datahora_login"] = $vmyObj[$i]->getDatahoraLogin();
				$value[$i][3] = $vmyObj[$i]->getDatahoraLogout();
				$value[$i]["datahora_logout"] = $vmyObj[$i]->getDatahoraLogout();
				$value[$i][4] = $vmyObj[$i]->getIp();
				$value[$i]["ip"] = $vmyObj[$i]->getIp();
			}
			unset($myObj);
			
			return $value;
		}

		public static function buscarAppLogonAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){ 
			$value = array();
			$myObj = new AppLogon();
			if( $myObj->buscarAppLogonAttribute($AttributeFieldNameComparer, $Value, $SearchCompare) ){
				$value[0] = $myObj->getIdAppLogon();	
				$value["id_app_logon"] = $myObj->getIdAppLogon();	
				$value[1] = $myObj->getIdAppUsuario();	
				$value["id_app_usuario"] = $myObj->getIdAppUsuario();	
				$value[2] = $myObj->getDatahoraLogin();	
				$value["datahora_login"] = $myObj->getDatahoraLogin();	
				$value[3] = $myObj->getDatahoraLogout();	
				$value["datahora_logout"] = $myObj->getDatahoraLogout();	
				$value[4] = $myObj->getIp();	
				$value["ip"] = $myObj->getIp();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarAppLogonAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){ 
			$value = array();
			$myObj = new AppLogon();
			$vmyObj = $myObj->consultarAppLogonAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdAppLogon();
				$value[$i]["id_app_logon"] = $vmyObj[$i]->getIdAppLogon();
				$value[$i][1] = $vmyObj[$i]->getIdAppUsuario();
				$value[$i]["id_app_usuario"] = $vmyObj[$i]->getIdAppUsuario();
				$value[$i][2] = $vmyObj[$i]->getDatahoraLogin();
				$value[$i]["datahora_login"] = $vmyObj[$i]->getDatahoraLogin();
				$value[$i][3] = $vmyObj[$i]->getDatahoraLogout();
				$value[$i]["datahora_logout"] = $vmyObj[$i]->getDatahoraLogout();
				$value[$i][4] = $vmyObj[$i]->getIp();
				$value[$i]["ip"] = $vmyObj[$i]->getIp();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirAppLogon($myIdAppLogon, $myIdAppUsuario, $myDatahoraLogin, $myDatahoraLogout, $myIp){
			$myObj = new AppLogon();
			$myObj->setAppLogon($myIdAppLogon, $myIdAppUsuario, $myDatahoraLogin, $myDatahoraLogout, $myIp);
			return $myObj->inserirAppLogon();
		}

		public static function alterarAppLogon($myIdAppLogon, $myIdAppUsuario, $myDatahoraLogin, $myDatahoraLogout, $myIp){
			$myObj = new AppLogon();
			$myObj->setAppLogon($myIdAppLogon, $myIdAppUsuario, $myDatahoraLogin, $myDatahoraLogout, $myIp);
			return $myObj->alterarAppLogon();
		}

		public static function alterarAtributoIdAppUsuario($myIdAppLogon, $myIdAppUsuario){
			$myObj = new AppLogon();
			$myObj->setIdAppLogon($myIdAppLogon);
			$myObj->setIdAppUsuario($myIdAppUsuario);
			return $myObj->alterarAtributoIdAppUsuario();
		}

		public static function alterarAtributoDatahoraLogin($myIdAppLogon, $myDatahoraLogin){
			$myObj = new AppLogon();
			$myObj->setIdAppLogon($myIdAppLogon);
			$myObj->setDatahoraLogin($myDatahoraLogin);
			return $myObj->alterarAtributoDatahoraLogin();
		}

		public static function alterarAtributoDatahoraLogout($myIdAppLogon, $myDatahoraLogout){
			$myObj = new AppLogon();
			$myObj->setIdAppLogon($myIdAppLogon);
			$myObj->setDatahoraLogout($myDatahoraLogout);
			return $myObj->alterarAtributoDatahoraLogout();
		}

		public static function alterarAtributoIp($myIdAppLogon, $myIp){
			$myObj = new AppLogon();
			$myObj->setIdAppLogon($myIdAppLogon);
			$myObj->setIp($myIp);
			return $myObj->alterarAtributoIp();
		}

		public static function excluirAppLogon($myIdAppLogon){
			$myObj = new AppLogon();
			$myObj->setIdAppLogon($myIdAppLogon);
			return $myObj->excluirAppLogon();
		}
		
		public static function GetAppLogon(){
			$APP_LOGON = $_SESSION["APP_LOGON"];
			if ( get_class( $APP_LOGON ) == "AppLogon" ) {
				return $APP_LOGON;
			}
			return new AppLogon();
		}
		
		public static function GetAppUsuario(){
			$USER = $_SESSION["USER"];
			if ( get_class( $USER ) == "AppUsuario" ) {
				return $USER;
			}
			return new AppUsuario();
		}
	} 
?>