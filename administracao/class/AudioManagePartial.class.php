<? 
	class AudioManagePartial extends AudioManage { 
		
		public static function resultConsultar($value){
			
			for ($i=0; $i < count($value); $i++){
				$value[$i]["link"] = Url::Audio($value[$i]["id_audio"], $value[$i]["identificador"], $value[$i]["titulo"]);
				$value[$i]["link_download"] = Url::AudioDownload($value[$i]["arquivo"]);
				$value[$i]["player_mini"] = AudioPlayer::PlayerMiniByAudioManage($value[$i], false);
			}
			
			return $value;
		}
		
		public static function consultar($query = null, $sort = null, $offset = null, $limit = null) {
			return self::resultConsultar(
				AudioManage::consultar($query, $sort, $offset, $limit)
			);
		}
		
		public static function consultarSearchQuery(array $searchQueryComparerCollection=array(), array $searchQueryOrderCollection=array(), $limitStart=0, $limitCount=0) {
			return self::resultConsultar(
				AudioManage::consultarSearchQuery($searchQueryComparerCollection, $searchQueryOrderCollection, $limitStart, $limitCount)
			);
		}
		
		public static function AudiosByCategoria($IdCategoria, $Limit=5){
			return self::consultarSearchQuery(
				array(
					new SearchQueryComparer(AudioAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
					new SearchQueryComparer(AudioAttribute::IdAudioCategoria(), SearchComparer::Igual(), SearchCondition::E(), $IdCategoria),
				),
				array(
					new SearchQueryOrder(AudioAttribute::Datahora(), SearchOrder::Decrescente())
				),
				0, $Limit
			);
		}

		public static function Ultimos($Limit=0, $IdNotIn=0){
			return self::consultarSearchQuery(
				array(
					new SearchQueryComparer(AudioAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
					new SearchQueryComparer(AudioAttribute::IdAudio(), SearchComparer::Diferente(), SearchCondition::E(), $IdNotIn),
				),
				array(
					new SearchQueryOrder(AudioAttribute::Datahora(), SearchOrder::Decrescente())
				),
				0, $Limit
			);
		}
		
		public static function ListarArquivos($dir = "../files/multimidia/"){
			
			$templates = array();
			$i=0;
			
		    if ($dh = opendir($dir)) {
		        while (($file = readdir($dh)) !== false) {
		        	if(eregi("(.)+((\.mp3)|(\.wma))$", $file)){
		        		$templates[$i++] = trim($file);
		        	}
		        }
		        closedir($dh);
		    }
		    
		    //natcasesort($templates);
		    rsort($templates);
		    
			return $templates;
		}

	} 
?>