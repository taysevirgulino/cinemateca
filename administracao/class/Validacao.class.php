<?
	class Validacao {
		
		public static function isChaveUrl($str){
			return  eregi("^([a-zA-Z0-9_-])+$", $str);
		}
		
		public static function isVazio($str){
			return empty($str);
		}
		public static function isHash($str){
			return  eregi("^([a-z0-9]){32}$", $str);
		}
		public static function isEmail( $email ){
			return  eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
		}
		
		public static function isCpf( $cpf ){
			return  eregi("^([0-9]){11}$", $cpf);
		}

		public static function isCep( $str ){
			return  eregi("^([0-9]){5}-([0-9]){3}$", $str);
		}

		public static function isTelefone( $str ){
			return  eregi("^\([0-9]{2}\)( )*[0-9]{3,4}-[0-9]{4}$", $str);
		}

		
		public static function isLogin( $str ){
			return  eregi("^([a-z0-9])+$", $str);
		}
		
		public static function isData( $data ){
			
			//Valida: d/m/Y
			$expdata = '^(([0-9]{1,2})/([0-9]{1,2})/([0-9]{4})){1}$';
			
			if( ereg($expdata, $data)){
				$a = explode("/", $data);
				return checkdate($a[1], $a[0], $a[2]);
			}

			//Valida: Y-m-d
			$expdata = '^(([0-9]{4})\-([0-9]{1,2})\-([0-9]{1,2})){1}$';
			
			if( ereg($expdata, $data)){
				$a = explode("-", $data);
				return checkdate($a[1], $a[2], $a[0]);
			}

			return false;

		}
		
		public static function isDataHora( $data ){
			
			//Valida: Y-m-d H:i:s
			$expdata = '/^(([0-9]{4})\-([0-9]{1,2})\-([0-9]{1,2})){1}[[:space:]](([0-9]{2}):([0-9]{2}):([0-9]{2})){1}$/';
				
			if( preg_match($expdata, $data)){
				return true;;
			}
			
			//Valida: d/m/Y H:i:s
			$expdata = '/^(([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})){1}[[:space:]](([0-9]{2}):([0-9]{2}):([0-9]{2})){1}$/';
				
			if( preg_match($expdata, $data)){
				return true;
			}
			
			//Valida: d/m/Y
			$expdata = '/^(([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})){1}$/';
			
			if( preg_match($expdata, $data) ){
				return true;
			}

			//Valida: Y-m-d
			$expdata = '/^(([0-9]{4})\-([0-9]{1,2})\-([0-9]{1,2})){1}$/';
			
			if( preg_match($expdata, $data)){
				return true;
			}

			return false;

		}

	}
?>