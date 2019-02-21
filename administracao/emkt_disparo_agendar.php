<?
	require_once("config.inc.php");
	require_once("logon.inc.php");

	$ID = intval( System::_REQUEST("id") );
	$link_list = "emkt_disparo.php?id=$ID";

	if( Validacao::isVazio($ID) ){ System::Redirect($link_list); }

	$obj = new Emkt();

	if( $obj->buscarEmkt(1, $ID) ){
		
		$frm_data = System::_POST("FrmData");
		$frm_hora = System::_POST("FrmHora");

		$frm_qtd_listas = intval($_POST["qtdListas"]);
		$vlistas = array(); $vi = 0;
		for($i=0; $i <= $frm_qtd_listas; $i++){
			$value = intval($_POST["FrmIdEmktLista".$i]);
			if(!empty($value)){
				$vlistas[$vi] = $value;
				$vi++;
			}
		}		
		
		$objDisparo = new EmktDisparo();
		$objDisparo->setEmktDisparo(-1, null, $obj->getIdEmkt(), "$frm_data $frm_hora", "0% Processado", EmktDisparoStatus::Agendado());
		
		if($objDisparo->inserirEmktDisparo()){
			
			for($i=0; $i < count($vlistas); $i++){
				EmktDestinatarioManage::inserirEmktDestinatario(-1, null, $objDisparo->getIdEmktDisparo(), $vlistas[$i]);
			}
			
			EmktDisparoManage::alterarAtributoResultado($objDisparo->getIdEmktDisparo(), "<b>0%</b> Processado [0 de ".EmktContatoManage::ContatosCountByDisparo($objDisparo->getIdEmktDisparo())." e-mails]");
			
			System::AlertRedirect("- Agendamento efetuado com Suceso;\\n- A cada 30 minutos o servidor verifica os agendamento abertos e executa;\\n- Aguarde processamento;", $link_list);	
		}else{
			System::AlertRedirect("- Agendamento NÃO cadastrado;\\n- Teste novamente daqui alguns minutos;", $link_list);
		}
	}else{
		System::AlertRedirect("Registro não encontrado!", $link_list);
	}
?>