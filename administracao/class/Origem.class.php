<?
	class Origem {
		
		public static function Registrar(){
			$origem = Origem::getOrigem();
			if(empty($origem)){
				$origem = System::_REQUEST("origem");
				if(empty($origem)){
					$origem = System::_REQUEST("utm_source");
				}
				if(empty($origem)){
					$referer = trim($_SERVER["HTTP_REFERER"]);
					
					if(empty($referer)){
						$origem = "direto";
					}else
					if(preg_match("/(facebook)/", $referer)){
						$origem = "facebook";
					}else
					if(preg_match("/(twitter)/", $referer)){
						$origem = "twitter";
					}else
					if(preg_match("/(t.co)/", $referer)){
						$origem = "twitter";
					}else
					if(preg_match("/(j.mp)/", $referer)){
						$origem = "twitter";
					}else
					if(preg_match("/(orkut)/", $referer)){
						$origem = "orkut";
					}else
					if(preg_match("/(google)/", $referer)){
						$origem = "google";
					}else
					if(preg_match("/(mail|miktd)/", $referer)){
						$origem = "newsletter";
					}else
					if(preg_match("/(idivulgue)/", $referer)){
						$origem = "banner";
					}else{
						$origem = "sites";
					}
					//$origem = $referer;
				}
				Origem::setOrigem( $origem );
			}
		}
		
		public static function setOrigem($value){
			$_SESSION["ORIGEM"] = $value;
		}
		
		public static function getOrigem(){
			return trim($_SESSION["ORIGEM"]);
		}
	}
?>