<? 
	class MuralRecadoManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarMuralRecado( $tipo, $valor ){ 
			$value = array();
			$myObj = new MuralRecado();
			if( $myObj->buscarMuralRecado( $tipo, $valor ) ){
				$value[0] = $myObj->getIdMuralRecado();	
				$value["id_mural_recado"] = $myObj->getIdMuralRecado();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getNome();	
				$value["nome"] = $myObj->getNome();	
				$value[3] = $myObj->getEmail();	
				$value["email"] = $myObj->getEmail();	
				$value[4] = $myObj->getTexto();	
				$value["texto"] = $myObj->getTexto();	
				$value[5] = $myObj->getIp();	
				$value["ip"] = $myObj->getIp();	
				$value[6] = $myObj->getDatahora();	
				$value["datahora"] = $myObj->getDatahora();	
				$value[7] = $myObj->getStatus();	
				$value["status"] = $myObj->getStatus();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarMuralRecado( $tipo, $valor ){ 
			$value = array();
			$myObj = new MuralRecado();
			$vmyObj = $myObj->consultarMuralRecado( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdMuralRecado();
				$value[$i]["id_mural_recado"] = $vmyObj[$i]->getIdMuralRecado();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getNome();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				$value[$i][3] = $vmyObj[$i]->getEmail();
				$value[$i]["email"] = $vmyObj[$i]->getEmail();
				$value[$i][4] = $vmyObj[$i]->getTexto();
				$value[$i]["texto"] = $vmyObj[$i]->getTexto();
				$value[$i][5] = $vmyObj[$i]->getIp();
				$value[$i]["ip"] = $vmyObj[$i]->getIp();
				$value[$i][6] = $vmyObj[$i]->getDatahora();
				$value[$i]["datahora"] = $vmyObj[$i]->getDatahora();
				$value[$i][7] = $vmyObj[$i]->getStatus();
				$value[$i]["status"] = $vmyObj[$i]->getStatus();
			}
			unset($myObj);
			
			return $value;
		}

		public static function buscarMuralRecadoAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){ 
			$value = array();
			$myObj = new MuralRecado();
			if( $myObj->buscarMuralRecadoAttribute($AttributeFieldNameComparer, $Value, $SearchCompare) ){
				$value[0] = $myObj->getIdMuralRecado();	
				$value["id_mural_recado"] = $myObj->getIdMuralRecado();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getNome();	
				$value["nome"] = $myObj->getNome();	
				$value[3] = $myObj->getEmail();	
				$value["email"] = $myObj->getEmail();	
				$value[4] = $myObj->getTexto();	
				$value["texto"] = $myObj->getTexto();	
				$value[5] = $myObj->getIp();	
				$value["ip"] = $myObj->getIp();	
				$value[6] = $myObj->getDatahora();	
				$value["datahora"] = $myObj->getDatahora();	
				$value[7] = $myObj->getStatus();	
				$value["status"] = $myObj->getStatus();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarMuralRecadoAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){ 
			$value = array();
			$myObj = new MuralRecado();
			$vmyObj = $myObj->consultarMuralRecadoAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdMuralRecado();
				$value[$i]["id_mural_recado"] = $vmyObj[$i]->getIdMuralRecado();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getNome();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				$value[$i][3] = $vmyObj[$i]->getEmail();
				$value[$i]["email"] = $vmyObj[$i]->getEmail();
				$value[$i][4] = $vmyObj[$i]->getTexto();
				$value[$i]["texto"] = $vmyObj[$i]->getTexto();
				$value[$i][5] = $vmyObj[$i]->getIp();
				$value[$i]["ip"] = $vmyObj[$i]->getIp();
				$value[$i][6] = $vmyObj[$i]->getDatahora();
				$value[$i]["datahora"] = $vmyObj[$i]->getDatahora();
				$value[$i][7] = $vmyObj[$i]->getStatus();
				$value[$i]["status"] = $vmyObj[$i]->getStatus();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirMuralRecado($myIdMuralRecado, $myIdentificador, $myNome, $myEmail, $myTexto, $myIp, $myDatahora, $myStatus){
			$myObj = new MuralRecado();
			$myObj->setMuralRecado($myIdMuralRecado, $myIdentificador, $myNome, $myEmail, $myTexto, $myIp, $myDatahora, $myStatus);
			return $myObj->inserirMuralRecado();
		}

		public static function alterarMuralRecado($myIdMuralRecado, $myIdentificador, $myNome, $myEmail, $myTexto, $myIp, $myDatahora, $myStatus){
			$myObj = new MuralRecado();
			$myObj->setMuralRecado($myIdMuralRecado, $myIdentificador, $myNome, $myEmail, $myTexto, $myIp, $myDatahora, $myStatus);
			return $myObj->alterarMuralRecado();
		}

		public static function alterarAtributoNome($myIdMuralRecado, $myNome){
			$myObj = new MuralRecado();
			$myObj->setIdMuralRecado($myIdMuralRecado);
			$myObj->setNome($myNome);
			return $myObj->alterarAtributoNome();
		}

		public static function alterarAtributoEmail($myIdMuralRecado, $myEmail){
			$myObj = new MuralRecado();
			$myObj->setIdMuralRecado($myIdMuralRecado);
			$myObj->setEmail($myEmail);
			return $myObj->alterarAtributoEmail();
		}

		public static function alterarAtributoTexto($myIdMuralRecado, $myTexto){
			$myObj = new MuralRecado();
			$myObj->setIdMuralRecado($myIdMuralRecado);
			$myObj->setTexto($myTexto);
			return $myObj->alterarAtributoTexto();
		}

		public static function alterarAtributoIp($myIdMuralRecado, $myIp){
			$myObj = new MuralRecado();
			$myObj->setIdMuralRecado($myIdMuralRecado);
			$myObj->setIp($myIp);
			return $myObj->alterarAtributoIp();
		}

		public static function alterarAtributoDatahora($myIdMuralRecado, $myDatahora){
			$myObj = new MuralRecado();
			$myObj->setIdMuralRecado($myIdMuralRecado);
			$myObj->setDatahora($myDatahora);
			return $myObj->alterarAtributoDatahora();
		}

		public static function alterarAtributoStatus($myIdMuralRecado, $myStatus){
			$myObj = new MuralRecado();
			$myObj->setIdMuralRecado($myIdMuralRecado);
			$myObj->setStatus($myStatus);
			return $myObj->alterarAtributoStatus();
		}

		public static function excluirMuralRecado($myIdMuralRecado){
			$myObj = new MuralRecado();
			$myObj->setIdMuralRecado($myIdMuralRecado);
			return $myObj->excluirMuralRecado();
		}
		
		public static function Comentar($Nome, $Email, $Mensagem){
			$Nome = System::_QueryString(base64_decode($Nome));
			$Email = System::_QueryString(base64_decode($Email));
			$Mensagem = substr(strip_tags(System::_QueryString(base64_decode($Mensagem))), 0, 700);
			
			return MuralRecadoManage::inserirMuralRecado(-1, null, $Nome, $Email, $Mensagem, $_SERVER['REMOTE_ADDR'], date("Y-m-d H:i:s"), 0);
		}
		
		public static function Recados ( $Limit ){
			$sql = "SELECT 
					  tb_mural_recado.*
					FROM
					  tb_mural_recado
					WHERE
					  tb_mural_recado.`status` = 1
					ORDER BY
					  tb_mural_recado.datahora DESC
					LIMIT $Limit";
			
			return MuralRecadoManage::consultarMuralRecado(3, $sql);
		}

	} 
?>