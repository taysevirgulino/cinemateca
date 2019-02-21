<?
	class EmktEmail {
		
		public static function EnviarTeste($IdEmkt, $EmailTeste){
			
			$objEmkt = new Emkt();
			
			if($objEmkt->buscarEmkt(1, $IdEmkt)){
				
				$Email = new Email(Current::Site());
				
				//$Email->From = $Email->Sender = $objEmkt->getRemetenteEmail();
				$Email->FromName = $objEmkt->getRemetenteNome();
				$Email->AddReplyTo($objEmkt->getRemetenteEmail());
				
				$Email->Subject = $objEmkt->getAssunto();
				$Body = System::_TextByHtml($objEmkt->getMensagemHtml());
				$Body .= EmktEmail::LinkRemover($EmailTeste);	
				$Email->Body = $Body;
				$Email->AltBody = $objEmkt->getMensagemTexto();
				
				$Email->AddAddress($EmailTeste);
				
				return $Email->Send();
				
			}
			
			return false;
		}
		
		public static function Enviar($objEmkt, $vContatos){

			if(count($vContatos) > 0){

				$Email = new Email(Current::Site());
				
				//$Email->From = $Email->Sender = $objEmkt->getRemetenteEmail();
				$Email->FromName = $objEmkt->getRemetenteNome();
				$Email->AddReplyTo($objEmkt->getRemetenteEmail());
				
				$Email->Subject = $objEmkt->getAssunto();
				$Email->AltBody = $objEmkt->getMensagemTexto();
				
				$Body = System::_TextByHtml($objEmkt->getMensagemHtml());
				if(count($vContatos) == 1){
					$Body .= EmktEmail::LinkRemover($vContatos[0]["email"]);	
				}
				$Email->Body = $Body;
				
				$Email->AddAddress($vContatos[0]["email"], $vContatos[0]["nome"]);
				for($i=1; $i < count($vContatos); $i++){
					$Email->AddBCC($vContatos[$i]["email"], $vContatos[$i]["nome"]);
				}
				
				return $Email->Send();
			}
			
			return false;
		}
		
		private static function LinkRemover($Email){
			return "<br /><br /><br /><p>Se você não deseja mais receber nossos e-mails, <a href='".Url::EmktContatoRemover($Email)."' target='_blank'>cancele sua inscrição neste link</a>.</p>";
		}
		
		public static function EmailsByString( $TextMailing ){
			$pattern = '/[a-z0-9&\.\-_]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2,3}/is';
			preg_match_all($pattern, $TextMailing, $matches);
			
			return $matches[0];
		}
	}
?>