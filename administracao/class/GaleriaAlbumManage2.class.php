<? 
	class GaleriaAlbumManage2 extends GaleriaAlbumManage { 
		
		public static function resultConsultar( $value ){
			
			for ($i=0; $i < count($value); $i++){
				$value[$i]["url"] = Url::GaleriaAlbum( $value[$i]["id_galeria_album"], $value[$i]["identificador"], $value[$i]["nome"]);
				$value[$i]["FotosCount"] = GaleriaFotoManage2::QuantidadeByAlbum($value[$i]["id_galeria_album"]);
				$value[$i]["Foto"] = GaleriaFotoManage2::FotoByAlbum($value[$i]["id_galeria_album"]);
			}
				
			return $value;
		}
		
		public static function consultarSearchQuery(array $searchQueryComparerCollection=array(), array $searchQueryOrderCollection=array(), $limitStart=0, $limitCount=0){
			return self::resultConsultar(
				GaleriaAlbumManage::consultarSearchQuery($searchQueryComparerCollection, $searchQueryOrderCollection, $limitStart, $limitCount)
			);
		} 
		
		public static function consultarGaleriaAlbum( $tipo, $valor ){
			return self::resultConsultar(
				GaleriaAlbumManage::consultarGaleriaAlbum( $tipo, $valor )
			);
		}
		
		public static function Ultimos($Limit=0, $IdDistinct=0){
			
			$Limit = (($Limit==0) ? 1000 : $Limit );
			
			return GaleriaAlbumManage2::consultarSearchQuery(
				array(
					new SearchQueryComparer(GaleriaAlbumAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
					new SearchQueryComparer(GaleriaAlbumAttribute::IdGaleriaAlbum(), SearchComparer::Diferente(), SearchCondition::E(), $IdDistinct),
				),
				array(
					new SearchQueryOrder(GaleriaAlbumAttribute::Datahora(), SearchOrder::Decrescente())
				),
				0, $Limit
			);
			
		}
		
		public static function Albuns_Categoria($IdGaleriaCategoria, $Limit=0, $IdDistinct=0){
			
			$Limit = (($Limit==0) ? 1000 : $Limit );
				
			return GaleriaAlbumManage2::consultarSearchQuery(
				array(
					new SearchQueryComparer(GaleriaAlbumAttribute::Status(), SearchComparer::Igual(), SearchCondition::E(), 1),
					new SearchQueryComparer(GaleriaAlbumAttribute::IdGaleriaCategoria(), SearchComparer::Igual(), SearchCondition::E(), $IdGaleriaCategoria),
					new SearchQueryComparer(GaleriaAlbumAttribute::IdGaleriaAlbum(), SearchComparer::Diferente(), SearchCondition::E(), $IdDistinct),
				),
				array(
					new SearchQueryOrder(GaleriaAlbumAttribute::Datahora(), SearchOrder::Decrescente())
				),
				0, $Limit
			);
			
		}
		
		public static function Capa(){
			$categorias = GaleriaCategoriaManage2::consultarGaleriaCategoriaAttribute(GaleriaCategoriaAttribute::Status(), 1, SearchComparer::Igual(), GaleriaCategoriaAttribute::Prioridade());
			
			$rs = array();
			for ($i = 0; $i < count($categorias); $i++) {
				$rs["C".$categorias[$i]["id_galeria_categoria"]] = array(
					"Categoria" => $categorias[$i],
					"Albuns" => GaleriaAlbumManage2::Albuns_Categoria($categorias[$i]["id_galeria_categoria"], 4)
				);
			}
			
			return $rs;
		}
		
		

	} 
?>