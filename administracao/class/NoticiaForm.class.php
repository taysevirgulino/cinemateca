<? 
	class NoticiaForm { 
		
		public static function Imagem_Crop_Config($IdByImageName=""){
			
			$id = preg_replace("/(.){4}$/", "", $IdByImageName);
			
			if(empty($id)){
				$id = uniqid();
			}
			
			return array(
					"id" => $id,
					"inputs" => array(
						array("input"=>"FrmFotoArquivo", "module"=>"noticia", "width"=>"640", "height"=>"250", "prename"=>"A", "name"=>$id, "label" => "Imagem de 640x250 (completa, horizontal)" ),
						array("input"=>"FrmFotoArquivo", "module"=>"noticia", "width"=>"350", "height"=>"470", "prename"=>"A", "name"=>$id, "label" => "Imagem de 350x470 (metade, vertical)" ),
						array("input"=>"FrmFotoArquivo", "module"=>"noticia", "width"=>"300", "height"=>"300", "prename"=>"A", "name"=>$id, "label" => "Imagem de 300x300 (pequena, quadrada)" ),
					)
			);
			
		}
		
	} 
?>