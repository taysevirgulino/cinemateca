<? 
	class BannerManagePOPUP extends BannerManage { 
	
		public static function BannerPOPUP( $IdBannerLocal ){
			$bn = BannerManage::BannerAtivoByLocal($IdBannerLocal);
			
			if(!empty($bn)){
				$src = BannerTipo::Src(Url::_Path()."files/publicidade/".$bn["arquivo"], $bn["width"], $bn["height"], $bn["script"]);
				
				if(eregi("(jpg|gif|png)$", $bn["arquivo"])){
					$src = '<a href="'.$bn["url"].'" target="'.$bn["target"].'" title="'.$bn["descricao"].'" alt="'.$bn["descricao"].'">'.$src.'</a>';
				}
				
				$bn["tempo"] = 60;
				$bn["src"] = $src;
			}

			return $bn;
		}

	} 
?>