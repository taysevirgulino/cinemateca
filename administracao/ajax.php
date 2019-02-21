<?
	require_once("config.inc.php"); 
	
	$function = System::_REQUEST("function");
	
	switch ($function){
		case "Regioes_IdCidade" : {
			$IdCidade = intval(System::_POST("IdCidade"));
			
			$objs = RegiaoManage2::Regioes_Cidade($IdCidade);
			
			$resultado = "<option value=''>---</option>";
			foreach ($objs as $obj) {
				$resultado .= "<option value='".$obj["id_regiao"]."'>".($obj["nome"])."</option>";
			}
			if (count($objs) == 0) {
				$resultado = "<option value=''>[Selecione Cidade/UF]</option>";
			}
			
			print ($resultado);
		}break;
		case "Bairros_IdRegiao" : {
			$IdRegiao = intval(System::_POST("IdRegiao"));
			
			$objs = BairroManage2::Bairros_Regiao($IdRegiao);
			
			$resultado = "<option value=''>---</option>";
			foreach ($objs as $obj) {
				$resultado .= "<option value='".$obj["id_bairro"]."'>".($obj["nome"])."</option>";
			}
			if (count($objs) == 0) {
				$resultado = "<option value=''>[Selecione Região]</option>";
			}
			
			print ($resultado);
		}break;
	}
?>