<? 
	class EmktDisparoManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarEmktDisparo( $tipo, $valor ){ 
			$value = array();
			$myObj = new EmktDisparo();
			if( $myObj->buscarEmktDisparo( $tipo, $valor ) ){
				$value[0] = $myObj->getIdEmktDisparo();	
				$value["id_emkt_disparo"] = $myObj->getIdEmktDisparo();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdEmkt();	
				$value["id_emkt"] = $myObj->getIdEmkt();	
				$value[3] = $myObj->getAgendamento();	
				$value["agendamento"] = $myObj->getAgendamento();	
				$value[4] = $myObj->getResultado();	
				$value["resultado"] = $myObj->getResultado();	
				$value[5] = $myObj->getStatus();	
				$value["status"] = $myObj->getStatus();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarEmktDisparo( $tipo, $valor ){ 
			$value = array();
			$myObj = new EmktDisparo();
			$vmyObj = $myObj->consultarEmktDisparo( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdEmktDisparo();
				$value[$i]["id_emkt_disparo"] = $vmyObj[$i]->getIdEmktDisparo();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdEmkt();
				$value[$i]["id_emkt"] = $vmyObj[$i]->getIdEmkt();
				$value[$i][3] = $vmyObj[$i]->getAgendamento();
				$value[$i]["agendamento"] = $vmyObj[$i]->getAgendamento();
				$value[$i][4] = $vmyObj[$i]->getResultado();
				$value[$i]["resultado"] = $vmyObj[$i]->getResultado();
				$value[$i][5] = $vmyObj[$i]->getStatus();
				$value[$i]["status"] = $vmyObj[$i]->getStatus();
			}
			unset($myObj);
			
			return $value;
		}

		public static function buscarEmktDisparoAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){ 
			$value = array();
			$myObj = new EmktDisparo();
			if( $myObj->buscarEmktDisparoAttribute($AttributeFieldNameComparer, $Value, $SearchCompare) ){
				$value[0] = $myObj->getIdEmktDisparo();	
				$value["id_emkt_disparo"] = $myObj->getIdEmktDisparo();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getIdEmkt();	
				$value["id_emkt"] = $myObj->getIdEmkt();	
				$value[3] = $myObj->getAgendamento();	
				$value["agendamento"] = $myObj->getAgendamento();	
				$value[4] = $myObj->getResultado();	
				$value["resultado"] = $myObj->getResultado();	
				$value[5] = $myObj->getStatus();	
				$value["status"] = $myObj->getStatus();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarEmktDisparoAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){ 
			$value = array();
			$myObj = new EmktDisparo();
			$vmyObj = $myObj->consultarEmktDisparoAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdEmktDisparo();
				$value[$i]["id_emkt_disparo"] = $vmyObj[$i]->getIdEmktDisparo();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getIdEmkt();
				$value[$i]["id_emkt"] = $vmyObj[$i]->getIdEmkt();
				$value[$i][3] = $vmyObj[$i]->getAgendamento();
				$value[$i]["agendamento"] = $vmyObj[$i]->getAgendamento();
				$value[$i][4] = $vmyObj[$i]->getResultado();
				$value[$i]["resultado"] = $vmyObj[$i]->getResultado();
				$value[$i][5] = $vmyObj[$i]->getStatus();
				$value[$i]["status"] = $vmyObj[$i]->getStatus();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirEmktDisparo($myIdEmktDisparo, $myIdentificador, $myIdEmkt, $myAgendamento, $myResultado, $myStatus){
			$myObj = new EmktDisparo();
			$myObj->setEmktDisparo($myIdEmktDisparo, $myIdentificador, $myIdEmkt, $myAgendamento, $myResultado, $myStatus);
			return $myObj->inserirEmktDisparo();
		}

		public static function alterarEmktDisparo($myIdEmktDisparo, $myIdentificador, $myIdEmkt, $myAgendamento, $myResultado, $myStatus){
			$myObj = new EmktDisparo();
			$myObj->setEmktDisparo($myIdEmktDisparo, $myIdentificador, $myIdEmkt, $myAgendamento, $myResultado, $myStatus);
			return $myObj->alterarEmktDisparo();
		}

		public static function alterarAtributoIdEmkt($myIdEmktDisparo, $myIdEmkt){
			$myObj = new EmktDisparo();
			$myObj->setIdEmktDisparo($myIdEmktDisparo);
			$myObj->setIdEmkt($myIdEmkt);
			return $myObj->alterarAtributoIdEmkt();
		}

		public static function alterarAtributoAgendamento($myIdEmktDisparo, $myAgendamento){
			$myObj = new EmktDisparo();
			$myObj->setIdEmktDisparo($myIdEmktDisparo);
			$myObj->setAgendamento($myAgendamento);
			return $myObj->alterarAtributoAgendamento();
		}

		public static function alterarAtributoResultado($myIdEmktDisparo, $myResultado){
			$myObj = new EmktDisparo();
			$myObj->setIdEmktDisparo($myIdEmktDisparo);
			$myObj->setResultado($myResultado);
			return $myObj->alterarAtributoResultado();
		}

		public static function alterarAtributoStatus($myIdEmktDisparo, $myStatus){
			$myObj = new EmktDisparo();
			$myObj->setIdEmktDisparo($myIdEmktDisparo);
			$myObj->setStatus($myStatus);
			return $myObj->alterarAtributoStatus();
		}

		public static function excluirEmktDisparo($myIdEmktDisparo){
			$myObj = new EmktDisparo();
			$myObj->setIdEmktDisparo($myIdEmktDisparo);
			return $myObj->excluirEmktDisparo();
		}
		
		public static function DisparosNow(){
			$sql = "SELECT
					  tb_emkt_disparo.*
					FROM
					  tb_emkt_disparo
					WHERE
					  DATE_FORMAT(tb_emkt_disparo.agendamento, '%Y-%m-%d %H:%i:00') <= DATE_FORMAT('".date("Y-m-d H:i:s")."', '%Y-%m-%d %H:%i:00') AND
					  tb_emkt_disparo.`status` = ".EmktDisparoStatus::Agendado();
			
			return EmktDisparoManage::consultarEmktDisparo(3, $sql);
		}

	} 
?>