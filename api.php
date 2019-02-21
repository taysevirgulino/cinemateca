<?
	require_once("config.inc.php"); 
	
	$ssEnable = array('API');
	$callback = null;
	$data = null;
	$keys = array_keys($_GET);
	foreach ($keys as $key){
		if($key == "callback"){
			$callback = System::_GET($key);
		}else
		if($key == "data"){
			$data = base64_decode( System::_GET($key) );
			$data = json_decode($data, true);
		}
	}
	
	if( ($callback!=null) && ($data!=null) ){
		
		$enable = false;
		foreach ($ssEnable as $value) {
			if($data["s"] == $value){
				$enable = true;
				break;
			}
		}
		
		if($enable){
			$p = "";
			if(is_array($data["p"])){
				foreach ($data["p"] as $value) {
					if( is_array($value) ){
						$value = json_encode($value);
					}
					$p .= "'".$value."',";
				}
			}
			$p = preg_replace("/(,)+$/", "", $p);
			
			$rs = null;
			$command = sprintf('if(method_exists("%1$s", "%2$s")){ $rs = %1$s::%2$s(%3$s); }', $data["s"], $data["m"], $p);
			eval($command);
				
			if($rs===null){
				$rs = json_encode(array(
					"error" => utf8_encode("Erro ao processar requisiчуo")
				));
			}
			
		}else{
			$rs = json_encode(array(
				"error" => utf8_encode("Serviчo invсlido")
			));
		}
		
		print sprintf("%s(%s);", $callback, $rs);
	}
?>