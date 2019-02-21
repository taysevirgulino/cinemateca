<?
	class AudioPlayer {
		
		public static function PlayerByAudio( $objAudio ){
			$Player = AudioPlayer::Player("files/multimidia/", $objAudio->getArquivo(), $objAudio->getIdentificador(), $objAudio->getWidth(), $objAudio->getHeight(), Url::_Path()."images/multimidia/A".$objAudio->getImagem());
			return ((empty($Player)) ? System::_TextByHtml($objAudio->getEmbed()) : $Player );
		}
		
		public static function PlayerByAudioAndWidthHeigth( $objAudio, $Width, $Heigth){
			$Player = AudioPlayer::Player("files/multimidia/", $objAudio->getArquivo(), $objAudio->getIdentificador(), $Width, $Heigth, Url::_Path()."images/multimidia/A".$objAudio->getImagem());
			if(empty($Player)){
				$Player = System::_TextByHtml($objAudio->getEmbed());
			}
			
			return $Player;
		}		
		
		public static function Player($FilePath, $FileName, $Identificador="", $Width=0, $Heigth=0, $Imagem=""){
			
			if (empty($Identificador)) {
				$Identificador = md5(date("YmdHis"));
			}
			
			$prePath = Url::_Path();
			
			if(eregi("(.)+((\.mp3))$", $FileName)){
				
				$Swf = $prePath."script/embed/player.swf?file=".$prePath.$FilePath.$FileName."&linktarget=_blank&caption=false&fullscreen=true";
				
				$Player = '<embed id="player'.$Identificador.'" src="'.$Swf.'" width="240" height="20" bgcolor="#ffffff" allowscriptaccess="always" allowfullscreen="true" />';
				
				return $Player;
				
			}else
			if(eregi("(.)+((\.wma))$", $FileName)){
				$Player = '<embed id="player'.$Identificador.'" type="application/x-mplayer2" pluginspage="http://microsoft.com/windows/mediaplayer/en/download/" src="'.$prePath.$FilePath.$FileName.'" width="320" height="70" autostart="1" displaysize="4" autosize="0" bgcolor="black" showcontrols="1" showtracker="0" ShowStatusBar="1" showdisplay="0" videoborder3d="0" designtimesp="5311" loop="1"></embed>';
				
				return $Player;
				
			}
			
			return "";
		}
		
		public static function PlayerMiniByAudioManage( $vAudio, $AutoStart=true){
			return AudioPlayer::PlayerMini("files/multimidia/", $vAudio["arquivo"], $vAudio["identificador"], $AutoStart);
		}
		
		public static function PlayerByAudioMini( $objAudio, $AutoStart=true ){
			$Player = AudioPlayer::PlayerMini("files/multimidia/", $objAudio->getArquivo(), $objAudio->getIdentificador(), $AutoStart);
			return ((empty($Player)) ? System::_TextByHtml($objAudio->getEmbed()) : $Player );
		}
				
		public static function PlayerMini($FilePath, $FileName, $Identificador="", $AutoStart=true){
			
			if (empty($Identificador)) {
				$Identificador = md5(date("YmdHis"));
			}
			
			$prePath = Url::_Path();
			
			if(eregi("(.)+((\.mp3))$", $FileName)){
				
				$Player .= '<object type="application/x-shockwave-flash" data="'.$prePath.'plugins/dewplayer/dewplayer.swf?mp3='.$prePath.$FilePath.$FileName.(($AutoStart) ? '&amp;autostart=1' : '' ).'" width="200" height="20" id="dewplayer">';
				$Player .= '    <param name="wmode" value="transparent" />';
				$Player .= '    <param name="movie" value="'.$prePath.'plugins/dewplayer/dewplayer.swf?mp3='.$prePath.$FilePath.$FileName.(($AutoStart) ? '&amp;autostart=1' : '' ).'" />';
				$Player .= '</object>';
				
				//$Player .= '<embed src="'.$prePath.'plugins/dewplayer/dewplayer.swf?mp3='.$prePath.$FilePath.$FileName.'" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="200" height="20"></embed>';
				
				return $Player;
				
			}
			
			return AudioPlayer::Player($FilePath, $FileName, $Identificador);
		}
		
		public static function PlayerMiniMulti($audiosArray, $AutoStart=true){
			
			$Identificador = md5(date("YmdHis"));
			$prePath = Url::_Path();
			$FilePath = "files/multimidia/";
			
			$mp3 = "";
			foreach ($audiosArray as $i => $audio) {
				$FileName = $audio["arquivo"];
				if(eregi("(.)+((\.mp3))$", $FileName)){
					$mp3 .= $prePath.$FilePath.$FileName."|";
				}
			}
			$mp3 = preg_replace('/(\|)+$/', '', $mp3);
			
			if( !empty($mp3) ){
				
				$Player = '<object type="application/x-shockwave-flash" data="'.$prePath.'plugins/dewplayer/dewplayer-multi.swf?mp3='.$mp3.(($AutoStart) ? '&amp;autostart=1' : '' ).'" width="240" height="20" id="'.$Identificador.'">';
				$Player .= '    <param name="wmode" value="transparent" />';
				$Player .= '    <param name="movie" value="'.$prePath.'plugins/dewplayer/dewplayer-multi.swf?mp3='.$mp3.(($AutoStart) ? '&amp;autostart=1' : '' ).'" />';
				$Player .= '</object>';
				
				return $Player;
				
			}
			
			return '';
		}
	}
?>