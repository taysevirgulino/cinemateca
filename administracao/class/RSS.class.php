<? 
	class RSS { 
		public function __construct(){} 
		public function __destruct(){} 

		public static function Postagens($url, $Limit=5){
			
			$Itens = $_SESSION["RSS_FEED"] = null;
			if(!is_array($Itens)){
				if(empty($url)){ return null; }
				
				define('MAGPIE_CACHE_DIR', LayoutTemplateGlobals::CachePath());
				require_once('administracao/plugins/magpierss/rss_fetch.inc');
				
				$rss = fetch_rss($url);
				
				$Itens = array();
				$i=0;
				foreach ($rss->items as $item ) {
					$Itens[$i]["title"] = $item[title];
					$Itens[$i]["link"] = $item[link];
					$Itens[$i]["description"] = $item[description];
					$Itens[$i]["datahora"] = date("Y-m-d H:i:s",strtotime($item[pubdate]));
					$i++;
					if($i >= $Limit){ break; }
				}
				
				$_SESSION["RSS_FEED"] = $Itens;
			}
			
			return $Itens;
		}
		
	} 
?>