<? 
	class DownloadCategoriaManage2 extends DownloadCategoriaManage {
		
		public static function Categorias(){
			$itens = DownloadCategoriaManage::consultarSearchQuery(
				array(),
				array(
					new SearchQueryOrder(DownloadCategoriaAttribute::Prioridade(), SearchOrder::Crescente())
				)
			);
			for ($i = 0; $i < count($itens); $i++) {
				$itens[$i]["url"] = Url::Downloads($itens[$i]["id_download_categoria"], $itens[$i]["identificador"], $itens[$i]["nome"]);
			}
			return $itens;
		}
		
	}
?>