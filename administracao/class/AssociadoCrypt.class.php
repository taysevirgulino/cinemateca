<?
	class AssociadoCrypt {
		private static function _config(){
			return array('key' => "eb7ff18b50ae38e58d9c5308ecfcdc3bfa50359a", 'mode' => 'ecb', 'algorithm' => 'blowfish', 'base64' => true);
		}
		
		public static function Encrypt($password){
			$crypt = new Crypt( AssociadoCrypt::_config() );
			$result = $crypt->encrypt( $password );
			$crypt->close();
			return $result;
		}
		
		public static function Decrypt($password){
			$crypt = new Crypt( AssociadoCrypt::_config() );
			$result = $crypt->decrypt( $password );
			$crypt->close();
			return $result;
		}
		
		public static function Compare($textoPlano, $textoCrypt){
			$textoCrypt = trim(AssociadoCrypt::Decrypt($textoCrypt));
			return ($textoPlano == $textoCrypt);
		}
	}
?>