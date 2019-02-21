<? 
	class EmktManage { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function buscarEmkt( $tipo, $valor ){ 
			$value = array();
			$myObj = new Emkt();
			if( $myObj->buscarEmkt( $tipo, $valor ) ){
				$value[0] = $myObj->getIdEmkt();	
				$value["id_emkt"] = $myObj->getIdEmkt();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getTitulo();	
				$value["titulo"] = $myObj->getTitulo();	
				$value[3] = $myObj->getAssunto();	
				$value["assunto"] = $myObj->getAssunto();	
				$value[4] = $myObj->getRemetenteNome();	
				$value["remetente_nome"] = $myObj->getRemetenteNome();	
				$value[5] = $myObj->getRemetenteEmail();	
				$value["remetente_email"] = $myObj->getRemetenteEmail();	
				$value[6] = $myObj->getMensagemHtml();	
				$value["mensagem_html"] = $myObj->getMensagemHtml();	
				$value[7] = $myObj->getMensagemTexto();	
				$value["mensagem_texto"] = $myObj->getMensagemTexto();	
				$value[8] = $myObj->getDatahora();	
				$value["datahora"] = $myObj->getDatahora();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarEmkt( $tipo, $valor ){ 
			$value = array();
			$myObj = new Emkt();
			$vmyObj = $myObj->consultarEmkt( $tipo, $valor );
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdEmkt();
				$value[$i]["id_emkt"] = $vmyObj[$i]->getIdEmkt();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getTitulo();
				$value[$i]["titulo"] = $vmyObj[$i]->getTitulo();
				$value[$i][3] = $vmyObj[$i]->getAssunto();
				$value[$i]["assunto"] = $vmyObj[$i]->getAssunto();
				$value[$i][4] = $vmyObj[$i]->getRemetenteNome();
				$value[$i]["remetente_nome"] = $vmyObj[$i]->getRemetenteNome();
				$value[$i][5] = $vmyObj[$i]->getRemetenteEmail();
				$value[$i]["remetente_email"] = $vmyObj[$i]->getRemetenteEmail();
				$value[$i][6] = $vmyObj[$i]->getMensagemHtml();
				$value[$i]["mensagem_html"] = $vmyObj[$i]->getMensagemHtml();
				$value[$i][7] = $vmyObj[$i]->getMensagemTexto();
				$value[$i]["mensagem_texto"] = $vmyObj[$i]->getMensagemTexto();
				$value[$i][8] = $vmyObj[$i]->getDatahora();
				$value[$i]["datahora"] = $vmyObj[$i]->getDatahora();
			}
			unset($myObj);
			
			return $value;
		}

		public static function buscarEmktAttribute($AttributeFieldNameComparer, $Value, $SearchCompare=null){ 
			$value = array();
			$myObj = new Emkt();
			if( $myObj->buscarEmktAttribute($AttributeFieldNameComparer, $Value, $SearchCompare) ){
				$value[0] = $myObj->getIdEmkt();	
				$value["id_emkt"] = $myObj->getIdEmkt();	
				$value[1] = $myObj->getIdentificador();	
				$value["identificador"] = $myObj->getIdentificador();	
				$value[2] = $myObj->getTitulo();	
				$value["titulo"] = $myObj->getTitulo();	
				$value[3] = $myObj->getAssunto();	
				$value["assunto"] = $myObj->getAssunto();	
				$value[4] = $myObj->getRemetenteNome();	
				$value["remetente_nome"] = $myObj->getRemetenteNome();	
				$value[5] = $myObj->getRemetenteEmail();	
				$value["remetente_email"] = $myObj->getRemetenteEmail();	
				$value[6] = $myObj->getMensagemHtml();	
				$value["mensagem_html"] = $myObj->getMensagemHtml();	
				$value[7] = $myObj->getMensagemTexto();	
				$value["mensagem_texto"] = $myObj->getMensagemTexto();	
				$value[8] = $myObj->getDatahora();	
				$value["datahora"] = $myObj->getDatahora();	
			}
			unset($myObj);
			
			return $value;
		}

		public static function consultarEmktAttribute($AttributeFieldNameComparer="", $Value="", $SearchComparer="", $AttributeFieldNameOrder="", $SearchOrder=""){ 
			$value = array();
			$myObj = new Emkt();
			$vmyObj = $myObj->consultarEmktAttribute($AttributeFieldNameComparer, $Value, $SearchComparer, $AttributeFieldNameOrder, $SearchOrder);
			for ($i=0; $i < count($vmyObj); $i++){
				$value[$i][0] = $vmyObj[$i]->getIdEmkt();
				$value[$i]["id_emkt"] = $vmyObj[$i]->getIdEmkt();
				$value[$i][1] = $vmyObj[$i]->getIdentificador();
				$value[$i]["identificador"] = $vmyObj[$i]->getIdentificador();
				$value[$i][2] = $vmyObj[$i]->getTitulo();
				$value[$i]["titulo"] = $vmyObj[$i]->getTitulo();
				$value[$i][3] = $vmyObj[$i]->getAssunto();
				$value[$i]["assunto"] = $vmyObj[$i]->getAssunto();
				$value[$i][4] = $vmyObj[$i]->getRemetenteNome();
				$value[$i]["remetente_nome"] = $vmyObj[$i]->getRemetenteNome();
				$value[$i][5] = $vmyObj[$i]->getRemetenteEmail();
				$value[$i]["remetente_email"] = $vmyObj[$i]->getRemetenteEmail();
				$value[$i][6] = $vmyObj[$i]->getMensagemHtml();
				$value[$i]["mensagem_html"] = $vmyObj[$i]->getMensagemHtml();
				$value[$i][7] = $vmyObj[$i]->getMensagemTexto();
				$value[$i]["mensagem_texto"] = $vmyObj[$i]->getMensagemTexto();
				$value[$i][8] = $vmyObj[$i]->getDatahora();
				$value[$i]["datahora"] = $vmyObj[$i]->getDatahora();
			}
			unset($myObj);
			
			return $value;
		}

		public static function inserirEmkt($myIdEmkt, $myIdentificador, $myTitulo, $myAssunto, $myRemetenteNome, $myRemetenteEmail, $myMensagemHtml, $myMensagemTexto, $myDatahora){
			$myObj = new Emkt();
			$myObj->setEmkt($myIdEmkt, $myIdentificador, $myTitulo, $myAssunto, $myRemetenteNome, $myRemetenteEmail, $myMensagemHtml, $myMensagemTexto, $myDatahora);
			return $myObj->inserirEmkt();
		}

		public static function alterarEmkt($myIdEmkt, $myIdentificador, $myTitulo, $myAssunto, $myRemetenteNome, $myRemetenteEmail, $myMensagemHtml, $myMensagemTexto, $myDatahora){
			$myObj = new Emkt();
			$myObj->setEmkt($myIdEmkt, $myIdentificador, $myTitulo, $myAssunto, $myRemetenteNome, $myRemetenteEmail, $myMensagemHtml, $myMensagemTexto, $myDatahora);
			return $myObj->alterarEmkt();
		}

		public static function alterarAtributoTitulo($myIdEmkt, $myTitulo){
			$myObj = new Emkt();
			$myObj->setIdEmkt($myIdEmkt);
			$myObj->setTitulo($myTitulo);
			return $myObj->alterarAtributoTitulo();
		}

		public static function alterarAtributoAssunto($myIdEmkt, $myAssunto){
			$myObj = new Emkt();
			$myObj->setIdEmkt($myIdEmkt);
			$myObj->setAssunto($myAssunto);
			return $myObj->alterarAtributoAssunto();
		}

		public static function alterarAtributoRemetenteNome($myIdEmkt, $myRemetenteNome){
			$myObj = new Emkt();
			$myObj->setIdEmkt($myIdEmkt);
			$myObj->setRemetenteNome($myRemetenteNome);
			return $myObj->alterarAtributoRemetenteNome();
		}

		public static function alterarAtributoRemetenteEmail($myIdEmkt, $myRemetenteEmail){
			$myObj = new Emkt();
			$myObj->setIdEmkt($myIdEmkt);
			$myObj->setRemetenteEmail($myRemetenteEmail);
			return $myObj->alterarAtributoRemetenteEmail();
		}

		public static function alterarAtributoMensagemHtml($myIdEmkt, $myMensagemHtml){
			$myObj = new Emkt();
			$myObj->setIdEmkt($myIdEmkt);
			$myObj->setMensagemHtml($myMensagemHtml);
			return $myObj->alterarAtributoMensagemHtml();
		}

		public static function alterarAtributoMensagemTexto($myIdEmkt, $myMensagemTexto){
			$myObj = new Emkt();
			$myObj->setIdEmkt($myIdEmkt);
			$myObj->setMensagemTexto($myMensagemTexto);
			return $myObj->alterarAtributoMensagemTexto();
		}

		public static function alterarAtributoDatahora($myIdEmkt, $myDatahora){
			$myObj = new Emkt();
			$myObj->setIdEmkt($myIdEmkt);
			$myObj->setDatahora($myDatahora);
			return $myObj->alterarAtributoDatahora();
		}

		public static function excluirEmkt($myIdEmkt){
			$myObj = new Emkt();
			$myObj->setIdEmkt($myIdEmkt);
			return $myObj->excluirEmkt();
		}

	} 
?>