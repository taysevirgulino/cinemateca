<?
	class MultimidiaTipo{
		public static function Video(){
			return 1;
		}
		public static function Audio(){
			return 2;
		}
		public static function TipoByFileName($fileName){
			
			if(eregi("(.)+((\.flv)|(\.wmv))$", $fileName)){
				return MultimidiaTipo::Video();	
			}
			if(eregi("(.)+((\.mp3)|(\.wma))$", $fileName)){
				return MultimidiaTipo::Audio();	
			}
			
			return 0;
		}
		public static function LarguraByFileName($fileName){
			
			if(eregi("(.)+((\.wma))$", $fileName)){
				return 320;
			}
			if(eregi("(.)+((\.mp3))$", $fileName)){
				return 240;	
			}
			
			return 0;
		}		
		public static function _Descricao($Tipo){
			switch ($Tipo){
				case MultimidiaTipo::Video() : return "Vídeo";
				case MultimidiaTipo::Audio() : return "Áudio";
			}
			return "Embed";
		}
		
		public static function PlayerByMultimidia( $objMultimidia ){
			$Player = MultimidiaTipo::Player("files/multimidia/", $objMultimidia->getArquivo(), $objMultimidia->getIdentificador(), $objMultimidia->getWidth(), $objMultimidia->getHeight(), Url::_Path()."images/multimidia/A".$objMultimidia->getImagem());
			return ((empty($Player)) ? System::_TextByHtml($objMultimidia->getEmbed()) : $Player );
		}
		
		public static function PlayerByMultimidiaAndWidthHeigth( $objMultimidia, $Width, $Heigth){
			$Player = MultimidiaTipo::Player("files/multimidia/", $objMultimidia->getArquivo(), $objMultimidia->getIdentificador(), $Width, $Heigth, Url::_Path()."images/multimidia/A".$objMultimidia->getImagem());
			if(empty($Player)){
				$Player = System::_TextByHtml($objMultimidia->getEmbed());
			}
			
			return $Player;
		}		
		
		public static function Player($FilePath, $FileName, $Identificador="", $Width=0, $Heigth=0, $Imagem=""){
			
			if (empty($Identificador)) {
				$Identificador = md5(date("YmdHis"));
			}
			
			$prePath = Url::_Path();
			
			if(eregi("(.)+((\.flv))$", $FileName)){
				$Swf = $prePath."script/embed/player.swf?file=".$prePath.$FilePath.$FileName."&image=$Imagem&linktarget=_blank&caption=false&fullscreen=true";
				
				$Player = '<embed id="player'.$Identificador.'" src="'.$Swf.'" width="'.$Width.'" height="'.($Heigth+20).'" bgcolor="#000000" allowscriptaccess="always" allowfullscreen="true" />';
				
				return $Player;
				
				/*return '	<div id="player'.$Identificador.'"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a> to see this player.</div>
							<script type="text/javascript">
								var s1 = new SWFObject("'.$prePath.'script/flash/embed/player.swf","single","'.$Width.'","'.($Heigth+20).'","0");
								s1.addParam("allowfullscreen","true");
								s1.addVariable("file","'.$prePath.$FilePath.$FileName.'");
								s1.addVariable("backcolor","0xFFFFFF");
								s1.addVariable("image","'.$Imagem.'");
								s1.write("player'.$Identificador.'");
							</script>';*/
			}else
			if(eregi("(.)+((\.wmv))$", $FileName)){
				$Player = '<embed id="player'.$Identificador.'" type="application/x-mplayer2" pluginspage="http://microsoft.com/windows/mediaplayer/en/download/" src="'.$prePath.$FilePath.$FileName.'" width="'.$Width.'" height="'.($Heigth+70).'" autostart="1" displaysize="4" autosize="0" bgcolor="black" showcontrols="1" showtracker="0" ShowStatusBar="1" showdisplay="0" videoborder3d="0" designtimesp="5311" loop="1" style="background:#000000;"></embed>';
				
				return $Player;
				
				/*return '<object id="mediaPlayer'.$Identificador.'" width="'.$Width.'" height="'.($Heigth+70).'" classid="CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701" standby="Loading Microsoft Windows Media Player components..." type="application/x-oleobject" style="background:#000000 url('.$Imagem.') no-repeat;">
							<param name="fileName" value="'.$prePath.$FilePath.$FileName.'">
							<param name="animationatStart" value="true">
							<param name="transparentatStart" value="true">
							<param name="autoStart" value="false">
							<param name="showControls" value="true">
							<param name="ShowStatusBar" value="true">
							<param name="loop" value="1">
							<embed type="application/x-mplayer2" pluginspage="http://microsoft.com/windows/mediaplayer/en/download/" src="'.$prePath.$FilePath.$FileName.'" width="'.$Width.'" height="'.($Heigth+70).'" autostart="1" displaysize="4" autosize="0" bgcolor="black" showcontrols="1" showtracker="0" ShowStatusBar="1" showdisplay="0" videoborder3d="0" designtimesp="5311" loop="1" style="background:#000000;"></embed>
						</object>';	*/
			}else
			if(eregi("(.)+((\.mp3))$", $FileName)){
				
				$Swf = $prePath."script/embed/player.swf?file=".$prePath.$FilePath.$FileName."&linktarget=_blank&caption=false&fullscreen=true";
				
				$Player = '<embed id="player'.$Identificador.'" src="'.$Swf.'" width="240" height="20" bgcolor="#ffffff" allowscriptaccess="always" allowfullscreen="true" />';
				
				return $Player;
								
				
				/*return '<div id="player'.$Identificador.'"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a> to see this player.</div>
						<script type="text/javascript">
						    var s'.$Identificador.' = new SWFObject("'.$prePath.'script/flash/embed/player.swf", "line", "240", "20", "7");
						    s'.$Identificador.'.addVariable("file","'.$prePath.$FilePath.$FileName.'");
						    s'.$Identificador.'.addVariable("repeat","false");
						    s'.$Identificador.'.addVariable("showdigits","false");
						    s'.$Identificador.'.addVariable("showdownload","true");
						    s'.$Identificador.'.addVariable("width","240");
						    s'.$Identificador.'.addVariable("height","20");
						    s'.$Identificador.'.write("player'.$Identificador.'");
						</script>';	*/
				
			}else
			if(eregi("(.)+((\.wma))$", $FileName)){
				$Player = '<embed id="player'.$Identificador.'" type="application/x-mplayer2" pluginspage="http://microsoft.com/windows/mediaplayer/en/download/" src="'.$prePath.$FilePath.$FileName.'" width="320" height="70" autostart="1" displaysize="4" autosize="0" bgcolor="black" showcontrols="1" showtracker="0" ShowStatusBar="1" showdisplay="0" videoborder3d="0" designtimesp="5311" loop="1"></embed>';
				
				return $Player;
				
				
				/*return '<object id="mediaPlayer'.$Identificador.'" width="320" height="70" classid="CLSID:22d6f312-b0f6-11d0-94ab-0080c74c7e95" codebase="http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701" standby="Loading Microsoft Windows Media Player components..." type="application/x-oleobject">
							<param name="fileName" value="'.$prePath.$FilePath.$FileName.'">
							<param name="animationatStart" value="true">
							<param name="transparentatStart" value="true">
							<param name="autoStart" value="false">
							<param name="showControls" value="true">
							<param name="ShowStatusBar" value="true">
							<param name="loop" value="1">
							<embed type="application/x-mplayer2" pluginspage="http://microsoft.com/windows/mediaplayer/en/download/" src="'.$prePath.$FilePath.$FileName.'" width="320" height="70" autostart="1" displaysize="4" autosize="0" bgcolor="black" showcontrols="1" showtracker="0" ShowStatusBar="1" showdisplay="0" videoborder3d="0" designtimesp="5311" loop="1"></embed>
						</object>';	*/
			}
			
			return "";
		}
	}
?>