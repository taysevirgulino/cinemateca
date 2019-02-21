<? 
	class VideoManagePartial extends VideoManage { 

		public static function resultConsultar( $value ){
			
			for ($i=0; $i < count($value); $i++){
				$value[$i]["link"] = Url::Video($value[$i]["id_video"], $value[$i]["identificador"], $value[$i]["titulo"]);
				$value[$i]["link_youtube"] = VideoManagePartial::YoutubeIframe($value[$i]["embed"]);
				$value[$i]["thumb"] = VideoManagePartial::SrcThumbYoutube($value[$i]["embed"]);
				$value[$i]["thumb2"] = VideoManagePartial::SrcThumbYoutube($value[$i]["embed"], 0);
			}
			
			return $value;
		}
		
		public static function consultar($query = null, $sort = null, $offset = null, $limit = null){
			return self::resultConsultar(
				VideoManage::consultar($query, $sort, $offset, $limit)
			);
		}
		public static function consultarVideo( $tipo, $valor ){ 
			return self::resultConsultar(
				VideoManage::consultarVideo( $tipo, $valor )
			);
		}
		
		public static function Ultimo($IdNotIn=0, $Width=0){
			$Videos = VideoManagePartial::Ultimos(1, $IdNotIn);
			$Video = $Videos[0]; 
			$Video["Player"] = (($Width > 0) ? VideoPlayer::PlayerByVideoManegeAndWidth($Video, $Width) : VideoPlayer::PlayerByVideoManage($Video) );
			
			return $Video;
		}
		
		public static function UltimoByCategoria($IdCategoria, $IdNotIn=0, $Width=0){
			$Videos = VideoManagePartial::UltimosByCategoria($IdCategoria, 1, $IdNotIn);
			$Video = $Videos[0]; 
			$Video["Player"] = (($Width > 0) ? VideoPlayer::PlayerByVideoManegeAndWidth($Video, $Width) : VideoPlayer::PlayerByVideoManage($Video) );
			
			return $Video;
		}

		public static function Ultimos($Limit=0, $IdNotIn=0){
			
			$query = SearchMounter::Query(
				VideoAttribute::_Table(),
				array(
					new SearchQueryComparer(VideoAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), CurrentSite::IdeOrigem()),
					new SearchQueryComparer(VideoAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
					new SearchQueryComparer(VideoAttribute::IdVideo(), SearchComparer::Diferente(), SearchCondition::E(), $IdNotIn)
				),
				array(
						new SearchQueryOrder(VideoAttribute::Datahora(), SearchOrder::Decrescente())
				),
				0, $Limit
			);
			return VideoManagePartial::consultarVideo(3, $query);
			
		}
		
		public static function UltimosByCategoria($IdCategoria, $Limit=0, $IdNotIn=0){
			
			$query = SearchMounter::Query(
				VideoAttribute::_Table(),
				array(
					new SearchQueryComparer(VideoAttribute::IdVideoCategoria(), SearchComparer::Igual(), SearchCondition::E(), $IdCategoria),
					new SearchQueryComparer(VideoAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
					new SearchQueryComparer(VideoAttribute::IdVideo(), SearchComparer::Diferente(), SearchCondition::E(), $IdNotIn),
				),
				array(
					new SearchQueryOrder(VideoAttribute::Datahora(), SearchOrder::Decrescente())
				),
				0, $Limit
			);
			return VideoManagePartial::consultarVideo(3, $query);
		
		}
		
		public static function ListarArquivos($dir = "../files/multimidia/"){
			
			$templates = array();
			$i=0;
			
		    if ($dh = opendir($dir)) {
		        while (($file = readdir($dh)) !== false) {
		        	if(eregi("(.)+((\.flv)|(\.wmv))$", $file)){
		        		$templates[$i++] = trim($file);
		        	}
		        }
		        closedir($dh);
		    }
		    
		    //natcasesort($templates);
		    rsort($templates);
		    
			return $templates;
		}

		public static function SrcThumbYoutube($Link, $Tamanho=2){
			
			$src = VideoManagePartial::YoutubeId($Link);
			
			if(!empty($src)){
				$src = "http://img.youtube.com/vi/$src/$Tamanho.jpg";
			}
			
			return $src;			
		}
		
		public static function YoutubeId($Link){
			preg_match("/v=([^&#]*)/", $Link, $result);
			$src = trim($result[1]);
			return $src;
		}
		
		public static function YoutubeIframe($Link){
			$id = VideoManagePartial::YoutubeId($Link);
			return sprintf("http://www.youtube.com/embed/%s", $id);
		}
	} 
?>