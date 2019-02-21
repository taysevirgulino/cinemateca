<? 
	class AreaPublicacaoBlocoManage2 extends AreaPublicacaoBlocoManage { 
		
		public static function consultarAreaPublicacaoBloco( $tipo, $valor ){
			$value = AreaPublicacaoBlocoManage::consultarAreaPublicacaoBloco( $tipo, $valor );
			
			for ($i=0; $i < count($value); $i++){
				$value[$i]["ativo"] = ($value[$i]["status"] == 1);
			}
				
			return $value;
		}
		
		public static function Blocos(){
			$sql = "SELECT
					  tb_area_publicacao_bloco.*
					FROM
					  tb_area_publicacao_bloco
					WHERE
					  tb_area_publicacao_bloco.`status` = 1
					ORDER BY
					  tb_area_publicacao_bloco.prioridade";
			
			return AreaPublicacaoBlocoManage2::consultarAreaPublicacaoBloco(3, $sql);
		}
		
	} 
?>