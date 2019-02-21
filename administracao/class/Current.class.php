<?
	class Current{
		
		public static function IdeOrigem(){
			//return Current::IdeOrigemDefault();
			
			$ideOrigem = Current::getIdeOrigem();

			if(empty($ideOrigem)){
				if(preg_match("/administracao/", $_SERVER['REQUEST_URI'])){
					System::Redirect("site_selecao.php?url=".$_SERVER['REQUEST_URI']);
				}else{
					return Current::IdeOrigemDefault();
				}
			}
			
			return $ideOrigem;
		}
		
		public static function IdeOrigemDefault(){
			return "98defd6ee70dfb1dea416cecdf391f58";
		}
		
		public static function setIdeOrigem($ideOrigem){
			$_SESSION[Config::Server_Username()."IDE_ORIGEM_ADM"] = $ideOrigem;
			$_SESSION[Config::Server_Username()."CURRENT_ADM"] = null;
		}
		
		public static function getIdeOrigem(){
			return $_SESSION[Config::Server_Username()."IDE_ORIGEM_ADM"];
		}
		
		public static function Site(){
			$obj = $_SESSION[Config::Server_Username()."CURRENT_ADM"];
			
			if(empty($obj)){
				$obj = new Site();
				if($obj->buscarSite(5, Current::IdeOrigem())){
					$_SESSION[Config::Server_Username()."CURRENT_ADM"] = $obj;	
				}else{
					System::Redirect("logout.php");
				}
			}
			
			return $obj;
		}
		
		public static function setSite($objSite){
			$_SESSION[Config::Server_Username()."CURRENT_ADM"] = $objSite;
		}
	}
?>