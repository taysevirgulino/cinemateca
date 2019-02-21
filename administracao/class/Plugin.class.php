<?php 
class Plugin {

	public static function Processar($Texto){
		$result = null;
		
		$exp = "#[a-zA-Z0-9_]+:[a-zA-Z0-9]{32}#";
		preg_match_all($exp, $Texto, $result);
		
		if(is_array($result)){
			foreach ($result[0] as $line) {
				$line = explode(":", $line);
				if(count($line) == 2){
					$rs = "";
					eval('$rs = Plugin::'.$line[0].'("'.$line[1].'");');
					$Texto = preg_replace("/#".$line[0].":".$line[1]."#/", $rs, $Texto);
				}
			}
		}
		
		return $Texto;
	}
	
	public static function GaleriaAlbum2($Ide){
		$obj = new GaleriaAlbum();
		if(!$obj->buscarGaleriaAlbumAttribute(GaleriaAlbumAttribute::Identificador(), $Ide)){ return ""; }
		
		$Fotos = GaleriaFotoManage::consultarGaleriaFotoAttribute(GaleriaFotoAttribute::IdGaleriaAlbum(), $obj->getIdGaleriaAlbum(), SearchComparer::Igual(), GaleriaFotoAttribute::Prioridade(), SearchOrder::Crescente());
		
		$str = '';
		$str .= '<div class="plugin-album-carousel">';
		$str .= '<ul id="mycarousel_'.$Ide.'" class="jcarousel-skin-plugin">';
		foreach ($Fotos AS $Foto){
			$str .= '<li><a href="'.Url::_Path().'images/galeria/'.$Foto["foto"].'" rel="colorbox_'.$Ide.'" title="'.$Foto["descricao"].'"><img src="'.Url::_Path().'images/galeria/C'.$Foto["foto"].'" border="0" /></a></li>';
		}
		$str .= '</ul>';
		$str .= '</div>';
		$str .= '<script language="javascript"> jQuery(document).ready(function() { jQuery("#mycarousel_'.$Ide.'").jcarousel(); }); $(document).ready(function(){ $("a[rel=\'colorbox_'.$Ide.'\']").colorbox({slideshow:true,slideshowSpeed:4000}); }); </script>';
		
		return $str;
	}
	
	public static function GaleriaAlbum($Ide){
		$obj = new GaleriaAlbum();
		if(!$obj->buscarGaleriaAlbumAttribute(GaleriaAlbumAttribute::Identificador(), $Ide)){ return ""; }
		
		$Fotos = GaleriaFotoManage::consultarGaleriaFotoAttribute(GaleriaFotoAttribute::IdGaleriaAlbum(), $obj->getIdGaleriaAlbum(), SearchComparer::Igual(), GaleriaFotoAttribute::Prioridade(), SearchOrder::Crescente());
		
		$str = '';
		$str .= '<div id="'.$Ide.'" class="plugin-album">';
		foreach ($Fotos AS $Foto){
			$str .= '<a href="'.Url::_Path().'images/galeria/'.$Foto["foto"].'" rel="colorbox_'.$Ide.'" title="'.$Foto["descricao"].'"><img src="'.Url::_Path().'images/galeria/B'.$Foto["foto"].'" border="0" /></a>';
		}
		$str .= '</div>';
		$str .= '<script language="javascript"> $(document).ready(function(){ $("a[rel=\'colorbox_'.$Ide.'\']").colorbox({slideshow:true,slideshowSpeed:4000}); }); </script>';
		
		return $str;
	}
	
}
?>