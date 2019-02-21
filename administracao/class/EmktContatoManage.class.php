<? 
	class EmktContatoManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarEmktContato( $tipo, $valor ){ 
			$value = array();
			$myObj = new EmktContato();
			if( $myObj->buscarEmktContato( $tipo, $valor ) ){
				$value[0] = $myObj->getIdEmktContato();	
				$value["id_emkt_contato"] = $myObj->getIdEmktContato();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getNome();	
				$value["nome"] = $myObj->getNome();	
				$value[3] = $myObj->getEmail();	
				$value["email"] = $myObj->getEmail();	
				$value[4] = $myObj->getStatus();	
				$value["status"] = $myObj->getStatus();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarEmktContato( $tipo, $valor ){ 
			$value = array();
			$myObj = new EmktContato();
			$vmyObj = $myObj->consultarEmktContato( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdEmktContato();
				$value[$i]["id_emkt_contato"] = $vmyObj[$i]->getIdEmktContato();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getNome();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				$value[$i][3] = $vmyObj[$i]->getEmail();
				$value[$i]["email"] = $vmyObj[$i]->getEmail();
				$value[$i][4] = $vmyObj[$i]->getStatus();
				$value[$i]["status"] = $vmyObj[$i]->getStatus();
			}
			unset($myObj);
			
			return $value;
		}

		public static function buscarEmktContatoAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){ 
			$value = array();
			$myObj = new EmktContato();
			if( $myObj->buscarEmktContatoAttribute($AttributeFieldNameComparer, $Value, $SearchCompare) ){
				$value[0] = $myObj->getIdEmktContato();	
				$value["id_emkt_contato"] = $myObj->getIdEmktContato();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getNome();	
				$value["nome"] = $myObj->getNome();	
				$value[3] = $myObj->getEmail();	
				$value["email"] = $myObj->getEmail();	
				$value[4] = $myObj->getStatus();	
				$value["status"] = $myObj->getStatus();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarEmktContatoAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){ 
			$value = array();
			$myObj = new EmktContato();
			$vmyObj = $myObj->consultarEmktContatoAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdEmktContato();
				$value[$i]["id_emkt_contato"] = $vmyObj[$i]->getIdEmktContato();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getNome();
				$value[$i]["nome"] = $vmyObj[$i]->getNome();
				$value[$i][3] = $vmyObj[$i]->getEmail();
				$value[$i]["email"] = $vmyObj[$i]->getEmail();
				$value[$i][4] = $vmyObj[$i]->getStatus();
				$value[$i]["status"] = $vmyObj[$i]->getStatus();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirEmktContato($myIdEmktContato, $myIdentificador, $myNome, $myEmail, $myStatus){
			$myObj = new EmktContato();
			$myObj->setEmktContato($myIdEmktContato, $myIdentificador, $myNome, $myEmail, $myStatus);
			return $myObj->inserirEmktContato();
		}

		public static function alterarEmktContato($myIdEmktContato, $myIdentificador, $myNome, $myEmail, $myStatus){
			$myObj = new EmktContato();
			$myObj->setEmktContato($myIdEmktContato, $myIdentificador, $myNome, $myEmail, $myStatus);
			return $myObj->alterarEmktContato();
		}

		public static function alterarAtributoNome($myIdEmktContato, $myNome){
			$myObj = new EmktContato();
			$myObj->setIdEmktContato($myIdEmktContato);
			$myObj->setNome($myNome);
			return $myObj->alterarAtributoNome();
		}

		public static function alterarAtributoEmail($myIdEmktContato, $myEmail){
			$myObj = new EmktContato();
			$myObj->setIdEmktContato($myIdEmktContato);
			$myObj->setEmail($myEmail);
			return $myObj->alterarAtributoEmail();
		}

		public static function alterarAtributoStatus($myIdEmktContato, $myStatus){
			$myObj = new EmktContato();
			$myObj->setIdEmktContato($myIdEmktContato);
			$myObj->setStatus($myStatus);
			return $myObj->alterarAtributoStatus();
		}

		public static function excluirEmktContato($myIdEmktContato){
			$myObj = new EmktContato();
			$myObj->setIdEmktContato($myIdEmktContato);
			return $myObj->excluirEmktContato();
		}
		
		public static function ContatosCountByLista($IdLista){
			$sql = "SELECT 
					  COUNT(tb_emkt_contato.id_emkt_contato) AS count
					FROM
					  tb_emkt_contato_lista
					  INNER JOIN tb_emkt_contato ON (tb_emkt_contato_lista.id_emkt_contato = tb_emkt_contato.id_emkt_contato)
					WHERE
					  tb_emkt_contato_lista.id_emkt_lista = $IdLista";
			
			return SearchMysqlQuery::CountBySql($sql);
		}		
		
		public static function ContatosCountByDisparo($IdDisparo){
			$sql = "SELECT 
					  COUNT(`tb_emkt_contato`.id_emkt_contato) AS count
					FROM
					  `tb_emkt_contato`
					WHERE
					  tb_emkt_contato.id_emkt_contato IN (SELECT DISTINCT tb_emkt_contato.id_emkt_contato FROM tb_emkt_contato INNER JOIN tb_emkt_contato_lista ON (tb_emkt_contato.id_emkt_contato = tb_emkt_contato_lista.id_emkt_contato) INNER JOIN tb_emkt_lista ON (tb_emkt_contato_lista.id_emkt_lista = tb_emkt_lista.id_emkt_lista) INNER JOIN tb_emkt_destinatario ON (tb_emkt_lista.id_emkt_lista = tb_emkt_destinatario.id_emkt_lista) INNER JOIN tb_emkt_disparo ON (tb_emkt_destinatario.id_emkt_disparo = tb_emkt_disparo.id_emkt_disparo) WHERE tb_emkt_disparo.id_emkt_disparo = $IdDisparo) AND 
					  tb_emkt_contato.`status` = 1";
			
			return SearchMysqlQuery::CountBySql($sql);
		}		
		
		public static function ContatosByDisparo($IdDisparo){
			$sql = "SELECT 
					  tb_emkt_contato.*
					FROM
					  tb_emkt_contato
					WHERE
					  tb_emkt_contato.id_emkt_contato IN (SELECT DISTINCT tb_emkt_contato.id_emkt_contato FROM tb_emkt_contato INNER JOIN tb_emkt_contato_lista ON (tb_emkt_contato.id_emkt_contato = tb_emkt_contato_lista.id_emkt_contato) INNER JOIN tb_emkt_lista ON (tb_emkt_contato_lista.id_emkt_lista = tb_emkt_lista.id_emkt_lista) INNER JOIN tb_emkt_destinatario ON (tb_emkt_lista.id_emkt_lista = tb_emkt_destinatario.id_emkt_lista) INNER JOIN tb_emkt_disparo ON (tb_emkt_destinatario.id_emkt_disparo = tb_emkt_disparo.id_emkt_disparo) WHERE tb_emkt_disparo.id_emkt_disparo = $IdDisparo) AND 
					  tb_emkt_contato.`status` = 1
					ORDER BY
					  tb_emkt_contato.email";
			
			return EmktContatoManage::consultarEmktContato(3, $sql);
		}
		
		public static function NovoContato($Nome, $Email){
			$Nome = System::Strtoupper($Nome);
			$Email = System::Strtolower($Email);
			
			$obj = new EmktContato();
			
			if(!$obj->buscarEmktContatoAttribute(EmktContatoAttribute::Email(), $Email)){
				$obj->setEmktContato(-1, null, $Nome, $Email, 1);
				if($obj->inserirEmktContato()){
					$Lista = EmktListaManage::buscarEmktListaAttribute(EmktListaAttribute::Nome(), "%", SearchComparer::Contem());
					if(intval($Lista["id_emkt_lista"]) > 0){
						EmktContatoListaManage::inserirEmktContatoLista(-1, null, $obj->getIdEmktContato(), $Lista["id_emkt_lista"]);
					}
					
					$mail = new Email(CurrentSite::Site());
					$mail->Newsletter($obj);
					
					return true;
				}	
			}
			
			return false;
		}
		
		public static function SalvarNewsletter($Nome, $Email){
			$Nome = System::_QueryString(base64_decode($Nome));
			$Email = System::_QueryString(base64_decode($Email));
			
			EmktContatoManage::NovoContato($Nome, $Email);
			//NewsletterManage::inserirNewsletter(-1, null, null, $Nome, $Email, date("Y-m-d H:i:s"));
			
			return true;
		}	

	} 
?>