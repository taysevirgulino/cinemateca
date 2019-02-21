<?
	require_once("config.inc.php");

	/*if(date("N") != 5){ // envia apenas no sexta
		exit();
	}*/
	
	/*$Site = new Site();
	$Site->buscarAttribute(SiteAttribute::Identificador(), Current::IdeOrigemDefault());
	
	$objConteudo = ConteudoManage2::Conteudo("email_newsletter_assunto");
	
	$itens = array(
		array(
			"link" => "http://www.sal.brmalls.com.br/newsletter.php",
			"assunto" => $objConteudo->getLegenda(),
			"hora" => "10:00:00",
			"listas" => array(1),
			"remetente_nome" => $Site->getEmailNome(),
			"remetente_email" => $Site->getEmail(),
		)
	);*/
	
	$itens = array(
		array(
			"link" => "http://www.sal.brmalls.com.br/newsletter.php",
			"assunto" => "AJEE Tocantins - Novidades da semana",
			"hora" => "10:00:00",
			"listas" => array(1),
			"remetente_nome" => "AJEE Tocantins",
			"remetente_email" => "marketingdigital@sal.brmalls.com.br ",
		)
	);
	
	foreach ($itens as $item) {
		$file = file($item["link"]);
		$mensagem_html = trim(implode("", $file));
		
		if(!empty($mensagem_html)){
			$datahora = date("Y-m-d ").$item["hora"];
			
			$objEmkt = new Emkt();
			$objEmkt->setIdEmkt( -1 );
			$objEmkt->setIdentificador( null );
			$objEmkt->setTitulo( $item["assunto"]." [$datahora]" );
			$objEmkt->setAssunto( $item["assunto"] );
			$objEmkt->setRemetenteNome( $item["remetente_nome"] );
			$objEmkt->setRemetenteEmail( $item["remetente_email"] );
			$objEmkt->setMensagemHtml( System::_QueryString($mensagem_html) );
			$objEmkt->setMensagemTexto( strip_tags($mensagem_html) );
			$objEmkt->setDatahora( date("Y-m-d H:i:s") );
			
			if($objEmkt->inserirEmkt()){
				$objDisparo = new EmktDisparo();
				$objDisparo->setIdEmktDisparo( -1 );
				$objDisparo->setIdentificador( null );
				$objDisparo->setIdEmkt( $objEmkt->getIdEmkt() );
				$objDisparo->setAgendamento( $datahora );
				$objDisparo->setResultado( "0% Processado" );
				$objDisparo->setStatus( EmktDisparoStatus::Agendado() );
				
				if($objDisparo->inserirEmktDisparo()){
					foreach ($item["listas"] as $lista) {
						EmktDestinatarioManage::inserirEmktDestinatario(-1, null, $objDisparo->getIdEmktDisparo(), $lista);
					}
					
					$objDisparo->setResultado( "<b>0%</b> Processado [0 de ".EmktContatoManage::ContatosCountByDisparo($objDisparo->getIdEmktDisparo())." e-mails]" );
					$objDisparo->alterarAtributoResultado();
					
					//EmktEmail::EnviarTeste($objEmkt->getIdEmkt(), $item["remetente_email"]);
				}
				
			}
		}
	}
?>