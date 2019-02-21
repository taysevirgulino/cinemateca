<?
	//EXECUTAR UMA VEZ POR DIA
	// http://servicos.cptec.inpe.br/XML/listaCidades?city=nome cidade
	//php -f /var/www/mvjtocantins.com.br/public_html/administracao/cron_tempo.php
	
	date_default_timezone_set("America/Araguaina");
	//function __autoload($classname){ require_once("/Cloud/Sites/mvjtocantins.com.br/mvjtocantins.com.br/www/administracao/class/".$classname.".class.php"); }
	function __autoload($classname){ require_once("/var/www/mvjtocantins.com.br/public_html/administracao/class/".$classname.".class.php"); }
	db::_Start();
		
	$Cidades = TempoCidadeManage::consultarTempoCidadeAttribute(TempoCidadeAttribute::Status(), 1, SearchComparer::Igual(), TempoCidadeAttribute::Prioridade());
	
	$data = date("Y-m-d");
	
	foreach ($Cidades as $Cidade) {
		$id_tempo_cidade = intval($Cidade["id_tempo_cidade"]);
		
		$result = file("http://servicos.cptec.inpe.br/XML/cidade/".$Cidade["codigo"]."/previsao.xml");
		
		if(!empty($result)){
			$tags = System::Untag($result[0], "previsao");
		
			foreach ($tags as $value) {
				$dia = implode(System::Untag($value, "dia"), "");
				
				$obj = TempoPrevisaoManage2::Previsao($id_tempo_cidade, $dia);
				
				if($obj == null){
					$obj = new TempoPrevisao();
					$obj->setIdTempoPrevisao( -1 );
					$obj->setIdentificador( null );
					$obj->setIdTempoCidade( $id_tempo_cidade );
					$obj->setDia( $dia );
					$obj->setTempo( implode(System::Untag($value, "tempo"), "") );
					$obj->setMaxima( implode(System::Untag($value, "maxima"), "") );
					$obj->setMinima( implode(System::Untag($value, "minima"), "") );
					$obj->setIuv( implode(System::Untag($value, "iuv"), "") );
					$obj->inserirTempoPrevisao();
				}
				
			}
		
		}
		
	}

	exit();
?>