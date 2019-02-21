<? 
	class GaleriaCategoriaForm { 
		
		public static function Input_Value($_post, $IdByImageName=""){
			$frm_imagem_crop = GaleriaCategoriaForm::Imagem_Crop_Config($IdByImageName);
			$frm_imagem = "";
			foreach ($frm_imagem_crop["inputs"] as $input){
				$frm_imagem = preg_replace("/^(".$input["prename"]."){1}/", "", $_post[$input["input"]]);
				break;
			}
			return $frm_imagem;
		}
		
		public static function Imagem_Crop_Config($IdByImageName=""){
			
			$id = preg_replace("/(.){4}$/", "", $IdByImageName);
			
			if(empty($id)){
				$id = uniqid();
			}
			
			return array(
					"id" => $id,
					"inputs" => array(
						array("input"=>"FrmImagem0", "module"=>"galeria_categoria", "width"=>"315", "height"=>"210", "prename"=>"A", "name"=>$id ),
					)
			);
			
		}
		
	} 
?>