<?
	class VideoPlayer {
		public static function LarguraByFileName($fileName){
			
			if(eregi("(.)+((\.wma))$", $fileName)){
				return 320;
			}
			if(eregi("(.)+((\.mp3))$", $fileName)){
				return 240;	
			}
			
			return 0;
		}		

		public static function PlayerByVideo( $objVideo, $Width=0 ){
			$Width = (($Width > 0) ? $Width : $objVideo->getWidth() );
			return VideoPlayer::Player("files/multimidia/", $objVideo->getArquivo(), System::_TextByHtml($objVideo->getEmbed()), $objVideo->getIdentificador(), $Width, $objVideo->getHeight(), Url::_Path()."images/video/A".$objVideo->getImagem());
		}

		public static function PlayerByVideoAndWidthHeigth( $objVideo, $Width, $Heigth){
			return VideoPlayer::Player("files/multimidia/", $objVideo->getArquivo(), System::_TextByHtml($objVideo->getEmbed()), $objVideo->getIdentificador(), $Width, $Heigth, Url::_Path()."images/video/A".$objVideo->getImagem());
		}		

		public static function PlayerByVideoManage( $vVideo ){
			return VideoPlayer::Player("files/multimidia/", $vVideo["arquivo"], System::_TextByHtml($vVideo["embed"]), $vVideo["identificador"], $vVideo["width"], $vVideo["height"], Url::_Path()."images/video/A".$vVideo["imagem"]);
		}
		
		public static function PlayerByVideoManegeAndWidth( $vVideo, $Width ){
			if(empty($vVideo)){ return ""; }
			$Height = intval(($Width * $vVideo["height"]) / $vVideo["width"]);
			
			return VideoPlayer::Player("files/multimidia/", $vVideo["arquivo"], System::_TextByHtml($vVideo["embed"]), $vVideo["identificador"], $Width, $Height, Url::_Path()."images/video/A".$vVideo["imagem"]);
		}
		
		public static function Player($FilePath, $FileName, $Embed, $Identificador="", $Width=0, $Heigth=0, $Imagem=""){
			
			if (empty($Identificador)) {
				$Identificador = md5(date("YmdHis"));
			}
			
			$prePath = Url::_Path();
			
			$Player = '';
			$Player .= '<a id="'.$Identificador.'" href="'.$Embed.'" class="movie {opacity:.0, isBgndMovie:false, ratio:\'4/3\'}">Visualizar Vídeo</a>'."\n";
			$Player .= '<script type="text/javascript">'."\n";
			$Player .= '    $.YTPlayer.path="'.Url::_Path().'";'."\n";
			$Player .= '    $.YTPlayer.controls.play="<img src=\''.Url::_Path().'script/jquery/jquery.mb.YTPlayer/images/play.png\'>";'."\n";
			$Player .= '    $.YTPlayer.controls.pause="<img src=\''.Url::_Path().'script/jquery/jquery.mb.YTPlayer/images/pause.png\'>";'."\n";
			$Player .= '    $.YTPlayer.controls.mute="<img src=\''.Url::_Path().'script/jquery/jquery.mb.YTPlayer/images/mute.png\'>";'."\n";
			$Player .= '    $.YTPlayer.controls.unmute="<img src=\''.Url::_Path().'script/jquery/jquery.mb.YTPlayer/images/unmute.png\'>";'."\n";
			$Player .= '    $.YTPlayer.rasterImg="'.Url::_Path().'script/jquery/jquery.mb.YTPlayer/images/raster.png";'."\n";
			$Player .= '    $.YTPlayer.width='.$Width.';'."\n";
			$Player .= '    $(function(){'."\n";
			$Player .= '        $(".movie").mb_YTPlayer();'."\n";
			$Player .= '    });'."\n";
			$Player .= '</script>';
			
			/*if(eregi("(.)+((\.flv))$", $FileName)){
				$Swf = $prePath."script/mediaplayer/player.swf?file=".$prePath.$FilePath.$FileName."&image=$Imagem&linktarget=_blank&caption=false&fullscreen=true";
				
				$Player = '<embed id="player'.$Identificador.'" src="'.$Swf.'" width="'.$Width.'" height="'.($Heigth+20).'" bgcolor="#000000" allowscriptaccess="always" allowfullscreen="true" />';
			}else
			if(eregi("(.)+((\.wmv))$", $FileName)){
				$Player = '<embed id="player'.$Identificador.'" type="application/x-mplayer2" pluginspage="http://microsoft.com/windows/mediaplayer/en/download/" src="'.$prePath.$FilePath.$FileName.'" width="'.$Width.'" height="'.($Heigth+70).'" autostart="1" displaysize="4" autosize="0" bgcolor="black" showcontrols="1" showtracker="0" ShowStatusBar="1" showdisplay="0" videoborder3d="0" designtimesp="5311" loop="1" style="background:#000000;"></embed>';
			}else{
				$Player = $Embed;
				$Player = preg_replace("/width=[\"|']([0-9]{1,10})[\"|']/i", 'width="'.$Width.'"', $Player);
				$Player = preg_replace("/height=[\"|']([0-9]{1,10})[\"|']/i", 'height="'.$Heigth.'"', $Player);
			}*/
			
			return $Player;
		}
	}
?>