<? 
	class BannerManage extends AbstractEntityManage implements EntityManageInterface {
		
		public static function Carregar(){
			$Banner = array();
				
			$Locais = BannerLocalManage::consultar();
				
			for($i=0; $i < count($Locais); $i++){
				$bn = BannerManage::BannerAtivoByLocal($Locais[$i]["id_banner_local"]);
		
				$url = Url::Banner($bn["id_banner"], $bn["identificador"], $bn["descricao"]);
				$path = Url::_Path()."files/publicidade/".$bn["arquivo"];
				$src = BannerTipo::Src($path, $bn["width"], $bn["height"], $url);
		
				switch ($bn["tipo"]){
					case BannerTipo::Imagem() : {
						if( ($bn["url"] != "#") && ($bn["url"] != "http://") ){
							$url = ((preg_match('/#+/', $bn["url"])) ? $bn["url"] : $url );
							$src = '<a href="'.$url.'" target="'.$bn["target"].'" title="'.$bn["descricao"].'" alt="'.$bn["descricao"].'">'.$src.'</a>';
						}
					}
				}
		
				$Banner["Local".$Locais[$i]["codigo"]] = $src;
				$Banner["Local".$Locais[$i]["codigo"]."_Url"] = $url;
				$Banner["Local".$Locais[$i]["codigo"]."_Title"] = $bn["descricao"];
				$Banner["Local".$Locais[$i]["codigo"]."_Src"] = $path;
			}
				
			return $Banner;
		}
		
		public static function Carregar_List(){
			$Banner = array();
		
			$Locais = BannerLocalManage::consultar();
		
			for($i=0; $i < count($Locais); $i++){
		
				$banners = BannerManage::consultarSearchQuery(
					array(
						new SearchQueryComparer(BannerAttribute::IdBannerLocal(), SearchComparer::Igual(), SearchCondition::E(), $Locais[$i]["id_banner_local"]),
						new SearchQueryComparer(BannerAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
						new SearchQueryComparer(BannerAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), CurrentSite::IdeOrigem()),
					)
				);
		
				$itens = array();
				foreach ($banners as $bn) {
						
					$url = Url::Banner($bn["id_banner"], $bn["identificador"], $bn["descricao"]);
					$path = Config::Url_Path()."files/publicidade/".$bn["arquivo"];
					$src = BannerTipo::Src($path, $bn["width"], $bn["height"], $url);
						
					switch ($bn["tipo"]){
						case BannerTipo::Imagem() : {
							if( ($bn["url"] != "#") && ($bn["url"] != "http://") ){
								$url = ((preg_match('/#+/', $bn["url"])) ? $bn["url"] : $url );
								$src = '<a href="'.$url.'" target="'.$bn["target"].'" title="'.$bn["descricao"].'" alt="'.$bn["descricao"].'">'.$src.'</a>';
							}
						}
					}
					$itens[] = array(
							"src" => $src,
							"url" => $url,
							"path" => $path,
							"title" => $bn["descricao"],
					);
				}
		
				$Banner["Local".$Locais[$i]["codigo"]] = $itens;
			}
		
			return $Banner;
		}
		
		public static function BannerAtivoByLocal( $IdBannerLocal ){
			$vobj = BannerManage::consultarSearchQuery(
				array(
					new SearchQueryComparer(BannerAttribute::IdBannerLocal(), SearchComparer::Igual(), SearchCondition::E(), $IdBannerLocal),
					new SearchQueryComparer(BannerAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
					new SearchQueryComparer(BannerAttribute::IdeOrigem(), SearchComparer::Igual(), SearchCondition::E(), CurrentSite::IdeOrigem()),
				)
			);
			return $vobj[rand(0, (count($vobj)-1))];
		}
		
	}
?>