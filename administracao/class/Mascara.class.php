<?
	class Mascara {
		
		public static function Telefone( $value ){
			
			$value = preg_replace("/[^0-9]+/", "", $value);
			if(empty($value)){
				return "";
			}
			$value = preg_replace("/[0-9]{".strlen($value)."}$/", $value, "0000000000");
			$value = "(".substr($value, 0, 2).") ".substr($value, 2, 4)."-".substr($value, 6, 4)."";
			
			return $value;
		}
    
		public static function CEP( $value, $numeric=false ){
			
			$value = preg_replace("/[^0-9]+/", "", $value);
			if(empty($value)){
				return "";
			}
			$value = preg_replace("/^[0-9]{".strlen($value)."}/", $value, "00000000");
			if(!$numeric){
				$value = substr($value, 0, 5)."-".substr($value, 5, 3);	
			}
			
			return $value;
		}

	    public static function CPF($value, $numeric = false) {
	
	        $value = preg_replace("/[^0-9]+/", "", $value);
	        if (strlen($value)!=11) {
	            return "";
	        }
	        if (!$numeric) {
	        	$value = preg_replace("/^[0-9]{" . strlen($value) . "}/", $value, "00000000000");
	            $value = substr($value, 0, 3) . "." . substr($value, 3, 3) . "." . substr($value, 6, 3) . "-" . substr($value, 9, 2);
	        }
	
	        return (string)$value;
	    }
	
	    public static function CNPJ($value, $numeric = false) {
	
	        $value = preg_replace("/[^0-9]+/", "", $value);
	        if (empty($value)) {
	            return "";
	        }
	        $value = preg_replace("/^[0-9]{" . strlen($value) . "}/", $value, "00000000000000");
	        if (!$numeric) {
	            //00.000.000/0000-00
	            $value = substr($value, 0, 2) . "." . substr($value, 2, 3) . "." . substr($value, 5, 3) . "/" . substr($value, 8, 4). "-" . substr($value, 12, 2);
	        }
	
	        return $value;
	    }
    
	}
?>