<?
	class BannerTipo {

		public static function Imagem(){
			return 1;
		}

		public static function Flash(){
			return 2;
		}

		public static function _Descricao( $Tipo ){
			switch ($Tipo){
				case BannerTipo::Imagem() : return "Imagem";
				case BannerTipo::Flash() : return "Flash";
			}
			return "";
		}
		
		public static function TipoByFile( $File ){
			if(eregi("(jpg|gif|png)$", $File)){
				return BannerTipo::Imagem();
			}else
			if(eregi("(swf)$", $File)){
				return BannerTipo::Flash();
			}
			return 0;
		}
	
		
		public static function Src($ArquivoAndPath, $Width, $Height, $Rel=""){
			
			switch (BannerTipo::TipoByFile($ArquivoAndPath)){
				case BannerTipo::Imagem() : {
					
					return '<img src="'.$ArquivoAndPath.'" border="0" width="'.$Width.'" height="'.$Height.'" rel="'.$Rel.'" />';	
					
				}break;
				case BannerTipo::Flash() : {

					$ArquivoAndPath2 = eregi_replace(".swf$", "", $ArquivoAndPath);
					
					$Player = '';
					$Player .= '<script type="text/javascript">';
					$Player .= '	AC_FL_RunContent( \'codebase\',\'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0\',\'width\',\''.$Width.'\',\'height\',\''.$Height.'\',\'src\',\''.$ArquivoAndPath2.'\',\'quality\',\'high\',\'pluginspage\',\'http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash\',\'movie\',\''.$ArquivoAndPath2.'\',\'wmode\',\'transparent\',\'scale\',\'noscale\',\'loop\',\'true\',\'menu\',\'false\',\'devicefont\',\'false\',\'allowScriptAccess\',\'sameDomain\' ); //end AC code';
					$Player .= '</script>';
					$Player .= '<noscript>';
					$Player .= '	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="'.$Width.'" height="'.$Height.'">';
					$Player .= '		<param name="movie" value="'.$ArquivoAndPath.'" />';
					$Player .= '		<param name="quality" value="high" />';
					$Player .= '		<embed src="'.$ArquivoAndPath.'" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="'.$Width.'" height="'.$Height.'"></embed>';
					$Player .= '	</object>';
					$Player .= '</noscript>';
					
					return $Player;
					
				}break;
			}
			
			return "";
		}		
	}
?>