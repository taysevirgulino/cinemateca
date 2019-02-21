<? 
	class DownloadManage2 extends DownloadManage {
		
		public static function consultar($query = null, $sort = null, $offset = null, $limit = null) {
			$value = DownloadManage::consultar($query, $sort, $offset, $limit);
			
			for ($i=0; $i < count($value); $i++){
				$value[$i]["link"] = Url::Download($value[$i]["id_download"], $value[$i]["identificador"], $value[$i]["nome"]);
				$value[$i]["link_click"] = Url::DownloadClick($value[$i]["id_download"], $value[$i]["identificador"], $value[$i]["nome"]);
				$value[$i]["player"] = self::Player($value[$i]);
			}
			
			return $value;
		}
		
		public static function Player( $arrayDownload ){
			$file = strtolower($arrayDownload['arquivo']);
			
			$player = '';
			
			if( preg_match('/(mp3)$/', $file) ){
				$player = '<div class="grid_4 alpha omega" style="margin-top:25px;">';
				$player .= '<span>Ouvir áudio:</span><br />';
				$player .= AudioPlayer::PlayerMini('files/download/', $arrayDownload['arquivo'], $arrayDownload['identificador'], false);
				$player .= '</div>';
			}elseif( preg_match('/null.(jpg|png|gif)$/', $file) ){
				$player = '';
			}elseif( preg_match('/(jpg|png|gif)$/', $file) ){
				$player = '<div class="grid_2 alpha omega right">';
				$player .= sprintf(
					'<a href="%1$s" id="%2$s" class="colorbox"><img src="%3$s" style="width:100%%;" /></a>',
					Url::_Path().'images/download/'.$arrayDownload['imagem'],
					$arrayDownload['identificador'],
					Url::_Path().'images/download/'.$arrayDownload['imagem']
				);
				$player .= '</div>';
			}
			
			return $player;
		}
		
	}
?>