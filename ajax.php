<?
	require_once("config.inc.php");
	
	$function = System::_REQUEST("function");
	
	switch ($function) {
		case "Notificacao_Ler" : {
			$id = System::_GET("id");
			
			$rs = array("status" => NotificacaoManage2::Ler($id));
			
			print json_encode($rs);
		}break;
		case "Localidades_Uf" : {
			$uf = System::_REQUEST("uf");
			
			$cidades = LocalidadeManage2::CidadesByUf($uf);
			
			$resultado = "<option value=''>Selecione uma Cidade</option>";
			for ($i = 0; $i < count($cidades); $i++) {
				$resultado .= "<option value='".$cidades[$i]["id_localidade"]."'>".($cidades[$i]["cidade"])."</option>";
			}
			if (count($cidades) == 0) {
				$resultado = "<option value=''>Selecione o Estado</option>";
			}
			
			print $resultado;
		}break;
		case "CEP_Logradouro" : {
			$cep = preg_replace('/[^0-9]+/', '', System::_POST("cep"));
			
			$host = "http://apps.widenet.com.br/busca-cep/api/cep/".$cep.".json";
			$rs = file($host);
				
			$result = json_decode($rs[0], true);
			
			if(is_array($result)){
				if(!empty($result["district"])){
					print json_encode(array(
						'bairro' => $result["district"],
						'logradouro' => $result["address"],
						'cep' => $result["code"],
						'uf' => $result["state"],
						'localidade' => $result["city"],
						'id_localidade' => LocalidadeManage2::IdLocalidade($result["state"], utf8_decode($result["city"])),
					));
					exit();
				}
			}
			print json_encode( array("bairro"=>"") );
		}break;
	}
?>