<?
	require_once("config.inc.php");
	
	$Disparos = EmktDisparoManage::DisparosNow();
	
	foreach ($Disparos as $Disparo){
		
		$Emkt = new Emkt();
		
		if($Emkt->buscarEmkt(1, $Disparo["id_emkt"])){
			
			$Contatos = EmktContatoManage::ContatosByDisparo($Disparo["id_emkt_disparo"]);
			
			$Divisao = 1;
			
			$Mailing = array_chunk($Contatos, $Divisao);
			
			$Total = count($Contatos);
			
			EmktDisparoManage::alterarAtributoStatus($Disparo["id_emkt_disparo"], EmktDisparoStatus::Processando());
			
			for ($i=0; $i < count($Mailing); $i++){
				
				EmktEmail::Enviar($Emkt, $Mailing[$i]);
				
				$Processados = $Divisao * ($i+1);
				$Porcentagem = intval( ($Processados * 100) / $Total);
				
				$emktDisparo = new EmktDisparo();
				if($emktDisparo->buscarEmktDisparo(1, $Disparo["id_emkt_disparo"])){
					$emktDisparo->setResultado("<b>$Porcentagem%</b> Processado [$Processados de $Total e-mails]");
					$emktDisparo->alterarAtributoResultado();
				}else{
					break;
				}
				
			}
			
			EmktDisparoManage::alterarAtributoStatus($Disparo["id_emkt_disparo"], EmktDisparoStatus::Concluido());
			
		}
		
	}

	exit();
?>