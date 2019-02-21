<? 
	class Newsletter { 
		public function __construct(){} 
		public function __destruct(){} 
		
		public static function Salvar2($Email, $Nome=""){
			$rs = array();
			
			$status = EmktContatoManage::NovoContato($Nome, $Email);
			
			if($status){
				$rs["status"] = 1;
				$rs["aviso"] = "Obrigado por se cadastrar em nossa newsletter, em breve receberá novidades por e-mail!";
			}else{
				$rs["status"] = 0;
				$rs["aviso"] = "Problema ao cadastrar e-mail, tente novamente daqui alguns minutos!";
			}
			
			$rs["aviso"] = utf8_encode($rs["aviso"]);
			
			return $rs;
		}
		
		public static function Salvar_Lista($Nome, $Email, $Lista){
			$rs = array();
			$rs["status"] = 0;
			
			$obj = new EmktContato();
				
			if(!$obj->buscarEmktContatoAttribute(EmktContatoAttribute::Email(), $Email)){
				$obj->setEmktContato(-1, null, $Nome, $Email, 1);
				if($obj->inserirEmktContato()){
					$lista = new EmktLista();
					if(!$lista->buscarEmktListaAttribute(EmktListaAttribute::Nome(), $Lista)){
						$lista->setIdEmktLista( -1 );
						$lista->setIdentificador( null );
						$lista->setNome( $Lista );
						$lista->inserirEmktLista();
					}
					
					EmktContatoListaManage::inserirEmktContatoLista(-1, null, $obj->getIdEmktContato(), intval($lista->getIdEmktLista()));
					
					$rs["status"] = 0;
					$rs["aviso"] = "Obrigado por se cadastrar em nossa newsletter, em breve receberá novidades por e-mail!";
				}
			}else{
				$rs["status"] = 0;
				$rs["aviso"] = "Seu e-mail já está cadastrado. Obrigado.";
			}
				
			$rs["aviso"] = utf8_encode($rs["aviso"]);
			
			return $rs;
		}
		
		public static function Salvar($Nome, $Email){
			$Nome = System::_QueryString(base64_decode($Nome));
			$Email = System::_QueryString(base64_decode($Email));
			
			EmktContatoManage::NovoContato($Nome, $Email);
			//NewsletterManage::inserirNewsletter(-1, null, null, $Nome, $Email, date("Y-m-d H:i:s"));
			
			return true;
		}
		
		public static function Remover($Email){
			$Email = System::_QueryString(base64_decode($Email));
			$result = false;
			
			$Contato = new EmktContato();
			if($Contato->buscarEmktContatoAttribute(EmktContatoAttribute::Email(), $Email, SearchComparer::Igual())){
				$Contato->setStatus( 0 );
				$result = $Contato->alterarAtributoStatus();
			}else{
				$Contato->setEmktContato(-1, null, "", $Email, 0);
				$result = $Contato->inserirEmktContato();
			}
			return $result;
		}
		
		public static function SalvarSms($Nome, $Telefone){
			$Nome = System::_QueryString(base64_decode($Nome));
			$Telefone = System::_QueryString(base64_decode($Telefone));
			$result = false;
			
			$Sms = new Sms();
			if(!$Sms->buscarSmsAttribute(SmsAttribute::Telefone(), $Telefone, SearchComparer::Igual())){
				$Sms->setSms(-1, null, $Nome, $Telefone, date("Y-m-d H:i:s"), 1);
				$result = $Sms->inserirSms();
			}
			return $result;
		}
		
		public static function RemoverSms($Telefone){
			$Telefone = System::_QueryString(base64_decode($Telefone));
			$result = false;
			
			$Sms = new Sms();
			if($Sms->buscarSmsAttribute(SmsAttribute::Telefone(), $Telefone, SearchComparer::Igual())){
				$Sms->setStatus( 0 );
				$result = $Sms->alterarAtributoStatus();
			}else{
				$Sms->setSms(-1, null, "", $Telefone, 0);
				$result = $Sms->inserirSms();
			}
			return $result;
		}
		

	} 
?>